<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,700,800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <script src="https://code.iconify.design/1/1.0.3/iconify.min.js"></script>
        <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
        <title>@yield('title')</title>

    </head>
    <body>
        <header>
            <ul>
                
                <li id='section-left'>
                            <div class="collapse-menu">
                                    <div id="line-top"></div>
                                    <div id="line-center"></div>
                                    <div id="line-bottom"></div>
                            </div>
                            <a href='{{URL::to('/')}}' class='logo'><span>Developers</span> Hub</a>
                </li>
                
                <li id='section-center'>
                    <div class="search-bar"> 
                        <input type="text" name="search" id="search-field" autocomplete="off">
                        <label class="search-button">
                            <img src="{{asset('images/search.svg')}}">
                        </label>   
                    <div class="search-results">
                 
                    </div>    
                </div>
             </li>
                
                <li id='section-right'>
                    @guest
                    <a id='register-button' href="{{URL::to('/register')}}">Register</a>
                    <a id='login-button'>Login</a>
                    <div class="login-form">
                        <div class="container">
                            <form method="POST" action="{{ route('login') }}">
                            @csrf
                                <label>Email address</label>
                                <input id='email' type='email' name='email' value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <label>Password</label>
                                <input id='password' type='password' name='password' required autocomplete="current-password"> 
                                <label id='remember'>
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span class="checkmark"><div class="circle"></div> </span>
                                    <span class='text'>remember me</span>
                                </label>
                                <button type="submit">Login</button>
                                <div class="invalid-feedback">
                                    @error('email')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                    @error('password')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                </div>
                            </form>
                        </div>
                    </div>
                    @endguest

                    @auth 
                    <form method='post'>
                        <a href="{{ url("/logout")}}" id='logout-button'>logout</a>
                    </form>
                    @endauth
                </li>
            </ul>
                

</header>
    @yield('content')   
 <nav class='collapse-navbar'>   
        <ul>
            <a href='/'><li class='{{Request::path() === '/' ? 'active' : ''}}'>Home</li></a>
            <a href='/boards'><li class='{{Request::path() === 'boards' ? 'active' : ''}}'>Boards</li></a>
            <li>Users</li>
            @auth
               <a href='/profile/{{Auth::user()->id}}'><li class="{{Request::path() === 'profile/'.Auth::user()->id ? 'active' : ''}}">Profile</li></a>
            @endauth
        </ul>
</nav>
<footer>
    <a href='#'> <p>
        <span class="iconify" data-icon="feather:mail" data-inline="false"></span>
        <span>Contact us</span>
    </p></a>
    <a href='https://superdesigner.me'><p>
        Made by SuperDesigner.me
    </p></a>
    <a href='https://github.com/volver805'> <p>
        <span class="iconify" data-icon="ant-design:github-filled" data-inline="false"></span><span>Github</span>
    </p> </a>
</footer>

 <script src='{{asset('js/livesearch.js')}}'></script>
<script src='{{asset('js/main.js')}}'></script>
<script src='{{asset('js/home.js')}}'></script>
<script src="https://code.iconify.design/1/1.0.4/iconify.min.js"></script>

</body>
</html>    