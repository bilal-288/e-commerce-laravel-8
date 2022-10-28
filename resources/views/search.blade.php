@extends('master')
@section('content')
<div class="custom-product">
<div class="col-sm-4">
    <a href="#">Filter</a>
</div>

<div class="col-sm-4">
<div class="trending-wrapper">
        <h2>Searched products</h2>
        @foreach($search_result as $showproducts)
        <div class="searched-item">
            <a href="{{ route('product.detail', ['id'=>$showproducts->id]) }}">
                <h2>{{$showproducts['name']}}</h2>
                <h5>{{$showproducts['description']}}</h5>
                <img class="trending-image" src="{{$showproducts['gallery']}}" alt="Chania">
                <div class="">

                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>


</div>
@endsection