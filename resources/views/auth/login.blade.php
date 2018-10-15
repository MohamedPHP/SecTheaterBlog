@extends('frontend.layout.app')

@section('content')
    <section class="height-100 imagebg text-center" data-overlay="4">
        <div class="background-image-holder">
            <img alt="background" src="{{ asset('frontend/img/inner-6.jpg') }}" />
        </div>
        <div class="container pos-vertical-center">
            <div class="row">
                <div class="col-md-7 col-lg-5">
                    <h2>Login to continue</h2>
                    <p class="lead">
                        Welcome back, sign in with your existing Stack account credentials
                    </p>
                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <input type="email" name="email" placeholder="Email" required />
                                @if ($errors->has('email'))
                                    <span style="color:red">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="col-md-12">
                                <input type="password" name="password" placeholder="Password" required />
                                @if ($errors->has('password'))
                                    <span style="color:red">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn--primary type--uppercase" type="submit">Login</button>
                            </div>
                        </div>
                        <!--end of row-->
                    </form>
                    <span class="type--fine-print block">Dont have an account yet?
                        <a href="{{ url('/register') }}">Create account</a>
                    </span>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
@endsection
