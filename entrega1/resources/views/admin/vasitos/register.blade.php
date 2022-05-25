@extends('layout.admin')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{__('enterVasito')}}</div>
          <div class="card-body">
            @if($errors->any())
            <ul id="errors" class="alert alert-danger list-unstyled">
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
            @endif
            <form method="POST" action="{{ route('admin.vasitos.upload') }}" enctype="multipart/form-data">
              @csrf
              <label for="exampleInputName">{{ __('name') }}</label>
              <input type="text" class="form-control mb-2" placeholder="{{ __('enterName') }}" name="name" value="{{ old('name') }}" />
              <label for="exampleInputAmount">{{ __('amount') }}</label>
              <input type="text" class="form-control mb-2" placeholder="{{ __('enterAmount') }}"  name="amount" value="{{ old('amount') }}" />
              <label for="exampleInputPrice">{{ __('price') }}</label>
              <input type="text" class="form-control mb-2" placeholder="{{ __('enterPrice') }}" name="price" value="{{ old('price') }}" />
              <label for="exampleInputDiscount">{{ __('discount') }}</label>
              <input type="text" class="form-control mb-2" placeholder="{{ __('enterDiscount') }}" name="discount" value="{{ old('discount') }}" />
              <label for="exampleInputDescription">{{ __('description') }}</label>
              <input type="text" class="form-control mb-2" placeholder="{{ __('enterDescription') }}" name="description" value="{{ old('description') }}" />
              <label for="exampleInputImage">{{ __('image') }}</label>
              <input type="file" id="upload-file"  class="form-control mb-2" name="image" value="{{ old('image') }}">
              <input type="submit" class="mt-2 btn bg-primary text-white" value="{{ __('register') }}" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

