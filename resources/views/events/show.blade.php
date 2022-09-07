@include('templates.header')

<div class="max-w-xl mx-auto mt-5">
    <div class="shadow-lg rounded bg-slate-100 p-4">
        <a href='/events'>
            <button class="float-right bg-slate-500 hover:bg-slate-600 text-white px-2 py-1 shadow-md rounded">
                Back
            </button>
        </a>
        <p class="text-indigo-700 font-semibold text-sm mt-5">EVENT NAME</p>
        <h1 class="text-2xl font-semibold"> {{ $event->name }} </h1>
        <a href={{ $event->slug }}>
            <button class="mt-2 bg-slate-500 hover:bg-slate-600 text-white px-2 py-1 shadow-md rounded">
                View Full Details
            </button>
        </a>
        <p class="text-green-700 font-bold text-sm mt-5">START DATE: {{ $event->startAt }} </p>
        <p class="text-red-700 font-bold text-sm mt-2">END DATE: {{ $event->endAt }} </p>

        <div class="flex">
            <a href="/event/{{ $event->id }}/edit">
                <button type="submit"
                    class="mt-5 bg-indigo-600 hover:bg-indigo-700 text-white px-2 py-1 shadow-md rounded">
                    Edit
                </button>
            </a>
            <form action="/events/{{ $event->id }}" method="post">
                @method('delete')
                @csrf
                <button type="submit"
                    class="mt-5 bg-red-600 hover:bg-red-700 text-white px-2 py-1 shadow-md rounded ml-2">
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>

@include('templates.footer')
