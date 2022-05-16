@extends('admin.card')
@section('content-admin-card')

    <div class="card-header mb-2">
        <a class="btn btn-outline-primary" href="{{ route('category.create') }}"><i
                class="bi bi-plus-lg me-1"></i>Create</a>
    </div>

    <div class="card-body">
        <table class="table table-sm table-hover" id="categories-table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Parent</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">#</th>
                </tr>
            </thead>

        </table>
    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#categories-table').DataTable({
                processing: true,
                serverSide: true,
                order: [
                    [0, "desc"]
                ],
                ajax: '{!! route('category.datatables') !!}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'parent',
                        name: 'parent'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'image',
                        name: 'image'
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
