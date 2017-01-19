<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MeetingHub</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-image: url("https://images.unsplash.com/photo-1454023989775-79520f04322c?dpr=2&auto=format&crop=entropy&fit=crop&w=1500&h=1000&q=80&cs=tinysrgb");
                color: #fff;
               
                background-repeat:no-repeat;
                background-size: cover;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
                
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #FFF;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login') && !Auth::user())
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                </div>
            @else
            <div class="top-right links">
                    <a href="{{ url('/profile/'. Auth::user()->id) }}">{{ Auth::user()->name }}</a>
                    <a href="{{ url('/logout') }}">Logout</a>
            </div>
                                                    
            @endif

            <div class="content">
                <div class="title m-b-md">
                    MeetingHub
                </div>

                <p>The best platform to manage your meetings</p>

                <div class="links">
                    <!-- <button type="button" class="btn btn-primary btn-lg"><a href="{{ url('/meeting/create') }}">Plannifier une réunion</a></button> -->
                    <a href="{{ url('/meeting/create') }}">Plan a meeting</a>
                    <a href="{{ url('/meeting') }}">Meeting list</a>
                </div>
            </div>
        </div>
    </body>
</html>
