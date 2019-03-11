@extends('layouts.login')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto d-block" style="margin-top: 85px; opacity: 0.80;">
        <div class="card text-white">
          <img class="card-img" src="{{ asset('storage/discover.jpg') }}" alt="Card image" height="368">
          <div class="card-img-overlay">
            <h4 class="card-title">Nextoran</h4>
            <p class="card-text">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
          </div>
        </div>
        </div>
        <div class="col-md-4 mx-auto d-block" style="margin-top: 85px; opacity: 0.92;">
            <div class="card bg-light rounded border border-top-0">
                <h4 class="card-header">Login</h4>

                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-12 control-label">Username</label>

                            <div class="col-md-12">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-12 control-label">Password</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-outline-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                  <div class="card-footer text-muted text-right">
                    {{ date('l, d M Y') }}
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
