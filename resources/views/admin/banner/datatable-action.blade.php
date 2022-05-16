<div class="btn-group" role="group" aria-label="Basic mixed styles example">
    <a href="{{ route('banner.show', $model->id) }} " class="btn btn-sm btn-outline-info">
        <i class="bi bi-eye-fill"></i>
    </a>
    <a href="{{ route('banner.edit', $model->id) }}" class="btn btn-sm btn-outline-warning">
        <i class="bi bi-pencil-fill"></i>
    </a>
    {!! Form::open(['route' => ['banner.destroy', $model->id], 'method' => 'DELETE']) !!}
    {!! Form::button('<i class="bi bi-trash-fill"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-outline-danger']) !!}
    {!! Form::close() !!}
</div>
