<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Inicio de Sesión</title>
   <!--Made with love by Mutiullah Samim -->

	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="styles.css">

    <style>

        @import url('https://fonts.googleapis.com/css?family=Numans');

        html,body{
            background: linear-gradient(brown, brown, #FFFFFF);
            /*background-size: auto;
            background-repeat: no-repeat;*/
            height: 100%;
            font-family: 'Numans', sans-serif;
        }

        .container{
            height: 100%;
            align-content: center;
        }

        .card{
            height: 370px;
            margin-top: auto;
            margin-bottom: auto;
            padding: 5px;
            width: 400px;
            background: linear-gradient(#FEFEFF, #C1BCD7, #B6B1D2, #9D97C1, #8880AF, #625B8C);
            border-radius: 15px;
            box-shadow: 8px 10px #000;
        }

        .social_icon span{
            font-size: 60px;
            margin-left: 10px;
            color: #3C8DBC;
        }

        .social_icon span:hover{
            color: white;
            cursor: pointer;
        }

        .card-header h3{
            color: black;
            text-align: center;
        }

        .social_icon{
            position: absolute;
            right: 20px;
            top: -45px;
        }

        .input-group-prepend span{
            width: 50px;
            background-color: brown;
            color: white;
            border:0 !important;
        }

        input:focus{
            outline: 0 0 0 0  !important;
            box-shadow: 0 0 0 0 !important;
            }

        .remember{
            color: white;
        }

        .remember input{
            width: 20px;
            height: 20px;
            margin-left: 15px;
            margin-right: 5px;
        }

        .login_btn{
            color: rgb(245, 241, 241);
            background-color:  brown;
            border-radius: 20px 1px;
            border: 1px solid white;
            width: 150px;
        }

        .login_btn:hover{
            color:brown;
            background-color: white;
            border: 1px solid brown;
        }

        .links{
            color: white;
        }

        .links a{
            margin-left: 4px;
        }

    </style>

</head>
<body>
@include('errors.request')
	<div class="d-flex justify-content-center h-100">
		<div class="card text-white bg-dark">
			<div class="card-header"><br>
				<h3>Iniciar Sesión</h3>
				<!--div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div-->
			</div>
			<div class="card-body">
                @yield('content')
			</div>
			<!--div class="card-footer">
				<div class="d-flex justify-content-center">
					<a href="#">¿Te has olvidado la contraseña?</a>
				</div>
			</div-->
		</div>
	</div>
</body>
</html>



