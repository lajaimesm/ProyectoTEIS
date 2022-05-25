@extends('layout.app')
@section('content')
  <div class="row justify-content-center">
    <div class="col-md-12">
    <h1>{{__('productsInCart')}}</h1>
      <ul>
      @if (!is_null($viewData) && isset($viewData['wines']))
        @foreach($viewData["wines"] as $key => $wine)
          <li>
            <p>
            {{__('id')}}: {{  $wine->getId() }} - 
            {{__('name')}}: {{ $wine->getName() }} -
            {{__('price')}}: {{ $wine->getPrice() }}
            </p>
          </li>
        @endforeach
      @endif
      </ul>
      <ul>
      @if (!is_null($viewData) && isset($viewData['vasitos']))
        @foreach($viewData["vasitos"] as $key => $vasito)
          <li>
            <p>
            {{__('id')}}: {{  $vasito->getId() }} - 
            {{__('name')}}: {{ $vasito->getName() }} -
            {{__('price')}}: {{ $vasito->getPrice() }}
            </p>
          </li>
        @endforeach
      @endif
      </ul>
      <ul>
      @if (!is_null($viewData) && isset($viewData['combos']))
        @foreach($viewData["combos"] as $key => $combo)
          <li>
          <p>
            {{__('id')}}: {{  $combo->getId() }} - 
            {{__('name')}}: {{ $combo->getName() }} -
            {{__('price')}}: {{ $combo->getPrice() }}
          </p>
          </li>
        @endforeach
      @endif
      </ul>
      <h1>
        {{__('total')}} - {{$viewData["total"]}}
      </h1>
      <a class="mt-2 btn bg-primary text-white" href="{{ route('cart.removeAll') }}">{{__('removeAllProducts')}}</a>
      <a class="mt-2 btn bg-primary text-white" href="{{ route('cart.purchase') }}">{{__('pay')}}</a>
    </div>
  </div>
</div>
@endsection
