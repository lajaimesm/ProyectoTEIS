@extends('layout.admin')
@section('content')
<h6>{{__('searchWinesNames') }}</h6>
  <div class="input-group rounded">
    <form action="{{ route('admin.wines.nameSearch') }}" method="GET">
      <input type="text" placeholder="{{__('enterSearch') }}" name="search" aria-describedby="search-addon" required/>
      <button type="submit" class=" btn btn-primary" style="height:25px; width:25px" ><i class="fa fa-search"></i></button>
    </form>
  </div>
@endsection