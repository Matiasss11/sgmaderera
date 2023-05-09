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
            background: #e8e8e8;
            height: 100%;
            font-family: 'Numans', sans-serif;
        }

        .container{
            height: 100%;
            align-content: center;
        }

        .card{
            position: relative;
            top: 10vw;
            display: flex;
            flex-direction: column;
            background-color: #440b79;
            max-height: 450px;
            max-width: 300px;
            overflow: hidden;
            border-radius: 12px;
            box-shadow: 17px 17px 10px 3px #1b003528;
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

        .login label{
            margin: 25% 0 5%;
        }

        label {
            color: #fff;
            font-size: 2rem;
            justify-content: center;
            display: flex;
            font-weight: bold;
            cursor: pointer;
            transition: .5s ease-in-out;
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

        input {
            width: 100%;
            height: 40px;
            background: #e0dede;
            padding: 10px;
            border: none;
            outline: none;
            border-radius: 8px;
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
            width: 85%;
            height: 40px;
            margin: 12px auto 10%;
            color: #fff;
            background: #573b8a;
            font-size: 1rem;
            font-weight: bold;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: .2s ease-in;
        }

        .login_btn:hover{
            background-color: #7459a5;
            border: 1px solid #573b8a;
        }

        .links{
            color: white;
        }

        .links a{
            margin-left: 4px;
        }

        .app {
            background: #eee;
            border-radius: 90% / 45%;
            transform: translateY(-40%);
            transition: .8s ease-in-out;
        }

        .app label {
            color: #573b8a;
            transform: scale(.6);
        }

        #chk:checked ~ .app {
            transform: translateY(-60%);
        }

        #chk:checked ~ .app label {
            transform: scale(1);
            margin: 10% 0 5%;
        }

        #chk:checked ~ .login label {
            transform: scale(.6);
            margin: 5% 0 5%;
        } 

    </style>

</head>
<body>
@include('errors.request')
	<div class="d-flex justify-content-center h-100">
		<div class="card text-white ">
			<div class="login"><br>
				<label for="login">Iniciar Sesión</label>
			</div>
			<div class="card-body">
                @yield('content')
			</div>
            <div class="app">
                <label for="chk" aria-hidden="true">Maderas Ecke</label>
            </div>
		</div>
	</div>
</body>
</html>



