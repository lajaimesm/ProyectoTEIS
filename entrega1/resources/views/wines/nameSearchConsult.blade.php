@extends('layout.app')
@section('content')
<h6>{{__('searchWinesNames') }}</h6>
  <div class="input-group rounded">
    <form action="{{ route('wines.nameSearch') }}" method="GET">
      <input type="text" placeholder="Enter your search" name="search" aria-describedby="search-addon" required/>
      <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
    </form>
  </div>
@endsection