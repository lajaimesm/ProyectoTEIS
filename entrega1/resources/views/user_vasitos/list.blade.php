@extends('layouts_user.list')
@section('content')
<div class="container2">
  @foreach ($viewData["vasitos"] as $vasito)
    <div class="card">
    <div class="imgBx">
    <img src= {{ $vasito->getImage() }} >
      <div class="contentBx">
        <a href="{{ route('user_vasitos.show', ['id'=> $vasito->getId()]) }}"
          class="btn bg-primary text-black">
          {{__('name') }}: {{ $vasito->getName()}}
          {{__('price') }}: {{ $vasito->getPrice()}} </a>
      </div>
  </div>
  </div>

  @endforeach
    @endsection
