@extends('home.index')
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
          Type: {{ $viewData["wine"]["type"] }}
        </h5>
        <p class="card-text">Amount: {{ $viewData["wine"]["amount"] }}</p>
        <p class="card-text">Price: {{ $viewData["wine"]["price"] }}</p>
        <p class="card-text">Discount: {{ $viewData["wine"]["discount"] }}</p>
      </div>
      @if( auth::user()->type =='1' )
        <button  type="button" >
          <a href="{{ route('wines.delete', ['id'=> $viewData["wine"]["id"]]) }}">Delete</a>
        </button>
      @endif
    </div>
  </div>
</div>
@endsection
