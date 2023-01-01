@extends('admin.card')
@section('content-admin-card')

    <div class="card-header">
        <a class="btn btn-outline-primary" href="{{ route('hot-deals.create') }}"><i class="bi bi-plus-lg me-1"></i>Create</a>

    </div>
    <div class="card-body">
        <table class="table table-sm table-hover" id="hot-deals-table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Type</th>
                    <th scope="col">Status</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">#</th>
                </tr>
            </thead>

        </table>
    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#hot-deals-table').DataTable({
                processing: true,
                serverSide: true,
                order: [
                    [0, "desc"]
                ],
                ajax: '{!! route('hot-deals.datatables') !!}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'image',
                        name: 'image'
                    },
                    {
                        data: 'type',
                        name: 'type'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'start_date',
                        name: 'start_date'
                    },
                    {
                        data: 'end_date',
                        name: 'end_date'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ]
            });
        });
    </script>

@endpush
