@extends('layout.app')
@section('content')
<h1>Hish Discount in wines</h1>
<div class="row">
  @foreach ($viewData["wines"] as $wine)
  <div class="col-md-4 col-lg-3 mb-3">
    <div class="card">
      <img src= {{ $wine->getImage() }} >
      <div class="card-body text-center">
        <a href="{{ route('wines.show', ['id'=> $wine->getId()]) }}"
          class="mt-2 btn bg-primary text-white">{{__('name')}}: {{ $wine->getName()}} {{__('discount')}}: {{ $wine->getDiscount()}} {{__('price')}}: {{ $wine->getPrice()}}</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
