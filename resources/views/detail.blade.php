@extends('master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <img class="detail-img" src="{{$products_details['gallery']}}">
        </div>

        <div class="col-sm-6">
            <a href="/">
                Go back
            </a>
            <h2>{{$products_details['name']}}</h2>
            <h3>Price: {{$products_details['price']}}</h3>
            <h4>Details: {{$products_details['description']}}</h4>
            <h4>Category: {{$products_details['category']}}</h4>
            <br><br>
            <form action="{{route('product.cart')}}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{$products_details['id']}}">
                <button class = "btn btn-primary">Add to Cart</button>
            </form>
           
            <br><br>
            <button class = "btn btn-success">Buy Now</button>
        </div>

    </div>
    
</div>
@endsection