@extends('layouts.admin')

@section('content')

<table class="table table-striped table-hover">

<tr>
    <td>#</td>
    <td></td>
    <td></td>
    <td><a href="{{ url('/') }}/admin/material/add"><button type="button" class="btn btn-info">add</button></a></td>
</tr>
@foreach ($materials as $material)
    <tr>
    <td><p>{{ $material->id }}</p></td>
    <td><?php if (!empty($material->image)): ?><img src="{{ url('/') }}/storage/images/thumb/{{ $material->image }}"><?php endif; ?></td>
    <td><p><?= $material->title ?></p></td>
    
    <td>
    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
        <a href="{{ url('/') }}/admin/material/edit/{{ $material->id }}"><button type="button" class="btn btn-success">edit</button></a>
        <a href="{{ url('/') }}/admin/material/delete/{{ $material->id }}"><button type="button" class="btn btn-danger">delete</button></a>
    </div>
    </td>
    </tr>
@endforeach

</table>

{{ $materials->links() }}

@stop
