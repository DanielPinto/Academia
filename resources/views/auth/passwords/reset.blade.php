@extends('layouts.app')

@section('content')
  <div class="login_wrapper">
    <div class="animate form login_form">
      <section class="login_content">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <h1>Resetar Senha</h1>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                          <div class="row">

                            <label for="email" class="col-md-12">E-Mail</label>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>

                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                          <div class="row">
                            <label for="password" class="col-md-12">Senha</label>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>

                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

                          <div class="row">
                            <label for="password-confirm" class="col-md-12">Confirmar Senha</label>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>

                        </div>

                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    Resetar Senha
                                </button>
                            </div>
                          </div>
                        </div>
                    </form>
                  </section>
                </div>
              </div>
@endsection
