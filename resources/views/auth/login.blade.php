@extends('layouts.auth')

@section('content')
    <section class="hero is-fullheight is-medium is-primary is-bold">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-centered">
                    <div class="card is-rounded">
                        <div class="card-content">
                            <a href="{{route('main')}}" class="is-block" style="margin-bottom: 1.5rem">
                                <h1 class="title is-1 has-text-centered has-text-info">{{ config('app.name', '@Serufim') }}</h1>
                            </a>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="field">
                                    <label for="email" class="label">{{ __('E-Mail Address') }}</label>
                                    <div class="control">
                                        <input id="email" type="email"
                                               class="input{{ $errors->has('email') ? ' is-danger' : '' }}" name="email"
                                               value="{{ old('email') }}" required autofocus>
                                    </div>
                                    @if ($errors->has('email'))
                                        <p class="help {{ $errors->has('email') ? 'is-danger' : '' }}">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                                <div class="field">
                                    <label for="password" class="label">{{ __('Password') }}</label>
                                    <div class="control">
                                        <input id="password" type="password"
                                               class="input{{ $errors->has('password') ? ' is-danger' : '' }}"
                                               name="password" value="{{ old('password') }}" required autofocus>
                                    </div>
                                    @if ($errors->has('password'))
                                        <p class="help {{ $errors->has('password') ? 'is-danger' : '' }}">{{ $errors->first('password') }}</p>
                                    @endif
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <label class="checkbox">
                                            <input type="checkbox" name="remember"
                                                   id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>

                                <div class="buttons">
                                    <button type="submit" class="button is-primary">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                                @if (Route::has('password.request'))
                                    <a class="is-link has-text-info" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
