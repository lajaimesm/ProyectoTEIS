@extends('layout.app')
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
        {{__('name')}}: {{ $viewData["wine"]->getName() }}
        </h5>
        <img src= {{ $viewData["wine"]->getImage() }} >
        <p class="card-text">{{__('amount')}}: {{ $viewData["wine"]->getAmount() }}</p>
        <p class="card-text">{{__('price')}}: {{ $viewData["wine"]->getPrice() }}</p>
        <p class="card-text">{{__('discount')}}: {{ $viewData["wine"]->getDiscount() }}</p>
  </div>
  <div>
    <a class="mt-2 btn bg-primary text-white" href="{{ route('cart.addWine',['id' => $viewData['wine']->getId()]) }}">{{__('addToCart')}}</a>
  </div>
</div>
@endsection