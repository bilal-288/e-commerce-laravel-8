@extends('master')
@section('content')
<div class="custom-product">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            @foreach($data as $showproducts)
                <div class="item {{$showproducts['id']==1?'active':' '}}">
                    <a href="{{ route('product.detail', ['id'=>$showproducts->id]) }}">
                <img class="slider-img" src="{{$showproducts['gallery']}}" alt="Chania">
                <div class="carousel-caption slider-text">
                    <h3>{{$showproducts['name']}}</h3>
                    <p>{{$showproducts['description']}}</p>
                </div>
                </a>

            </div>
            @endforeach

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="trending-wrapper">
            <h3>Trending products</h3>

            @foreach($data as $showproducts)
            <div class="trending-item">
                <a href="{{ route('product.detail', ['id'=>$showproducts->id]) }}">
                <img class="trending-image" src="{{$showproducts['gallery']}}" alt="Chania">
                <div class="">
                    <h3>{{$showproducts['name']}}</h3>
                </div>
                </a>
            </div>
            @endforeach
        </div>

    </div>
</div>
@endsection