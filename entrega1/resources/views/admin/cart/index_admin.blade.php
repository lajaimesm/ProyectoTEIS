@extends('layout.admin')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
    <h1>{{__('availableProducts')}}</h1>
    <h2>{{__('wines')}}</h2>
    @if (!is_null($viewData) && isset($viewData['wines']))
                        @if (count($viewData['wines']) > 0)
                            <h3>{{ __('messages.wine') }}</h3>
                            <ul class="ul-list-cart">
                                @foreach ($viewData['wines'] as $item)
                                    <li class="card card-item card-item-cart">
                                        <div class="list-column">
                                            <h5>{{ $item->getId() }}</h5>
                                            <p>{{ $item->getName() }}</p>
                                            <p>{{ $item->getPrice() }}$</p>
                                            <label for="exampleInputName"
                                                class="font-weight-bold">{{ __('messages.wine') }}</:
                                                {{ $quantityWine[$item->getId()] }}
                                            </label>
                                            <a class="btn btn-success"
                                                href="{{ route('admin.wines.show', $item->getId()) }}">{{ __('messages.wine') }}</</a>
                                        </div>
                                    </li>

                                @endforeach
                            </ul>

                        @endif
                    @endif
    <h2>{{__('vasitos')}}</h2>
    
  </div>
</div>
@endsection