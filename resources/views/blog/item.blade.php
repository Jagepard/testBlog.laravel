@extends('layouts.blog')

@section('content')

<br>
@if(!empty($material['image']))
    <img src="{{ url('/') }}/uploads/{{ $material->image }}" class="card-img-top" alt="{{ $material->title }}">
@endif

<h2>{{ $material->title }}</h2>
<p>{{ $material->text }}</p>

@stop