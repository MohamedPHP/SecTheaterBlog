<!--end of notification-->
<div class="nav-container ">
    <div class="bar bar--sm visible-xs">
        <div class="container">
            <div class="row">
                <div class="col-3 col-md-2">
                    <a href="index.html">
                        <img class="logo logo-dark" alt="logo" src="{{ asset('frontend/img/logo-dark.png') }}" />
                        <img class="logo logo-light" alt="logo" src="{{ asset('frontend/img/logo-light.png') }}" />
                    </a>
                </div>
                <div class="col-9 col-md-10 text-right">
                    <a href="#" class="hamburger-toggle" data-toggle-class="#menu1;hidden-xs">
                        <i class="icon icon--sm stack-interface stack-menu"></i>
                    </a>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </div>
    <!--end bar-->
    <nav id="menu1" class="bar bar--sm bar-1 hidden-xs ">
        <div class="container">
            <div class="row">
                <div class="col-lg-1 col-md-2 hidden-xs">
                    <div class="bar__module">
                        <a href="{{ url('/') }}">
                            <img class="logo logo-dark" alt="logo" src="{{ asset('frontend/img/logo-dark.png') }}" />
                            <img class="logo logo-light" alt="logo" src="{{ asset('frontend/img/logo-light.png') }}" />
                        </a>
                    </div>
                    <!--end module-->
                </div>
                @if (!auth()->check())
                    <div class="col-lg-11 col-md-12 text-right text-left-xs text-left-sm">
                        <div class="bar__module">
                            <a class="btn btn--sm type--uppercase" href="{{ url('/login') }}">
                                <span class="btn__text">
                                    Login
                                </span>
                            </a>
                            <a class="btn btn--sm btn--primary type--uppercase" href="{{ url('/register') }}">
                                <span class="btn__text">
                                    Register
                                </span>
                            </a>
                        </div>
                        <!--end module-->
                    </div>
                @endif
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </nav>
    <!--end bar-->
</div>
