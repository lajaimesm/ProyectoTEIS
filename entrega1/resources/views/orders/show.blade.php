@extends('layout.app')
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
        {{__('id')}}: {{ $viewData["order"]->getId() }}
        </h5>
        <p class="card-text">{{__('total')}}: {{ $viewData["order"]->getTotal() }}</p>
        @foreach ($viewData["items"] as $item)
            <p class="card-text">{{__('name')}}: {{ $item->getName() }}</p>
        @endforeach
  </div>
</div>
@endsection