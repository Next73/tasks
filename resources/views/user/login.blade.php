<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Авторизация</title>
  <link rel="stylesheet" href="{{ asset("css/app.css") }}">
</head>
<body class="bg-slate-200">
    <section class="flex min-h-screen items-center justify-center flex-col">
        <div class="flex flex-row h-auto w-full sm:w-11/12 md:w-3/4 lg:w-1/2 mx-auto mt-8  bg-white rounded-md">
            <div class="w-full md:w-1/2 px-5 py-20">
                <h1 class="text-2xl pb-3">Авторизация</h1>

                @if ($errors->any())
                    <div class="text-red-500 mb-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" class="flex flex-col space-y-4" action="{{route('login.post')}}">
                    <label for="login">Логин</label>
                    <input type="login" name="login" id="login" class="border px-4 py-2 border-gray-300" value="{{ old('login') }}" maxlength="20" required>
                    <label for="password">Пароль</label>
                    <input type="password" name="password" id="password" class="border px-4 py-2 border-gray-300" maxlength="50" required>
                    @csrf
                    <div class="flex flex-col space-y-4 items-center"> 
                        <button class="bg-red-500 w-36 text-white rounded-xl h-10 mt-3" type="submit">ВХОД</button>
                    </div>
                 </form>
            </div>
            
            <div class="hidden md:flex w-1/2 bg-gradient-to-r from-red-600 to-red-500 flex flex-col justify-center items-center rounded-r-md">
                <a href="{{ route('registration') }}" class="w-1/2 border border-white text-white rounded-xl h-10 mt-3 block text-center flex justify-center items-center">РЕГИСТРАЦИЯ</a>
            </div>
        </div>
    </section>
</body>
</html>