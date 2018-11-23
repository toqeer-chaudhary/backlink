{{--navbar goes here--}}
{{--this file is for the links in navbar--}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            {{-- This will work only if the user is looged in--}}
            @auth
                 {{--These links will only be shown if the logged in user is admin--}}
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("post.create") }}">Posts</a>
                    </li>
                </ul>
            @endauth
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("login") }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("register") }}">{{ __('Register') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ ucfirst(Auth::user()->name) }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('user.show',auth()->id()) }}">
                                {{ __('Profile') }}
                            </a>
                            <hr>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>


{{--<!--Login Modal -->--}}
{{--<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalCenterTitle" aria-hidden="true">--}}
    {{--<div class="modal-dialog modal-dialog-centered" role="document">--}}
        {{--<div class="modal-content">--}}
            {{--<div class="modal-header">--}}
                {{--<h5 class="modal-title" id="exampleModalLongTitle">Login</h5>--}}
                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                    {{--<span aria-hidden="true">&times;</span>--}}
                {{--</button>--}}
            {{--</div>--}}
            {{--<div class="modal-body">--}}
                {{--<form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">--}}
                    {{--@csrf--}}
                    {{--<div class="form-group">--}}
                        {{--<label for="email">{{ __('E-Mail Address') }}</label>--}}
                        {{--<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  autofocus>--}}
                        {{--@if ($errors->has('email'))--}}
                            {{--<span class="invalid-feedback" role="alert">--}}
                                {{--<strong>{{ $errors->first('email') }}</strong>--}}
                            {{--</span>--}}
                        {{--@endif--}}
                    {{--</div>--}}

                    {{--<div class="form-group">--}}
                        {{--<label for="password">{{ __('Password') }}</label>--}}
                        {{--<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >--}}
                        {{--@if ($errors->has('password'))--}}
                            {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                {{--</span>--}}
                        {{--@endif--}}
                    {{--</div>--}}

                    {{--<div class="form-group">--}}
                        {{--<div class="form-check">--}}
                            {{--<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}
                            {{--<label class="form-check-label" for="remember">--}}
                                {{--{{ __('Remember Me') }}--}}
                            {{--</label>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="form-group">--}}
                        {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                            {{--{{ __('Forgot Your Password?') }}--}}
                        {{--</a>--}}
                        {{--<div class="float-right">--}}
                            {{--<button type="submit" class="btn btn-primary">--}}
                                {{--{{ __('Login') }}--}}
                            {{--</button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</form>--}}
            {{--</div>--}}
            {{--<div class="modal-footer">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-sm-6 col-xs-12">--}}
                        {{--<button class="loginBtn loginBtn--facebook">--}}
                            {{--Login with Facebook--}}
                        {{--</button>--}}
                    {{--</div>--}}

                    {{--<div class="col-sm-6 col-xs-12">--}}
                        {{--<button class="loginBtn loginBtn--google">--}}
                            {{--Login with Google--}}
                        {{--</button>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

{{--<!--Registeration Modal -->--}}
{{--<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalCenterTitle" aria-hidden="true">--}}
    {{--<div class="modal-dialog modal-dialog-centered" role="document">--}}
        {{--<div class="modal-content">--}}
            {{--<div class="modal-header">--}}
                {{--<h5 class="modal-title" id="exampleModalLongTitle">Registration</h5>--}}
                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                    {{--<span aria-hidden="true">&times;</span>--}}
                {{--</button>--}}
            {{--</div>--}}
            {{--<div class="modal-body">--}}
                {{--<form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">--}}
                    {{--@csrf--}}
                    {{--<div class="form-group">--}}
                        {{--<label for="name">{{ __('Name') }}</label>--}}
                        {{--<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>--}}
                        {{--@if ($errors->has('name'))--}}
                            {{--<span class="invalid-feedback" role="alert">--}}
                                {{--<strong>{{ $errors->first('name') }}</strong>--}}
                            {{--</span>--}}
                        {{--@endif--}}
                    {{--</div>--}}

                    {{--<div class="form-group">--}}
                        {{--<label for="email">{{ __('E-Mail Address') }}</label>--}}
                        {{--<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>--}}
                        {{--@if ($errors->has('email'))--}}
                            {{--<span class="invalid-feedback" role="alert">--}}
                                {{--<strong>{{ $errors->first('email') }}</strong>--}}
                            {{--</span>--}}
                        {{--@endif--}}
                    {{--</div>--}}

                    {{--<div class="form-group">--}}
                        {{--<label for="password">{{ __('Password') }}</label>--}}
                        {{--<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>--}}
                        {{--@if ($errors->has('password'))--}}
                            {{--<span class="invalid-feedback" role="alert">--}}
                                {{--<strong>{{ $errors->first('password') }}</strong>--}}
                            {{--</span>--}}
                        {{--@endif--}}
                    {{--</div>--}}

                    {{--<div class="form-group">--}}
                        {{--<label for="password-confirm">{{ __('Confirm Password') }}</label>--}}
                        {{--<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_confirmation" required>--}}
                        {{--@if ($errors->has('password_confirmation'))--}}
                            {{--<span class="invalid-feedback" role="alert">--}}
                                {{--<strong>{{ $errors->first('password_confirmation') }}</strong>--}}
                            {{--</span>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<div class="float-right">--}}
                            {{--<button type="submit" class="btn btn-primary">--}}
                                {{--{{ __('Register') }}--}}
                            {{--</button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</form>--}}
            {{--</div>--}}
            {{--<div class="modal-footer">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-sm-6 col-xs-12">--}}
                        {{--<button class="loginBtn loginBtn--facebook">--}}
                            {{--Register with Facebook--}}
                        {{--</button>--}}
                    {{--</div>--}}

                    {{--<div class="col-sm-6 col-xs-12">--}}
                        {{--<button class="loginBtn loginBtn--google">--}}
                            {{--Register with Google--}}
                        {{--</button>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}