@extends('layout.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('enterVasito')}}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.vasitos.updated') }}" enctype="multipart/form-viewdata">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="id" value="{{ $viewData['vasito']->getId() }}">

                            <label for="exampleInputName">    {{__('name')}}</label>
                            <input type="text" class="form-control" name="name" aria-describedby="nameHelp"
                                placeholder="{{__('name')}}" value="{{ $viewData['vasito']->getName() }}">

                            <label for="exampleInputAmount">    {{__('amount')}}</label>
                            <input type="numeric" class="form-control" name="amount" aria-describedby="nameHelp"
                                placeholder="{{__('amount')}}" value="{{ $viewData['vasito']->getAmount() }}">
                            
                            <label for="exampleInputPrice">    {{__('price')}}</label>
                            <input type="numeric" class="form-control" name="price" aria-describedby="nameHelp"
                                placeholder="{{__('price')}}" value="{{ $viewData['vasito']->getPrice() }}">

                            <label for="exampleInputDiscount">    {{__('discount')}}</label>
                            <input type="numeric" class="form-control" name="discount" aria-describedby="nameHelp"
                                placeholder="{{__('discount')}}" value="{{ $viewData['vasito']->getDiscount() }}">

                            <label for="exampleInputDescription">    {{__('description')}}</label>
                            <input type="text" class="form-control" name="description" aria-describedby="nameHelp"
                                placeholder="{{__('description')}}" value="{{ $viewData['vasito']->getDescription() }}">

                            <div class="mb-3 mt-2">
                                <label for="formFile" class="form-label">{{__('image')}}</label>
                                <input class="form-control" type="text" value="{{ $viewData['vasito']->getImage() }}" name="image">
                            </div>
                            <input type="file" class="form-control mb-2" placeholder="{{ __('enterImage') }}" name="image2" value="{{ old('image') }}" />
                            <br>
                            <input class = "mt-2 btn bg-primary text-white" type="submit" value="{{ __('update') }}"  />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection