@extends('master')
@section('content')
<div class="custom-product">
    <div class="col-sm-10">
        <div class="trending-wrapper">
            <h2>Cart products</h2>
            <a class="btn btn-success" href="{{route('products.ordernow')}}">Order Now</a><br><br>
            @foreach($products as $showproducts)
            <div class="row searched-item cart-list-divider">
                <div class="col-sm-3">
                    <a href="{{ route('product.detail', ['id'=>$showproducts->id]) }}">
                        <img class="trending-image" src="{{$showproducts->gallery}}">
                    </a>
                </div>

                <div class="col-sm-4">
                    <div class="">
                        <h2>{{$showproducts->name}}</h2>
                        <h5>{{$showproducts->description}}</h5>
                    </div>

                </div>

                <div class="col-sm-3">
                    <a href="{{ route('cart.remove', ['id'=>$showproducts->cart_id]) }}" class="btn btn-warning">Remove To Cart</a>
                </div>
            </div>
            @endforeach
        </div>
        <a class="btn btn-success" href="{{route('products.ordernow')}}">Order Now</a><br><br>
    </div>


</div>
@endsection