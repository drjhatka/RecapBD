<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
        @include('partials.css')
    </head>
    <body>

        <div class="container ">

                    @include('partials.header')

                @yield('content')
            </div>

        </div>
        @include('partials.js')
  </body>
</html>
