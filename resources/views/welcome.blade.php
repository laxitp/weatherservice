<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Weather API</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- Styles -->
        <style>
            body {
            background-color: #fff;
            color:#000000 !important;
            height: 100vh;
            margin: 0;
            }
            p{
            color:#000000 !important;   
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
            text-align: center;
            }
            table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 70%;
            text-align: center; 
            }
            td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            }
            tr:nth-child(even) {
            background-color: #dddddd;
            }
        </style>
    </head>
    <body>
        <div class="position-ref"> 
            <br />
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
            <script>
            $(document).ready(function(){
            setTimeout(function(){ $(".alert").hide(500); }, 4000);
            });
            </script>
            @endif
            <h1>                    
                Weather API 
            </h1>
            <div style="color:#000000; text-align: center;">
            <br /><br />
            <h4> Wind Speed </h4>
            <br /><br /><br />
            <table align="center">
                <tr>
                    <th> Speed </th>
                    <th> DEG </th> 
                    <th> GUST </th> 
                </tr>
                <tr>
                    <td> @if($res['wind']['speed']){{ $res['wind']['speed']}}@endif </td>
                    <td> @if($res['wind']['speed']){{ $res['wind']['deg']}}@endif </td> 
                    <td> @if($res['wind']['speed']){{ $res['wind']['gust']}}@endif </td> 
                </tr>                
            </table>
            </div>
        </div>
        
      
    </body>
</html>
