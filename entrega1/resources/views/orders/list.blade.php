@extends('layout.app')
@section('content')
<div class="row">
  @foreach ($viewData["orders"] as $order)
  <div class="col-md-4 col-lg-3 mb-3">
    <div class="card">
      <div class="card-body text-center">
        <a href="{{ route('orders.show', ['id'=> $order->getId()]) }}"
          class="mt-2 btn bg-primary text-white">{{__('id')}}: {{ $order->getId()}} {{__('total')}}: {{ $order->getTotal()}}</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection