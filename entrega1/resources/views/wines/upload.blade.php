@if(!is_null( auth::user()) &&  auth::user()->type =='1')
@extends('home.index')
@section('content')
<div class="text-center">
Elemento creado satisfactoriamente
</div>
@endsection
@else
<script>window.location = "{{ route('home.index') }}";</script>
@endif
