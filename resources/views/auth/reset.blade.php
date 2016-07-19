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
    <body class="body-login">
        <div class="container">
            @include("layout.partials.messages")
            {!!Form::open(array('url' =>'password/reset','method'=>'post','class'=>"form-horizontal form-bordered form-control-borderless",'id'=>'form-login'))!!}
                <img  style="margin-top: -14px; width: 100.3%;" class="normal" src="http://galleyfinancial.com/wp-content/uploads/2016/05/galley-financial-logo_-header.png" alt="Logo">
                <h2 class="form-signin-heading">Please enter your new password</h2>
                {!!Form::hidden('token',$token,null)!!}
                {!!Form::email('email', old('email') ,array('type'=>'text','id'=>'email','class'=>'form-control input-lg','placeholder'=>'Correo'))!!}
                {!!Form::password('password',array('type'=>'password','id'=>'login-password','class'=>'form-control input-lg','placeholder'=>'Contraseña'))!!}
                {!!Form::password('password_confirmation',array('type'=>'password','id'=>'login-password','class'=>'form-control input-lg','placeholder'=>'Contraseña'))!!}
                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Inicia sesión</button>
            {!! Form::close()!!}
        </div> <!-- /container -->
    </body>
</html>