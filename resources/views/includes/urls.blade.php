
git add .
git commit -m ""
git push origin/master



@extends('layouts.app')

@section('content')

{{$srcProfile = ''}}


<div class="row">
  <div class="col col-md-6 col-md-offset-3 col-xs-12 col-sm-12" >
    <img src="{{$srcProfile}}/images/login/login2.jpg" alt="" class="img-rounded center-block">
  </div>
</div>


<div class="row">
  <div class="col col-md-3 col-md-offset-3 col-xs-12 col-sm-12" >

      <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
          {{ csrf_field() }}

          <div class="row">
            <div class="col col-md-5 col-xs-12 col-sm-12" >
              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

              @if ($errors->has('email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
            </div>

            <div class="col col-md-5 col-xs-12 col-sm-12" >
              <input id="password" type="password" class="form-control" name="password" required>

              @if ($errors->has('password'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
          </div>

          <div class="col-xs|sm|md|lg|xl-1-12">
            <button type="submit" class="btn btn-default pull-right">Log in</button>
            <a class="reset_pass" href="{{ route('password.request') }}">Esqueceu a senha?</a>


          </div>


        </div>




        <div class="clearfix"></div>


      </form>

</div>
</div>
@endsection
