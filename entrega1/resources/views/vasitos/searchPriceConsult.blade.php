@extends('layout.app')
@section('content')
<div>
  <h6>{{__('searchVasitosPrices') }}</h6>
  <form action="{{ route('vasitos.searchPrice') }}" method="GET">
    <input type="numeric" name="min" placeholder="Minimun" required/>
    <input type="numeric" name="max" placeholder="Maximun" required/>
    <button type="submit" class="mt-2 btn bg-primary text-white"><i class="fa fa-search"></i></button>
  </form>
  </div>
@endsection
