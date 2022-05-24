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
  </div>
</div>
@endsection