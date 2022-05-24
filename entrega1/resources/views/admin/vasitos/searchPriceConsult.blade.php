@extends('layout.admin')
@section('content')
<h6>{{__('searchVasitosPrices') }}</h6>
  <div class="input-group rounded">
    <form action="{{ route('admin.vasitos.searchPrice') }}" method="GET">
      <input type="numeric" name="min" placeholder="{{__('minimun') }}" required/>
      <input type="numeric" name="max" placeholder="{{__('maximun') }}" required/>
      <button type="submit" class=" btn btn-primary" style="height:25px; width:25px" ><i class="fa fa-search"></i></button>
    </form>
  </div>
@endsection
