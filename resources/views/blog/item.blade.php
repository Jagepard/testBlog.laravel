@extends('layouts.blog')

@section('content')

<br>
@if(!empty($material['image']))
    <img src="{{ url('/') }}/storage/images/{{ $material->image }}" class="card-img-top" alt="{{ $material->title }}">
@endif

<h2>{{ $material->title }}</h2>
<p>{{ $material->text }}</p>

@stop