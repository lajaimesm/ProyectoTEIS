@extends('layout.admin')
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
        {{__('name')}}: {{ $viewData["wine"]->getName() }}
        </h5>
        <img src= {{ $viewData["wine"]->getImage() }} >
        <p class="card-text">{{__('amount')}}: {{ $viewData["wine"]->getAmount() }}</p>
        <p class="card-text">{{__('price')}}: {{ $viewData["wine"]->getPrice() }}</p>
        <p class="card-text">{{__('discount')}}: {{ $viewData["wine"]->getDiscount() }}</p>
      </div>
        <button  type="button" >
          <a href="{{ route('admin.wines.delete', ['id'=> $viewData['wine']->getId()]) }}">{{__('delete')}}</a>
        </button>
        <button  type="button" >
          <a href="{{ route('admin.wines.update', ['id'=> $viewData['wine']->getId()]) }}">{{__('update')}}</a>
        </button>
    </div>
  </div>
</div>
@endsection