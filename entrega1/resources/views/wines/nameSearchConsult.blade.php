@extends('layout.app')
@section('content')
<h6>{{__('searchWinesNames') }}</h6>
  <div class="input-group rounded">
    <form action="{{ route('wines.nameSearch') }}" method="GET">
      <input type="text" placeholder="Enter your search" name="search" aria-describedby="search-addon" required/>
      <button type="submit" class="mt-2 btn bg-primary text-white"><i class="fa fa-search"></i></button>
    </form>
  </div>
@endsection