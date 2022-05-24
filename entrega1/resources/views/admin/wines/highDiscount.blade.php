@extends('layout.admin')
@section('content')
<h1>High discount in wines</h1>
<div class="row">
  @foreach ($viewData["wines"] as $wine)
  <div class="col-md-4 col-lg-3 mb-3">
    <div class="card">
    <img src= {{ $wine->getImage() }} >
      <div class="card-body text-center">
        <a href="{{ route('admin.wines.show', ['id'=> $wine->getId()]) }}"
          class="btn bg-primary text-black">{{__('name')}}: {{ $wine->getName()}} {{__('discount')}}: {{ $wine->getDiscount()}} {{__('price')}}: {{ $wine->getPrice()}}</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection