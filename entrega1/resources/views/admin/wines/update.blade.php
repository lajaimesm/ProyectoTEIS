@extends('layout.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('enterWine')}}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.wines.updated') }}" enctype="multipart/form-viewdata">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="id" value="{{ $viewData['wine']->getId() }}">

                            <label for="exampleInputName">{{__('name')}}</label>
                            <input type="text" class="form-control" name="name" aria-describedby="nameHelp"
                                placeholder="Name" value="{{ $viewData['wine']->getName() }}">

                            <label for="exampleInputAmount">{{__('amount')}}</label>
                            <input type="numeric" class="form-control" name="amount" aria-describedby="nameHelp"
                                placeholder="Amount" value="{{ $viewData['wine']->getAmount() }}">
                            
                            <label for="exampleInputPrice">{{__('price')}}</label>
                            <input type="numeric" class="form-control" name="price" aria-describedby="nameHelp"
                                placeholder="Price" value="{{ $viewData['wine']->getPrice() }}">

                            <label for="exampleInputDiscount">{{__('discount')}}</label>
                            <input type="numeric" class="form-control" name="discount" aria-describedby="nameHelp"
                                placeholder="Discount" value="{{ $viewData['wine']->getDiscount() }}">

                            <div class="mb-3 mt-2">
                                <label for="formFile" class="form-label">{{__('image')}}</label>
                                <input class="form-control" type="text"
                                    value="{{ $viewData['wine']->getImage() }}" name="image">
                            </div>
                            <br>
                            <input class="btn btn-success" type="submit" value="Update" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection