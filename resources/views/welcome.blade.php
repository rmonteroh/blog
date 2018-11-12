<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" type="text/css" href="css/app.css">
        <link rel="stylesheet" type="text/css" href="css/toastr.min.css">

    </head>
    <body>
        <div id="app">
            <example-component></example-component>
            {{Session::get('key')}}
           <div class="link">
               <a href="/post">Regresar</a>
           </div>
        </div>
    </body>
    <script type="text/javascript" src="js/app.js"></script>
    <script type="text/javascript" src="js/toastr.min.js"></script>
    <script>
        toastr.success("holaaaaa");
    </script>
</html>
