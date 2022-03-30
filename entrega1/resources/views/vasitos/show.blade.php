@extends('home.index')
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
          Name: {{ $viewData["vasito"]->getName() }}
        </h5>
        <img src= {{ $viewData["vasito"]->getImage() }} >
        <p class="card-text">Amount: {{ $viewData["vasito"]->getAmount() }}</p>
        <p class="card-text">Price: {{ $viewData["vasito"]->getPrice() }}</p>
        <p class="card-text">Discount: {{ $viewData["vasito"]->getDiscount() }}</p>
        <p class="card-text">Description: {{ $viewData["vasito"]->getDescription() }}</p>
      </div>
        <button  type="button" >
          <a href="{{ route('vasitos.delete', ['id'=> $viewData['vasito']->getId()]) }}">Delete</a>
        </button>
        <button  type="button" >
          <a href="{{ route('vasitos.update', ['id'=> $viewData['vasito']->getId()]) }}">Update</a>
        </button>
    </div>
  </div>
</div>
@endsection