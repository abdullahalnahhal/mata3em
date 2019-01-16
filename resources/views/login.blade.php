<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      @include('layout.head')
      <title>@yield('title')</title>

  </head>
<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="{{lRoute("index")}}">
                <img src="{{asset('new/en/images/logo-en.png')}}" class="col-xs-10" alt="Nice One Website">
            </a>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="{{route('login.submit')}}" autocomplete="false">
                    @csrf
                    <div class="msg">@lang('settings.Sign in to start your session')</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name='username' placeholder="@lang('settings.User Login Name')" required autofocus value='{{old('username')}}' autocomplete="false">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="@lang('settings.User Password')" required value='{{old('password')}}' autocomplete="false">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">@lang("settings.Login")</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</html>
@include('layout.foot')
