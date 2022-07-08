<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
    <title>Login | INKA</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{url('/')}}/klorofil/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('/')}}/klorofil/assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('/')}}/klorofil/assets/vendor/linearicons/style.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{url('/')}}/klorofil/assets/css/main.css">
    <link rel="stylesheet" href="{{url('/')}}/css/style.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{url('/')}}/klorofil/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{url('/')}}/klorofil/assets/img/favicon.png">

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>

<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle">
                <div class="auth-box ">
                    <div class="left">
                        <div class="content">
                            <div class="header">
                                <div class="logo text-center"><img src="{{url('/')}}/assets/logo/logo-md.png" class="logo" alt="Logo INKA"></div>
                                <p class="lead">Silakan Login</p>
                            </div>
                            <form class="form-auth-small" method="POST" action="{{route('login')}}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="signin-email" class="control-label sr-only">Email</label>
                                    <input type="email" class="form-control" id="signin-email" name="email" value="{{ old('login') }}" placeholder="Email" autofocus>

                                    @if ($errors->has('email'))
                                        @component('layouts.admin.components.forms.errors', ['errors' => $errors->get('email')])
                                        @endcomponent
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Password</label>
                                    <input type="password" class="form-control" id="signin-password" name="password" placeholder="Password">

                                    @if ($errors->has('password'))
                                        @component('layouts.admin.components.forms.errors', ['errors' => $errors->get('password')])
                                        @endcomponent
                                    @endif
                                </div>
                                <!-- <div class="form-group clearfix">
                                    <label class="fancy-checkbox element-left">
                                        <input type="checkbox">
                                        <span>Remember me</span>
                                    </label>
                                </div> -->
                                <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                                <!-- <div class="bottom">
                                    <span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a></span>
                                </div> -->
                            </form>
                        </div>
                    </div>
                    <div class="right">
                        <div class="overlay"></div>
                        <div class="content text">
                            <h1 class="heading">INKA Admin Dashboard</h1>
                            <p>by Artcak Technology</p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->
</body>

</html>