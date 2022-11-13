<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    @vite(['resources/css/app.css'])
    <style>
        .main { background: url("https://picsum.photos/1600/900") 50% 50% no-repeat; background-size: cover }
    </style>
</head>
<body>
<div id="app" class="main w-full h-full">
    <div class="w-[30rem] max-w-full p-10 bg-black/[.85] text-gray-300 text-opacity-75 flex flex-col justify-between h-full">
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
                    <button class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-4 rounded"
                            type="submit">{{ __('global.login_button') }}
                    </button>
                </div>
            </div>

            @if ($errors->has('username') || $errors->has('password'))
                <div class="errors text-rose-500 py-3 text-center">{{ __('global.login_processor_unknown_user') }}</div>
            @endif

        </form>

        <div class="text-center text-sm text-gray-500 hover:text-gray-400">
            <a href="#">{{ __('global.forgot_your_password') }}</a>
        </div>
    </div>
</div>
</body>
</html>
