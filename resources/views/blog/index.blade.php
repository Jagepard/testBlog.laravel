@extends('layouts.blog')

@section('content')

<br>

<div class="row row-cols-1 row-cols-md-3 g-4" data-masonry='{"percentPosition": true }'>

@foreach ($materials as $material)
    
    <div class="col">
    <div class="card">
    <a href="{{ url('/') }}/material/{{ $material->id }}_{{ $material->slug }}">
    @if(!empty($material->image))
    <img width="350" src="{{ url('/') }}/storage/images/{{ $material->image }}" class="card-img-top" alt="{{ $material->title }}">
    @endif
    </a>
      <div class="card-body">
        <h5 class="card-title"><a class="link-secondary link-underline link-underline-opacity-0" href="{{ url('/') }}/material/{{ $material->id }}_{{ $material->slug }}">{{ $material->title }}</a></h5>
      </div>
    </div>
  </div>

@endforeach

</div>
<hr>
<div>
    {{ $materials->links() }}
</div>

@stop
