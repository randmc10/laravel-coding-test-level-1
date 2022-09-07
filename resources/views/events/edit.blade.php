@include('templates.header')

<form action="/events/{{ $event->id }}" method="POST">
    @method('PUT')
    @csrf
    <div class="max-w-md mx-auto shadow-lg p-5 my-5 flex flex-col bg-slate-100">
        <h1 class="text-center text-2xl font-medium">Edit Event</h1>

        <label class="mt-3" for="Event Name">Event Name</label>
        <input name="name" class="rounded shadow-md outline-blue-500 p-2" type="text" value='{{ $event->name }}'>
        @error('name')
            <p>There is an error</p>
        @enderror

        <label class="mt-3" for="slug">Slug</label>
        <input name="slug" class="rounded shadow-md outline-blue-500 p-2" type="text" value='{{ $event->slug }}'>
        @error('slug')
            <p>There is an error</p>
        @enderror

        <label class="mt-3" for="Start Date">Start Date</label>
        <input name="startAt" class="rounded shadow-md outline-blue-500 p-2" type="date" value={{ $event->startAt }}>
        @error('startAt')
            <p>There is an error</p>
        @enderror

        <label class="mt-3" for="End Date">End Date</label>
        <input name="endAt" class="rounded shadow-md outline-blue-500 p-2" type="date" value={{ $event->endAt }}>
        @error('endAt')
            <p>There is an error</p>
        @enderror

        <div class="flex w-full">
            <button name="login_user" type="submit"
                class="mt-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full ml-2">
                Update Event
            </button>
        </div>

    </div>
</form>

@include('templates.footer')
