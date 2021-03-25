<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Food Review System</title>

    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/prettyPhoto.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/style.css') }}">

</head>

<body class="homepage">
    @include('home.header')

    <section id="services" class="service-item" style="background-image: url(image/bg_services.png);">
        <div class="container">
            <button onclick="topFunction()" id="myBtn" title="Go to top">
                <img src="image/circled-up-2.png">
            </button>
            <div class="center wow fadeInDown">
                <form>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Search...">
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-md-12 wow fadeInDown" style="text-align: center;">
                    <div class="clients-comments text-center">
                        <a href="#"><img src="image/most.png" class="img-circle"></a>
                        <a href="#" id="#feature"><img src="image/rest.png" class="img-circle"></a>
                        <a href="#"><img src="image/pub.png" class="img-circle"></a>
                    </div>
                </div>
            </div>
            <h3>MOST POPULAR</h3><hr>
            <div class="row">
                @foreach ( $shops as $shop )
                    <div class="col-sm-6 col-md-4">
                        <div class="media services-wrap wow fadeInDown">
                            <a href="{{ route('shop.show', $shop) }}">
                                <img class="media-object" src="/storage/shops/{{ $shop->logo }}">
                            </a>
                            <p class="shop-name-on-homepage">{{ $shop->name }}
                            <p class="star-rating">
                                @for ($i = 1; $i <= 5 ; $i++)
                                    <span class="glyphicon glyphicon-star{{ ($i <= $shop->rating) ? '' : '-empty'}}"></span>
                                @endfor
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="more">
                <a href="#"></a><button>More</button></a>
            </div>
        </div>
    </section>

    <section id="feature" class="transparent-bg">
        <div class="container">
            <h3 style="color: black;">RESTAURANT</h3>
            <hr>
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="media services-wrap wow fadeInDown">
                        <a href="#"><img class="media-object" src="image/restaurants1.jpg" alt=""></a>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="media services-wrap wow fadeInDown">
                        <a href="#"><img class="media-object" src="image/restaurants1.jpg" alt=""></a>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="media services-wrap wow fadeInDown">
                        <a href="#"><img class="media-object" src="image/restaurants1.jpg" alt=""></a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="media services-wrap wow fadeInDown">
                        <a href="#"><img class="media-object" src="image/restaurants1.jpg" alt=""></a>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="media services-wrap wow fadeInDown">
                        <a href="#"><img class="media-object" src="image/restaurants1.jpg" alt=""></a>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="media services-wrap wow fadeInDown">
                        <a href="#"><img class="media-object" src="image/restaurants1.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="bottom">
        <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="container">
                <h3 style="color: black;">Pub</h3>
                <hr>
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="media services-wrap wow fadeInDown">
                            <a href="#"><img class="media-object" src="image/restaurants1.jpg" alt=""></a>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="media services-wrap wow fadeInDown">
                            <a href="#"><img class="media-object" src="image/restaurants1.jpg" alt=""></a>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="media services-wrap wow fadeInDown">
                            <a href="#"><img class="media-object" src="image/restaurants1.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="social">
                        <ul class="social-share">
                            <li><a href="#feature"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#bottom"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#feature"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#bottom"><i class="fa fa-skype"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer id="footer" class="midnight-blue">
        @include ('layouts.footer')
    </footer>

    <script src="{{ asset('bootstrap/js/jquery.js') }}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/jquery.isotope.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/wow.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('bootstrap/js/main.js') }}"></script>

    </body>
</html>
