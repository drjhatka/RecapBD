<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Owls Eye | Dashboard</title>

            <!-- Tell the browser to be responsive to screen width -->
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

            <!-- Bootstrap 4 -->
            <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

            <!-- Font Awesome -->
            <link rel="stylesheet" href=
                                    "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

            <!-- Ionicons -->
            <link rel="stylesheet" href=
                                    "https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.4.8/collection/icon/icon.css">

            <!-- Custom CSS -->
                <link rel="stylesheet" href="{{ asset('css\home-style.css') }}">


                @include('partials.js')

</head>
<body>
    <div class="container">
        @include('partials.backend-navbar')
        <div class="row">
                @include('partials.backend-sidebar')
                @yield('content')

        </div>
    </div>
</body>
</html>
