<header class="section-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="/"><img class="logo" src="/images/logos/logo-alibaba.png"
                                                  alt="alibaba style e-commerce html template file"
                                                  title="alibaba e-commerce html css theme"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTop"
                    aria-controls="navbarTop" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTop">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            Sourcing </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Top Suppliers</a></li>
                            <li><a class="dropdown-item" href="#">Suppliers by Regions </a></li>
                            <li><a class="dropdown-item" href="#">Online Retailer </a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            Services </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Trade Assurance </a></li>
                            <li><a class="dropdown-item" href="#">Arabic</a></li>
                            <li><a class="dropdown-item" href="#">Logistics Service </a></li>
                            <li><a class="dropdown-item" href="#">Membership Services</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            Community </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Help Center</a></li>
                            <li><a class="dropdown-item" href="#">Submit a Dispute </a></li>
                            <li><a class="dropdown-item" href="#">For Suppliers </a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav">

                    @if(Auth::user())
                        <li class="nav-item p-1"><a href="{{ route('goods') }}">
                                <button class="btn btn-default   btn-warning  ">Goods for sale</button>
                            </a></li>
                    @endif

                    <li class="nav-item p-1">
                        <button class="btn btn-default {{HtmlHelpers::getActiveByCookieCode('uah',Cookie::get('currency_code'))}}"
                                onclick="reloadPageAndSetCookie('currency_code','uah');">₴
                        </button>
                    </li>
                    <li class="nav-item p-1">

                        <button class="btn btn-default {{HtmlHelpers::getActiveByCookieCode('usd',Cookie::get('currency_code'))}} "
                                onclick="reloadPageAndSetCookie('currency_code','usd');">$
                        </button>
                    </li>
                    <li class="nav-item p-1">
                        <button class="btn btn-default {{HtmlHelpers::getActiveByCookieCode('eur',Cookie::get('currency_code'))}}"
                                onclick="reloadPageAndSetCookie('currency_code','eur');">€
                        </button>
                    </li>


                </ul> <!-- navbar-nav.// -->
            </div> <!-- collapse.// -->
        </div>
    </nav>

    <section class="header-main shadow-sm">
        <div class="container">
            <div class="row-sm align-items-center">
                <div class="col-lg-4-24 col-sm-3">
                    <div class="category-wrap dropdown py-1">
                        <button type="button" class="btn btn-light  dropdown-toggle" data-toggle="dropdown"><i
                                    class="fa fa-bars"></i> Categories
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Machinery / Mechanical Parts / Tools </a>
                            <a class="dropdown-item" href="#">Consumer Electronics / Home Appliances </a>
                            <a class="dropdown-item" href="#">Auto / Transportation</a>
                            <a class="dropdown-item" href="#">Apparel / Textiles / Timepieces </a>
                            <a class="dropdown-item" href="#">Home & Garden / Construction / Lights </a>
                            <a class="dropdown-item" href="#">Beauty & Personal Care / Health </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-11-24 col-sm-8">
                    <form action="#" class="py-1">
                        <div class="input-group w-100">
                            <select class="custom-select" name="category_name">
                                <option value="">All type</option>
                                <option value="">Special</option>
                                <option value="">Only best</option>
                                <option value="">Latest</option>
                            </select>
                            <input type="text" class="form-control" style="width:50%;" placeholder="Search">
                            <div class="input-group-append">
                                <button class="btn btn-warning" type="submit">
                                    <i class="fa fa-search"></i> Search
                                </button>
                            </div>
                        </div>
                    </form> <!-- search-wrap .end// -->
                </div> <!-- col.// -->
                <div class="col-lg-9-24 col-sm-12">
                    <div class="widgets-wrap float-right row no-gutters py-1">
                        <div class="col-auto">
                            <div class="widget-header dropdown">


                                <a href="#" data-toggle="dropdown" data-offset="20,10">
                                    <div class="icontext">
                                        <div class="icon-wrap"><i class="text-warning icon-sm fa fa-user"></i></div>
                                        <div class="text-wrap text-dark">
                                            @guest
                                                Sign in <br>
                                                My account <i class="fa fa-caret-down"></i>
                                            @else
                                                Hi {{ Auth::user()->name }} <i class="fa fa-caret-down"></i>
                                            @endguest
                                        </div>
                                    </div>
                                </a>


                                <div class="dropdown-menu">
                                    @guest
                                        <form class="px-4 py-3" method="POST" action="{{ route('login') }}">
                                            {{ csrf_field() }}
                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label for="email" >Email address</label>
                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label for="password" >Password</label>
                                                <input id="password" type="password" class="form-control" name="password" required>
                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group pull-right text-right">

                                                    <button type="submit" class="btn btn-primary">
                                                        Login
                                                    </button>

                                            </div>
                                            <div class="form-group text-center">

                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                Forgot Your Password?
                                            </a>
                                            </div>
                                            <div class="form-group flex">
<ul class="nav">
    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login page</a></li>
    <li  class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register page</a></li>
</ul>
                                            </div>




                                        </form>











                                    @else
                                        <div class="px-4 py-3">
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                            <ul class="dropdown dropdown-menu-left p-xl-0">
                                                <a href="{{ route('goods') }}" class="dropdown-item" role="button"
                                                   aria-expanded="false" aria-haspopup="true" v-pre>

                                                    Goods for sale <span class="caret"></span>
                                                </a>

                                                <a href="#" class="dropdown-item" data-toggle="dropdown" role="button"
                                                   aria-expanded="false" aria-haspopup="true" v-pre>
                                                    Your account <span class="caret"></span>
                                                </a>
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    Logout
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}"
                                                      method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>


                                                </li>
                                            </ul>
                                        </div>

                                    @endguest
                                </div> <!--  dropdown-menu .// -->
                            </div>  <!-- widget-header .// -->
                        </div> <!-- col.// -->
                        <div class="col-auto">
                            <a href="#" class="widget-header">
                                <div class="icontext">
                                    <div class="icon-wrap"><i class="text-warning icon-sm fa fa-shopping-cart"></i>
                                    </div>
                                    <div class="text-wrap text-dark">
                                        Order <br> Protection
                                    </div>
                                </div>
                            </a>
                        </div> <!-- col.// -->
                        <div class="col-auto">
                            <a href="#" class="widget-header">
                                <div class="icontext">
                                    <div class="icon-wrap"><i class="text-warning icon-sm  fa fa-heart"></i></div>
                                    <div class="text-wrap text-dark">
                                        <span class="small round badge badge-secondary">0</span>
                                        <div>Favorites</div>
                                    </div>
                                </div>
                            </a>
                        </div> <!-- col.// -->
                    </div> <!-- widgets-wrap.// row.// -->
                </div> <!-- col.// -->
            </div> <!-- row.// -->
        </div> <!-- container.// -->
    </section> <!-- header-main .// -->
</header> <!-- section-header.// -->
