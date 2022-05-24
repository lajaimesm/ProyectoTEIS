@extends('layout.admin')
@section('content')
<h1>{{__('top3LowVasito')}}</h1>
<div class="row">
  @foreach ($viewData["vasitos"] as $vasito)
  <div class="col-md-4 col-lg-3 mb-3">
    <div class="card">
      <img src= {{ $vasito->getImage() }} >
      <div class="card-body text-center">
        <a href="{{ route('admin.vasitos.show', ['id'=> $vasito->getId()]) }}"
          class="mt-2 btn bg-primary text-white">{{__('name')}}: {{ $vasito->getName()}} {{__('price')}}: {{ $vasito->getPrice()}}</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
