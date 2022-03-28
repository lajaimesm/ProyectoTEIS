@extends('layouts.app')
@section('content')
<div class="row">
  @foreach ($viewData["wines"] as $wine)
  <div class="col-md-4 col-lg-3 mb-3">
    <div class="card">
      <div class="card-body text-center">
        <a href="{{ route('orders.show', ['id'=> $order->getId()]) }}"
          class="btn bg-primary text-black">Name: {{ $order->getName()}} Id: {{ $order->getId()}}</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection