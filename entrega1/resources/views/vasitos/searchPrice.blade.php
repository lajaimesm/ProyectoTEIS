@extends('layouts.app')
@section('content')
<div class="row">
  @foreach ($viewData["vasitos"] as $vasito)
  <div class="col-md-4 col-lg-3 mb-3">
    <div class="card">
    <img src= {{ $vasito->getImage() }} >
      <div class="card-body text-center">
        <a href="{{ route('vasitos.show', ['id'=> $vasito->getId()]) }}"
          class="btn bg-primary text-black">Name: {{ $vasito->getName()}} Price: {{ $vasito->getPrice()}}</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
