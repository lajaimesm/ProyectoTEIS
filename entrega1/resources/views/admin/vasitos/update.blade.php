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
                                placeholder="Name" value="{{ $viewData['vasito']->getName() }}">

                            <label for="exampleInputAmount">    {{__('amount')}}</label>
                            <input type="numeric" class="form-control" name="amount" aria-describedby="nameHelp"
                                placeholder="Amount" value="{{ $viewData['vasito']->getAmount() }}">
                            
                            <label for="exampleInputPrice">    {{__('price')}}</label>
                            <input type="numeric" class="form-control" name="price" aria-describedby="nameHelp"
                                placeholder="Price" value="{{ $viewData['vasito']->getPrice() }}">

                            <label for="exampleInputDiscount">    {{__('discount')}}</label>
                            <input type="numeric" class="form-control" name="discount" aria-describedby="nameHelp"
                                placeholder="Discount" value="{{ $viewData['vasito']->getDiscount() }}">

                            <label for="exampleInputDescription">    {{__('description')}}</label>
                            <input type="text" class="form-control" name="description" aria-describedby="nameHelp"
                                placeholder="Description" value="{{ $viewData['vasito']->getDescription() }}">

                            <div class="mb-3 mt-2">
                                <label for="formFile" class="form-label">    {{__('image')}}</label>
                                <input class="form-control" type="text"
                                    value="{{ $viewData['vasito']->getImage() }}" name="image">
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