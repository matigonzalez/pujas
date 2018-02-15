<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
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
            *{
                box-sizing: border-box;
            }
            textarea{
                margin-bottom:10px;
            }
            input, textarea, button, select{
                padding:10px;
                border-radius: 4px;
                border: 1px solid #aaa;
                background: #fff;
            }
            button, select {
                cursor:pointer;
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
                color: #636b6f;
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
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <input type="text" id="ajax-url" style="width:100%" placeholder="Url" value="{{ url('/') }}/">
                <textarea id="ajax-data" style="width:100%;height:300px;">
{
    "_token":"QsVlRStSk37V4YrBthEooAG5o1nuGjm3fx1M93OB",
    "name":"test",
    "password":"123456"
}
                </textarea>
                <select id="ajax-method">
                    <option value="GET">GET</option>
                    <option value="POST">POST</option>
                </select>
                <button type="button" id="test-url">Test Url</button>
                <p id="ajax-result" style="font-weight:bold"></p>
            </div>
        </div>
        <script type="text/javascript">
            $('#test-url').on('click', function(){                
                $.ajax({
                    method: $('#ajax-method').val(),
                    data: JSON.parse($('#ajax-data').val()),
                    url: $('#ajax-url').val(),
                    success: function(r){
                        $('#ajax-result').css('color', '#0f0');
                        console.clear();
                        console.log(r);
                    },
                    error: function (e){
                        $('#ajax-result').css('color', '#f44');
                        console.clear();
                        console.error(e);
                    },
                    complete:function(r){
                        $('#ajax-result').html(r.status + " " + r.statusText);
                    }
                });
            });
        </script>
    </body>
</html>
