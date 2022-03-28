@extends('home.index')
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
          Name: {{ $viewData["wine"]->getName() }}
        </h5>
        <p class="card-text">Amount: {{ $viewData["wine"]->getAmount() }}</p>
        <p class="card-text">Price: {{ $viewData["wine"]->getPrice() }}</p>
        <p class="card-text">Discount: {{ $viewData["wine"]->getDiscount() }}</p>
      </div>
        <button  type="button" >
          <a href="{{ route('wines.delete', ['id'=> $viewData['wine']->getId()]) }}">Delete</a>
        </button>
    </div>
  </div>
</div>
@endsection
