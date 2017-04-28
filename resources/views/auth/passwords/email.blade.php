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

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <h1>Reset de Senha</h1>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                          <div class="row">
                              <div class="col-md-12">
                                <label for="email" class="control-label">E-Mail Address</label>

                              </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                              @if ($errors->has('email'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                              @endif

                            </div>
                          </div>

                        </div>

                        <div class="form-group">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">
                                    Enviar um link para reset de senha
                                </button>
                            </div>
                        </div>
                    </form>
                  </section>
                </div>
              </div>

@endsection
