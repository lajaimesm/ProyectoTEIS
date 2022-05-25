@extends('layout.admin')
@section('content')
<div class="row">
  @foreach ($viewData["combos"] as $combo)
  <div class="col-md-4 col-lg-3 mb-3">
    <div class="card">
      <img src= {{ $combo->getImage() }} >
      <div class="card-body text-center">
        <a href="{{ route('admin.combos.show', ['id'=> $combo->getId()]) }}"
          class="mt-2 btn bg-primary text-white">{{__('name')}}: {{ $combo->getName()}} {{__('id')}}: {{ $combo->getId()}}</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
