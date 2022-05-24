@extends('layout.app')
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
        {{__('name')}}: {{ $viewData["combo"]->getName() }}
        </h5>
        <img src= {{ $viewData["combo"]->getImage() }} >
        <p class="card-text">{{__('amount')}}: {{ $viewData["combo"]->getAmount() }}</p>
        <p class="card-text">{{__('price')}}: {{ $viewData["combo"]->getPrice() }}</p>
        <p class="card-text">{{__('discount')}}: {{ $viewData["combo"]->getDiscount() }}</p>
        <p class="card-text">{{__('vasito')}}: {{ $viewData["vasito"]->getName() }}</p>
        <p class="card-text">{{__('wine')}}: {{ $viewData["wine"]->getName() }}</p>
  </div>
  <div>
    <a href="{{ route('cart.addCombo',['id' => $viewData['combo']->getId()]) }}">{{__('addToCart')}}</a>
  </div>
</div>
@endsection