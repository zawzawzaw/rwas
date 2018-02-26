<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
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
            .subtitle {
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                color: #636b6f;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Account
                </div>
                <div class="subtitle">
                    Name: {{ $info['details']['name'] }}<br/>
                    Membership id: {{ $info['details']['membership_id'] }}<br/>
                    Country Code: {{ $info['details']['home_country_code'] }}<br/>
                    Country Name: {{ $info['details']['home_country_name'] }}<br/>
                    Currency: {{ $info['details']['home_currency'] }}<br/>
                    GP: {{ $info['points']['gp'] }}<br/>
                    CC: {{ $info['points']['cc'] }}<br/>
                    Tier code: {{ $info['tier']['tier_code'] }}<br/>
                    Tier name: {{ $info['tier']['tier_name'] }}<br/>
                    Tier points: {{ $info['tier']['tier_points'] }}<br/>
                    Tier points max: {{ $info['tier']['tier_points_max'] }}<br/>
                    Booking: {{ $info['current_bookings'] }}<br/>
                </div>
            </div>
        </div>
        <pre class="raw">
            Raw Output
            {!! print_r($raw) !!}
        </pre>
    </body>
</html>
