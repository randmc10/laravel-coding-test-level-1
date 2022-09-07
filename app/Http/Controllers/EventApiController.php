<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class EventApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        return Event::all();
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
        $request->validate([
            'name'      =>  'required',
            'slug'      =>  'required',
            'startAt'   =>  'required',
            'endAt'     =>  'required'
        ]);

        return Event::create($request->all());
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        return Event::findOrFail($id);
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
    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        if($event !== null ?  $event->update($request->all()) :  Event::create($request->all()))
        return $event;
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
        return Event::destroy($id);
    }
}
