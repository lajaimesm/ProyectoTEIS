@extends('home.index')
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-8">
    <form method="POST" action="{{ route('item.upload') }}">
        @csrf
        <input type="text" class="form-control mb-2" placeholder="Enter amount" name="amount" value="{{ old('amount') }}" />
        <input type="submit" class="btn btn-primary" value="Register" />
    </form>