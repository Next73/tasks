<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Главная</title>
  <link rel="stylesheet" href="{{ asset("css/app.css") }}">
</head>
<body class="bg-slate-200">
    <section class="flex min-h-screen items-center flex-col">
        <div class="flex flex-row h-auto w-full sm:w-11/12 md:w-3/4 lg:w-2/3 mx-auto md:mt-8 md:mb-8  bg-white rounded-md">
            <div class="w-full md:w-full pb-10">
                <div class="bg-red-500 flex justify-between items-center rounded-t-md text-white py-2 px-5 text-lg">
                    <div class="font-bold">Task Manager</div>
                </div>
                <div class="px-5 pt-5">
                    <div class="max-w-4xl mx-auto px-4 py-2">
                        <h1 class="text-2xl pb-3 text-center">Тестовое задание</h1>
                        <h2 class="text-center">ToDo list на Laravel</h2>
                        <div class="w-full flex flex-col justify-center items-center mt-3">
                            <a href="{{ route('login') }}" class="w-56 border border-black text-black rounded-xl h-10 mt-3 text-center flex justify-center items-center">АВТОРИЗАЦИЯ</a>
                        </div>
                    </div>
                </div>           
            </div>
        </div>
    </section>
</body>
</html>