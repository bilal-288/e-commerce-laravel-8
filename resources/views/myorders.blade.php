@extends('master')
@section('content')
<div class="custom-product">
    <div class="col-sm-10">
        <div class="trending-wrapper">
            <h2>My Orders</h2>
            @foreach($orders as $showorders)
            <div class="row searched-item cart-list-divider">
                <div class="col-sm-3">
                    <a href="{{ route('product.detail', ['id'=>$showorders->id]) }}">
                        <img class="trending-image" src="{{$showorders->gallery}}">
                    </a>
                </div>

                <div class="col-sm-4">
                    <div class="">
                        <h2>Name  :  {{$showorders->name}}</h2>
                        <h5>Delivery Status   :   {{$showorders->status}}</h5>
                        <h5>Address   :    {{$showorders->address}}</h5>
                        <h5>Payment Status    :    {{$showorders->payment_status}}</h5>
                        <h5>Payment Method   :   {{$showorders->payment_method}}</h5>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </div>


</div>
@endsection