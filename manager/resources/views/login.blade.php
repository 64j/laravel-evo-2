@extends('auth')

@section('content')
    <form method="post" action="{{ route('login') }}">
        @csrf

        <div class="flex items-center mb-6 pt-4 pl-1">
            <span class="logo w-16 h-16"></span>
            <span class="pl-4 text-white uppercase text-4xl sm:text-5xl">Evolution</span>
        </div>

        <div class="form-group form-floating mb-6">
            <label for="floatingName" class="block mb-1">{{ __('global.username') }}</label>
            <input name="username"
                   type="text"
                   id="floatingName"
                   class="w-full bg-transparent py-3 font-bold text-white text-lg {{ $errors->has('username') ? 'border-rose-500' : '' }}"
                   value="{{ old('username') }}"
                   placeholder="{{ __('global.username') }}"
                   autofocus>
            @if ($errors->has('username'))
                <span class="text-rose-500">{{ $errors->first('username') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-6">
            <label for="floatingPassword" class="block mb-1">{{ __('global.password') }}</label>
            <input name="password"
                   type="password"
                   id="floatingPassword"
                   class="w-full bg-transparent py-3 font-bold text-white text-lg {{ $errors->has('password') ? 'border-rose-500' : '' }}"
                   value="{{ old('password') }}"
                   placeholder="{{ __('global.password') }}">
            @if ($errors->has('password'))
                <span class="text-rose-500">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input name="remember"
                       type="checkbox"
                       checked="checked"
                       id="remember"
                       class="mr-2 bg-transparent">
                <label class="text-sm" for="remember">{{ __('global.remember_username') }}</label>
            </div>
            <div>
                <button class="btn-green font-bold py-2 px-4 rounded"
                        type="submit">{{ __('global.login_button') }}
                </button>
            </div>
        </div>

    </form>

    <div class="text-center text-sm text-gray-500 hover:text-gray-400">
        <a href="{{ route('forgot') }}">{{ __('global.forgot_your_password') }}</a>
    </div>
@endsection
