@extends('admin.card')
@section('content-admin-card')

    <div class="card-header mb-2">
        <a class="btn btn-outline-primary" href="{{ route('product.create') }}"><i class="bi bi-plus-lg me-1"></i>Create</a>
    </div>
    <div class="card-body">
        <table class="table table-sm table-hover" id="product-table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
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
            $('#product-table').DataTable({
                processing: true,
                serverSide: true,
                order: [
                    [0, "desc"]
                ],
                ajax: '{!! route('product.datatables') !!}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'category',
                        name: 'category'
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
