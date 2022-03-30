@extends('home.index')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Enter wine data</div>
          <div class="card-body">
            @if($errors->any())
            <ul id="errors" class="alert alert-danger list-unstyled">
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
            @endif
            <form method="POST" action="{{ route('items.upload') }}">
              @csrf
              <input type="text" class="form-control mb-2" placeholder="Enter amount" name="amount" value="{{ old('amount') }}" />
              <input type="submit" class="btn btn-primary" value="Register" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection