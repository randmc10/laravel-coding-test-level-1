    @include('templates.header')
    <div class="max-w-7xl mx-auto flex justify-end">
        <a href="/events/create"
            class="mt-5 inline-flex items-center justify-center whitespace-nowrap rounded-md border bordetransparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Add
            new Event
        </a>
    </div>
    <div class="max-w-7xl mx-auto shadow-lg p-5 mt-3 rounded bg-slate-200">
        <table class="table-auto bg-slate-100" id="table">
            <thead>
                <tr class="text-center">
                    <th>Event Name</th>
                    <th>Start Date </th>
                    <th>End Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script>
        $(function() {
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url('events/datatables') }}',
                columns: [{
                        data: 'name',
                        name: 'name',
                        render: function(data, type, row) {
                            return "<a href='/events/" + row.id + "'>" + row.name + "</a>"
                        }
                    },
                    {
                        data: 'startAt',
                        name: 'startAt'
                    },
                    {
                        data: 'endAt',
                        name: 'endAt'
                    },
                    {
                        render: function(data, type, row) {
                            return "<div class='flex justify-center'><a class='bg-indigo-600 hover:bg-indigo-700 rounded text-white px-2 py-1' href='/events/" +
                                row.id + "'>" + 'View Details' + "</a></div>"
                        }
                    }
                ]
            });
        });
    </script>

    @include('templates.footer')
