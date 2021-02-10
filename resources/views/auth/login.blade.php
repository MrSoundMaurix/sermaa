<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ config('app.name', 'SERMAA') }}</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="{{ asset('img/AdminLTELogo.png')}}">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="{{ asset('assets/vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <body class="hold-transition login-page" style="background-image:url({{url('assets/img/Mountain.jpg')}}); background-attachment: fixed;
    background-size: cover;" >
           <!--  <div class="login-logo" style="top: 15%;">
                <a href="#"><b>SERMAA</b> GAD</a>
            </div>  --> 
        <div class="container">    
            <div class="row justify-content-center pt-5 mt-5 m-4 ">    
                <!-- <div class="login-box"> -->
                <div class="col-md-6 col-sm-9 col-xl-4 col-lg-5 formulario">
                    <div class="form-group text-center" >
                        <h1 class="text-light"><b>SERMAA</b> - EP</h1>
                    </div>  
                        <p class="login-box-msg text-white" >Regístrese para iniciar su sesión</p>
                        @if (session('status'))    
                            {{ session('status') }}
                        @endif
                        <form method="POST" action="{{ route('login') }}" id="quickForm">
                            @csrf
                            @if ($errors->has('email') == 1)
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <div class="input-group mb-3">
                                <input type="text" name="email" class="form-control" placeholder="Correo electrónico" value="{{old('email')}}" required autofocus>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope text-info"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Contraseña" required autocomplete="current-password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fas fa-lock text-info"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="icheck-primary">
                                        <input type="checkbox" id="remember_me" name="remember">
                                        <label for="remember_me" class="text-white">
                                            Recuérdame
                                        </label>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-6">
                                    <button type="submit" class="btn btn-info btn-block">Iniciar sesión</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>

                        <p class="mb-1">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-white">¿Olvidaste tu contraseña?</a>
                            @endif
                        </p>
                        {{-- <p class="mb-0">
                            @if (Route::has('register'))    
                                <a href="{{ route('register') }}" class="text-center">Registrarse</a>
                            @endif
                        </p> --}}
                <!--   </div> -->
                </div>       
                        <!-- /.login-card-body -->
            <!--  </div> -->
            </div>
        </div>
        <!-- /.login-box -->

        <!-- jQuery -->
        <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('assets/js/adminlte.min.js') }}"></script>
        <!-- jquery-validation -->
        <script src="{{ asset('assets/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/jquery-validation/additional-methods.min.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#quickForm').validate({
                    rules: {
                        email: {
                            required: true,
                            // email: true,
                        },
                        password: {
                            required: true,
                            minlength: 5
                        },
                    },
                    messages: {
                        email: {
                       /*      required: "Please enter a email address",
                            email: "Please enter a vaild email address" */
                            required: "Por favor ingrese su email",
                            email: "Please enter a vaild email address"
                        },
                        password: {
                        /*     required: "Please provide a password",
                            minlength: "Your password must be at least 5 characters long" */
                            required: "Por favor ingrese su contraseña",
                            minlength: "Your password must be at least 5 characters long"
                        },
                    },
                    errorElement: 'span',
                    errorPlacement: function (error, element) {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight: function (element, errorClass, validClass) {
                        $(element).addClass('is-invalid');
                    },
                    unhighlight: function (element, errorClass, validClass) {
                        $(element).removeClass('is-invalid');
                    }
                });
            });
        </script>
        <style>
       
            
 /*  url("imagenes/segunda_imagen.png"); */
 .formulario{
     background:rgba(0,0,0,.1);
     padding:30px;
     border-radius:10px;
     box-shadow:0 0 30px rgba(0,0,0,0.568);
     color:white;
 }
 .pt-5{

 padding-top: 7rem!important;
 }
  

        </style>
    </body>
</html>