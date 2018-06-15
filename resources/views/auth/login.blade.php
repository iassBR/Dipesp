<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DIPESP') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.min.css')}}">
    {{--  Google Font  --}}
    <link rel="stylesheet"  href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">


    <div class="login-box ">
        <div class="login-logo">
            <a href=""><b>Dipesp</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body ">
            <p class="login-box-msg">Entrar</p>

            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} has-feedback" >     
                    <input id="email" type="email" placeholder="Email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    
            </div>
            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                <input id="password" type="password" placeholder="Senha" class="form-control" name="password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="row">
                <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                    <input type="checkbox"> Lembrar
                    </label>
                </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
                </div>
                <!-- /.col -->
            </div>
            </form>
        

            <a href="#">Esqueci minha senha</a><br>
        
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->



    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
   
</body>
</html>
