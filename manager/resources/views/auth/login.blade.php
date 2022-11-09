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
        .logo { display: inline-block; margin: 0 1rem; width: 0; height: 0; transform: scale(0.3); }
        .logo::before { transform: none; content: ""; display: block; position: relative; z-index: 1; left: 50%; top: 30%; width: 120px; height: 120px; margin: -60px 0 0 -60px; border-radius: 50%; box-shadow: 5px 5px 0 0 rgb(234, 132, 82), 14px -7px 0 0 rgba(111, 163, 219, 0.7), -7px 11px 0 0 rgba(112, 193, 92, 0.74), -11px -7px 0 0 rgba(147, 205, 99, 0.78); animation: none }
        .active .input-list { display: block; }
    </style>
</head>
<body>
<div id="app" class="main w-full h-full">
    <div class="w-96 max-w-full p-6 bg-black/75 text-white text-opacity-75 flex flex-col justify-between h-full">
        <form method="post" action="{{ route('login') }}">
            @csrf

            <div class="flex items-center mb-6 pt-4 pl-1 text-white font-bold uppercase">
                <span class="logo"></span>
                <span class="pl-4">Evolution</span>
            </div>

            <div class="form-group form-floating mb-4">
                <label for="floatingName" class="block text-sm">{{ __('global.username') }}</label>
                <input name="username"
                       type="text"
                       id="floatingName"
                       class="w-full bg-transparent font-bold text-white {{ $errors->has('username') ? 'border-rose-500' : '' }}"
                       value="{{ old('username') }}"
                       placeholder="{{ __('global.username') }}"
                       autofocus>
                @if ($errors->has('username'))
                    <span class="text-rose-500">{{ $errors->first('username') }}</span>
                @endif
            </div>

            <div class="form-group form-floating mb-6">
                <label for="floatingPassword" class="block text-sm">{{ __('global.password') }}</label>
                <input name="password"
                       type="password"
                       id="floatingPassword"
                       class="w-full bg-transparent font-bold text-white {{ $errors->has('password') ? 'border-rose-500' : '' }}"
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
                           id="rememberme"
                           class="mr-2 bg-transparent">
                    <label class="text-sm" for="rememberme">{{ __('global.remember_username') }}</label>
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
