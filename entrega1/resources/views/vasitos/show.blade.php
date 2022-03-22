@extends('home.index')
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
          Type: {{ $viewData["vasito"]["type"] }}
        </h5>
        <p class="card-text">Amount: {{ $viewData["vasito"]["amount"] }}</p>
        <p class="card-text">Price: {{ $viewData["vasito"]["price"] }}</p>
        <p class="card-text">Discount: {{ $viewData["vasito"]["discount"] }}</p>
      </div>
      @if( auth::user()->type =='1' )
        <button  type="button" >
          <a href="{{ route('vasistos.delete', ['id'=> $viewData["vasito"]["id"]]) }}">Delete</a>
        </button>
      @endif
    </div>
  </div>
</div>
@endsection
