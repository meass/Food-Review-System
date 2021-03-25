<nav class="navbar navbar-fixed-top" role="banner">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ route('homepage') }}">
                        <img class="logo" src="image/logo.png">
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-md-8">
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="#">Promotion</a></li>
                        <li><a href="#feature">Restaurant</a></li>
                        <li><a href="#bottom">Pub</a></li>
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            <li><a href="{{ route('register_as_shop_owner') }}">Register for Business</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('user.show', Auth::user()) }}">
                                            My Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
