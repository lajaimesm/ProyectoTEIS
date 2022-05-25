@extends('layout.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('enterCombo')}}</div>
                <div class="card-body">
                <form method="POST" action="{{ route('admin.combos.updated') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $viewData['combo']->getId() }}">
                        <label for="exampleInputName">{{ __('name') }}</label>
                        <input type="text" class="form-control mb-2" placeholder="{{ __('enterName') }}" name="name" value="{{ old('name') }}" />
                        <label for="exampleInputAmount">{{ __('amount') }}</label>
                        <input type="text" class="form-control mb-2" placeholder="{{ __('enterAmount') }}"  name="amount" value="{{ old('amount') }}" />
                        <label for="exampleInputPrice">{{ __('price') }}</label>
                        <input type="text" class="form-control mb-2" placeholder="{{ __('enterPrice') }}" name="price" value="{{ old('price') }}" />
                        <label for="exampleInputDiscount">{{ __('discount') }}</label>
                        <input type="text" class="form-control mb-2" placeholder="{{ __('enterDiscount') }}" name="discount" value="{{ old('discount') }}" />
                        <label for="exampleInputImage">{{ __('image') }}</label>
                        <input type="hidden" value="{{ $viewData['combo']->getImage() }}" name="imageNow">
                        <input type="file" id="upload-file"  class="form-control mb-2" name="image" value="{{ old('image') }}">
                        <input type="submit" class="mt-2 btn bg-primary text-white" value="{{ __('update') }}" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection