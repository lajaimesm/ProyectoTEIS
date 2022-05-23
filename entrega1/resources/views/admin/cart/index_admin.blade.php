@extends('layout.admin')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
    <h1>{{__('availableProducts')}}</h1>
    <ul>
      @foreach($viewData["wines"] as $key => $wine)
        <li>
        {{__('id')}}: {{  $wine->getId() }} - 
        {{__('name')}}: {{ $wine->getName() }} -
        {{__('price')}}: {{ $wine->getPrice() }} -
          <a href="{{ route('admin.cart.add', ['id'=> $wine->getId() ]) }}">{{__('addToCart')}}</a>
        </li>
      @endforeach
    </ul>
    </div>
  </div>

  <a href="{{ route('admin.cart.purchase') }}">{{__('pay')}}</a>

  <div class="row justify-content-center">
    <div class="col-md-12">
    <h1>{{__('productsInCart')}}</h1>
      <ul>
        @foreach($viewData["productsInCart"] as $key => $wine)
          <li>
          {{__('id')}}: {{  $wine->getId() }} - 
          {{__('name')}}: {{ $wine->getName() }} -
          {{__('price')}}: {{ $wine->getPrice() }}
          </li>
        @endforeach
      </ul>
      <a href="{{ route('admin.cart.removeAll') }}">{{__('removeAllProducts')}}</a>
    </div>
  </div>
</div>
@endsection