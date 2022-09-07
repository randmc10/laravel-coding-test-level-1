<?php

namespace App\Http\Controllers;

use App\Mail\TestEmail;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        return view('events.index');
    }

    public function create(){
        return view('events.create');
    }

    public function generateDatatables() {
        return DataTables::of(Event::all())->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      =>  'required',
            'slug'      =>  'required',
            'startAt'   =>  'required',
            'endAt'     =>  'required'
        ]);
        Event::create($validated);
        Mail::to("laravel-assessment@gmail.com")->send(new TestEmail($validated));
        return redirect('/events');
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', ['event'=> $event]);
    }

    public function edit($id) {
        $event = Event::findOrFail($id);
        return view('events.edit', ['event'=>$event]);
    }

    /**
     * Search for an event.
     *
     * @param  string name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        return Event::where('name', 'like', '%' .$name. '%')->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event){

        $validated = $request->validate([
            "name" => ['required'],
            "slug" => ['required'],
            "startAt" => ['required'],
            "endAt" => ['required'], 
        ]);

        $event->update($validated);

        return redirect('/events')->with('message', 'Data was successfully updated');
    }

    public function patch(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->update($request->all());
        return $event;
    }

    public function getActiveEvents() {
        $current_events = DB::table('events')->select( 'id','name', 'startAt', 'endAt' )
            ->where( DB::raw('now()'), '>=', DB::raw('startAt') )
            ->where( DB::raw('now()'), '<=', DB::raw('endAt') )->get();
        return $current_events;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::destroy($id);
        return redirect('/events');
    }
}
