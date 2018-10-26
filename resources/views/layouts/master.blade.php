<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>

        <main role="main" class="container">
                {{-- @include('layouts.partials.header') --}}
                    <div class="row">
                        <div class="col-md-8 blog-main">
                             @yield('content')
                        </div><!-- /.blog-main -->
            
                    </div><!-- /.row -->
                    {{-- @include('layouts.partials.footer') --}}
             </main><!-- /.container -->
    
</body>
</html>