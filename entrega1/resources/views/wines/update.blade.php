@extends('home.index')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Enter wine viewdata</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('wines.updated') }}" enctype="multipart/form-viewdata">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="id" value="{{ $viewData['wine']->getId() }}">

                            <label for="exampleInputName">Name</label>
                            <input type="text" class="form-control" name="name" aria-describedby="nameHelp"
                                placeholder="Name" value="{{ $viewData['wine']->getName() }}">

                            <label for="exampleInputAmount">Amount</label>
                            <input type="numeric" class="form-control" name="amount" aria-describedby="nameHelp"
                                placeholder="Amount" value="{{ $viewData['wine']->getAmount() }}">
                            
                            <label for="exampleInputPrice">Price</label>
                            <input type="numeric" class="form-control" name="price" aria-describedby="nameHelp"
                                placeholder="Price" value="{{ $viewData['wine']->getPrice() }}">

                            <label for="exampleInputDiscount">Discount</label>
                            <input type="numeric" class="form-control" name="discount" aria-describedby="nameHelp"
                                placeholder="Discount" value="{{ $viewData['wine']->getDiscount() }}">

                            <div class="mb-3 mt-2">
                                <label for="formFile" class="form-label">image</label>
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