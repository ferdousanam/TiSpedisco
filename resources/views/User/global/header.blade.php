<header class="header-user">
    <div class="container">
        <section class="navigation-bar">
            <nav class="navbar navbar-default nav-transparent nav-green nav-padding">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand brand-custom" href="{{ route('home') }}"><img src="{{asset('images/home-img/w-logo.png')}}"
                                                                           alt=""></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="#">Spedisci</a></li>
                            <li><a href="#">Traccia</a></li>
                            <li><a href="#">Registrati</a></li>
                        </ul>
                        <div class="navbar-form navbar-right">
                            <a class="btn btn-login-user" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                Esci
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </section>
    </div>

</header>
