<html>
    <head>

        <title>@yield('title')</title>

        @include('Shared/Layouts/ViewJavascript')

        @include('Shared.Partials.GlobalMeta')

        <!--JS-->
       {!! Html::script('vendor/jquery/dist/jquery.min.js') !!}
        <!--/JS-->

        <!--Style-->
       {!!Html::style('assets/stylesheet/application.css')!!}
        <!--/Style-->

        @yield('head')

        <style>

            body {
                background: url({{asset('assets/images/background.png')}}) repeat;
                background-color: #2E3254;
            }

            h2 {
                text-align: center;
                margin-bottom: 31px;
                text-transform: uppercase;
                letter-spacing: 4px;
                font-size: 23px;
            }
            .panel {
                background-color: #003366;
                /* background-color: rgba(255,255,255,.95); */
                padding: 15px 30px ;
                border: none;
                color: #fff;
                box-shadow: 0 0 5px 0 rgba(0,0,0,.2);
                margin-top: 40px;
            }

            .panel a {
                color: #333;
                font-weight: 600;
            }
            .panel .control-label {
                color: #fff;
            }
            .panel .semibold, .panel .forgotPassword {
                color: #fff;
                text-decoration: underline;
            }

            .logo {
                text-align: center;
                margin-bottom: 20px;
            }

            .logo img {
                width: 300px;
            }

            .signup {
                margin-top: 10px;
            }

            .forgotPassword {
                font-size: 12px;
                color: #ccc;
            }
        </style>
    </head>
    <body>
        <section id="main" role="main">
            <section class="container">
                @yield('content')
            </section>

        </section>
        <div style="text-align: center; color: white" >
        </div>

        @include("Shared.Partials.LangScript")
        {!!Html::script('assets/javascript/backend.js')!!}
    </body>
    @include('Shared.Partials.GlobalFooterJS')
</html>
