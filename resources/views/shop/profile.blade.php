@extends ('layouts.master')

@section ('page-title')
    Shop | {{ $shop->name }}
@endsection

@push ('specific-style')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/shop.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/star-rating.min.css') }}" />
@endpush

@section ('content')
    @if (Session::has('flash_message_success') || Session::has('flash_message_error'))
        <div class="container-fluid">
    @else
        <div class="container-fluid padding-top-6-em">
    @endif
    <div class="row">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner height-400-px">
                <div class="item active">
                    <img class="slider-image" src="/storage/shops/slider/{{ $shop->slider_img_1 }}" alt="shop-slider-1" >
                </div>
                <div class="item">
                    <img class="slider-image" src="/storage/shops/slider/{{ $shop->slider_img_2 }}" alt="shop-slider-2" >
                </div>
                <div class="item">
                    <img class="slider-image" src="/storage/shops/slider/{{ $shop->slider_img_3 }}" alt="shop-slider-3" >
                </div>
            </div>

            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>

<div class="container padding-top-15-px">
    <div class="col-xs-2 sidebar">
        <div class="shop-logo-container">
            <img class="shop-logo" src="/storage/shops/{{ $shop->logo }}" alt="logo">
        </div>
        <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="{{ route('shop.show', $shop) }}">{{ $shop->name }}</a></li>
            <li><a href="{{ route('shop.show', $shop) }}">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Post</a></li>
            <li><a href="#">Event</a></li>
            <li><a href="{{ route('food.index', $shop) }}">Food Menu</a></li>
            <li><a href="{{ route('review.index', $shop) }}">Reviews</a></li>
            <li><a href="#">Photos</a></li>
        </ul>
    </div>

    <div class="col-xs-7">
        @yield ('inner-content')
    </div>

	<div class="col-xs-3 content">
        {{--shop button--}}
        <div class="shop-btn">
            @if( null !== Auth::user() )
                @if ( Auth::user()->isOwnerOf($shop) )
                    <a class="btn btn-default" href="{{ route('shop.edit', $shop) }}">
                        Edit Shop &nbsp;
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                @elseif ( Auth::user()->isA('user') )
                    <a class="btn btn-default" href="#">
                        Follow &nbsp;
                        <span class="glyphicon glyphicon-bookmark"></span>
                    </a>
                @endif
            @else
                <a class="btn btn-default" href="#">
                    Follow &nbsp;
                    <span class="glyphicon glyphicon-bookmark"></span>
                </a>
            @endif
        </div>

        <div class="panel panel-default">
            <ul class="nav nav-pills nav-stacked">
                <li>
                    <form class="navbar-form" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="search">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </div>
                    </form>
                </li>
                <li><a href="#">Rating: 
                    @for ($i = 1; $i <= 5 ; $i++)
                    <span class="glyphicon glyphicon-star{{ ($i <= $shop->rating) ? '' : '-empty'}}"></span>
                    @endfor
                </a></li>
                <li><a href="#">Working Time: 7am-5pm</a></li>
                <li><a href="#">Phone: {{ $shop->phone }}</a></li>
                <li><a href="#">Email: {{ $shop->email }} </a></li>
                <li><a href="#">Address: {{ $shop->address }} </a></li>
                <li><a href="#">Map </a></li>
                <li><a href="#">Services: </a></li>
                <li><a href="#">Graph: </a></li>
            </ul>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script src="{{ asset('js/star-rating.min.js') }}"></script>
@endpush
