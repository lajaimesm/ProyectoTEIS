@extends('home.index')
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
          Type: {{ $viewData["wine"]->getType() }}
        </h5>
        <p class="card-text">Amount: {{ $viewData["wine"]->getAmount() }}</p>
        <p class="card-text">Price: {{ $viewData["wine"]->getPrice() }}</p>
        <p class="card-text">Discount: {{ $viewData["wine"]->getDiscount() }}</p>
      </div>
    </div>
  </div>
</div>
@endsection