<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
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
            
            <div class="alert alert-danger" style="display:none;">
               <span class="error-msg"></span>
            </div>
            
            <h1>                    
                Weather API 
            </h1>
            <br /><br />
            <form action="" method="POST">
                {{ csrf_field() }}
                
                <input onkeypress="javascript:return isNumber(event);"  maxlength="5" type="text" name="zipcode" id="zipcode" placeholder="Zipcode" required="required">  <button class="formSubmit" type="button" name="submit" > Submit </button> <input type="reset" name="Reset" >   
            </form>
            <div id="data-show" style="color:#000000; text-align: center; display: none;">
                <br /><br />
                <h4> Wind Speed </h4>
                <br />
                <table align="center">
                    <tr>
                        <th> City  </th>
                        <th> Speed </th>
                        <th> DEG </th> 
                        <th> GUST </th> 
                    </tr>
                    <tr>
                        <td> <span class="city_name"></span>  </td>
                        <td> <span class="wind_speed"></span>  </td>
                        <td> <span class="wind_deg"></span>  </td> 
                        <td> <span class="wind_gust"></span>  </td> 
                    </tr>                
                </table>
            </div>
        </div>
        <script>
        $(document).ready(function(){
          $(".formSubmit").click(function(){
             
            var zipcode = $("#zipcode").val();
            $.post("{{ url('/') }}/api/v1/getWeatherInfo",
            {
              zip: zipcode
            },
            function(data,status){
              if(data.status==1){  
                $(".alert-danger").hide(100);     
                $("#data-show").fadeIn(300);  
                $(".city_name").html(data.response['name']);
                $(".wind_speed").html(data.response['wind']['speed']);
                $(".wind_deg").html(data.response['wind']['deg']);
                $(".wind_gust").html(data.response['wind']['gust']);
              }else{
                $("#data-show").hide(100);    
                $(".alert-danger").fadeIn(300);   
                $(".error-msg").html(data.message);
                setTimeout(function(){ $(".alert-danger").fadeOut(300);  }, 2000);
              }
              
            });
          });
        });
        function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
           return false;
        return true;
        }    
        </script>        
    </body>
</html>
