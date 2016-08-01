<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Blockscore-Zuliatec</title>

        <!-- Bootstrap Core CSS -->
        {{ HTML::style('assets/css/bootstrap.min.css') }}

        <!-- Custom CSS -->
        {{ HTML::style('assets/css/new-main.css') }}

        <!-- Custom Fonts -->
        {{ HTML::style('assets/font-awesome/css/font-awesome.min.css') }}

    </head>
	<body class="body-login" style="background-image:url({{ url('fondo.jpg') }})">
	    <div class="container">
	    	@include("layout.partials.messages")
	    	{!!Form::open(array('url' =>'auth/login','method'=>'post','class'=>'form-signin','id'=>'form-login'))!!}
	    	<img  style="margin-top: -14px; width: 100.3%;" class="normal" src="{{ url('logo.png') }}" alt="Logo">
				<h2 class="form-signin-heading">Inicia sesión</h2>

				<label for="inputEmail" class="sr-only">
					Email address
				</label>

				<input id="inputEmail" name="email" class="form-control" placeholder="Email address"
				requireds="" autofocus="" type="email">

				<label for="inputPassword" class="sr-only">
					Password
				</label>

				<input id="inputPassword" name="password" class="form-control" placeholder="Password"
				requireds="" type="password">

				<div class="checkbox">
					<label>
						<input value="remember-me" type="checkbox"> 
						Recuerdame
					</label>
				</div>
				<button class="btn btn-lg btn-info btn-block" type="submit">Iniciar</button>
			{!! Form::close()!!}

	    </div> <!-- /container -->
	</body>
</html>