@extends('admin.card')
@section('content-admin-card')

    <div class="card-header">
        <a class="btn btn-outline-primary" href="{{ route('general-setting.create') }}"><i class="bi bi-plus-lg me-1"></i>Create</a>

    </div>
    <div class="card-body">
        <table class="table table-sm table-hover" id="general-setting-table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Value</th>
                    <th scope="col">#</th>
                </tr>
            </thead>

        </table>
    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#general-setting-table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [
                    [0, "desc"]
                ],
                ajax: '{!! route('general-setting.datatables') !!}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'value',
                        name: 'value'
                    },
                    {
                        data: 'description',
                        name: 'description'
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
