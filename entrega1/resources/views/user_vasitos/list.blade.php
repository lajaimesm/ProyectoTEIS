@extends('layouts_user.app')
@section('content')
<div class="row">
  @foreach ($viewData["vasitos"] as $vasito)
  <div class="col-md-4 col-lg-3 mb-3">
    <div class="card">
    <img src= {{ $vasito->getImage() }} >
      <div class="card-body text-center">
        <a href="{{ route('user_vasitos.show', ['id'=> $vasito->getId()]) }}"
          class="btn bg-primary text-black">{{__('name') }}: {{ $vasito->getName()}} {{__('price') }}: {{ $vasito->getPrice()}}</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
