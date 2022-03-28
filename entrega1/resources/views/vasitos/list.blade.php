@extends('home.index')
@section('content')
<div class="row">
  @foreach ($viewData["vasitos"] as $vasito)
  <div class="col-md-4 col-lg-3 mb-3">
    <div class="card">
      <div class="card-body text-center">
        <a href="{{ route('wines.show', ['id'=> $vasito->getId()]) }}"
          class="btn bg-primary text-black">type: {{ $vasito->getType()}} id: {{ $vasito->getId()}}</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection