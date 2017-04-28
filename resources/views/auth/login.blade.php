@extends('layouts.app')

@section('content')

<div class="login_wrapper">
  <div class="animate form login_form">
    <section class="login_content">


      <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
          {{ csrf_field() }}

        <h1>Login</h1>
        <div>
          <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

          @if ($errors->has('email'))
              <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif

        </div>

        <div>
          <input id="password" type="password" class="form-control" name="password" required>

          @if ($errors->has('password'))
              <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif
        </div>

        <div>

          <button type="submit" class="btn btn-default">Log in</button>
          <a class="reset_pass" href="{{ route('password.request') }}">Esqueceu a senha?</a>

        </div>

        <div class="clearfix"></div>


      </form>


    </section>
  </div>
</div>

@endsection
