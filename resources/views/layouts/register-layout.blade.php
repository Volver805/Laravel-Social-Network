<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css?family=Lato:400&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,700,800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <title>Register</title>
     
    </head>

    <body>
        
    <header class='register-header'>
        <ul>
            <li id='section-left'>
                <div class="collapse-menu">
                        <div id="line-top"></div>
                        <div id="line-center"></div>
                        <div id="line-bottom"></div>
                </div>
             </li>
             <a href='{{URL::to('/')}}' class='logo logo-register'><span>Developers</span> Hub</a>
            
        </ul>
    </header>
    <div class="background">
        <div class="dark-overlay"></div>
        <video autoplay muted loop id="background-video">
            <source src="../images/video.mp4" type="video/mp4">
        </video>
    </div>
    <div class="res-container">
            @yield('content')
    </div>

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
        <script src='{{asset('js/main.js')}}'></script>

    </body>


    