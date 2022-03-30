@extends('home.index')
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
        {{__('name') }}: {{ $viewData["wine"]->getName() }}
        </h5>
        <img src= {{ $viewData["wine"]->getImage() }} >
        <p class="card-text">{{__('amount') }}: {{ $viewData["wine"]->getAmount() }}</p>
        <p class="card-text">{{__('price') }}: {{ $viewData["wine"]->getPrice() }}</p>
        <p class="card-text">{{__('discount') }}: {{ $viewData["wine"]->getDiscount() }}</p>
      </div>
    </div>
  </div>
</div>
@endsection

