@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo __('auth.login')?></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('kasutajanimi') ? ' has-error' : '' }}">
                            <label for="kasutajanimi" class="col-md-4 control-label"><?php echo __('auth.username')?></label>

                            <div class="col-md-6">
                                <input id="kasutajanimi" type="kasutajanimi" class="form-control" name="kasutajanimi" value="{{ old('kasutajanimi') }}" required autofocus>

                                @if ($errors->has('kasutajanimi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kasutajanimi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label"><?php echo __('auth.password')?></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}><?php echo __('auth.remember')?>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo __('auth.login')?>
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    <?php echo __('auth.forgot')?>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
