<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <title>Institute of rural management</title>
        <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
        <link rel="icon" href="images/favicon.png" type="image/x-icon">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        @vite('resources/css/frontend.css')
   </head>
    <body>
        <div id="app"></div>
        @vite('resources/js/frontend.js')
        <script src="js/wow.js"></script>
    </body>
</html>
