<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, user-scalable=no">
      <title>{{ $title }}</title>
      <link rel="stylesheet" href="{{ asset('/css/style.css') }}" />
      <link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}" />
      <script type="text/javascript" src="{{ asset('/js/jquery-2.1.4.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('/js/bootstrap.min.js') }}"></script>
   </head>
   
   <body>
      <div class="container" id="content">
         @extends('templates.menu')
         <div class="row">
            <div class="col-md-12">
               <h1>{{ $title }}</h1>
               <hr>
               @yield('content')
            </div>
         </div>
      </div>
   </body>
</html>
