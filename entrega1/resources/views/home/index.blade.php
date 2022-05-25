@extends('layout.app')
@section('content')
<div class="text-center">
  <h1>{{__('welcome')}}</h1>
</div>
  @foreach ($viewData["vasitos"] as $vasito)
  <div class="col-md-4 col-lg-3 mb-3">
    <div class="card">
      <img src= {{ $vasito->getImage() }} >
      <div class="card-body text-center">
        <a href="{{ route('vasitos.show', ['id'=> $vasito->getId()]) }}"
          class="mt-2 btn bg-primary text-white">{{__('name')}}: {{ $vasito->getName()}} {{__('id')}}: {{ $vasito->getId()}}</a>
      </div>
    </div>
  </div>
  @endforeach
  <div class="row">
  @foreach ($viewData["wines"] as $wine)
  <div class="col-md-4 col-lg-3 mb-3">
    <div class="card">
    <img src= {{ $wine->getImage() }} >
      <div class="card-body text-center">
        <a href="{{ route('wines.show', ['id'=> $wine->getId()]) }}"
          class="mt-2 btn bg-primary text-white">{{__('name')}}: {{ $wine->getName()}} {{__('id')}}: {{ $wine->getId()}}</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
<div class="row">
  @foreach ($viewData["combos"] as $combo)
  <div class="col-md-4 col-lg-3 mb-3">
    <div class="card">
      <img src= {{ $combo->getImage() }} >
      <div class="card-body text-center">
        <a href="{{ route('combos.show', ['id'=> $combo->getId()]) }}"
          class="mt-2 btn bg-primary text-white">{{__('name')}}: {{ $combo->getName()}} {{__('id')}}: {{ $combo->getId()}}</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection