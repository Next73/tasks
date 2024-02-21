<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Панель управления</title>
  <link rel="stylesheet" href="{{ asset("css/app.css") }}">
</head>
<body class="bg-slate-200">
    <section class="flex min-h-screen items-center flex-col">
        <div class="flex flex-row h-auto w-full sm:w-11/12 md:w-3/4 lg:w-2/3 mx-auto md:mt-8 md:mb-8  bg-white rounded-md">
            <div class="w-full md:w-full pb-10">
                <div class="bg-red-500 flex justify-between items-center rounded-t-md text-white py-2 px-5 text-lg">
                    <div class="font-bold">Добро пожаловать, {{ auth()->user()->name }}!</div>
                    <a href="{{ route('logout') }}" class="text-white">Выход</a>
                </div>
                <div class="px-5 pt-5">
                    <div class="max-w-4xl mx-auto px-4 py-2">

                        @if (session('success'))
                            <div class="bg-green-400 py-2 rounded-md px-2 font-bold text-white mb-3">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="bg-red-500 py-2 rounded-md px-2 font-bold text-white mb-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <h1 class="text-2xl font-bold mb-4">Добавить задачу</h1>
                        <form class="mb-8" action="{{ route('tasks.store') }}" method="POST">
                            @csrf
                            <div class="flex items-center">
                                <input type="text" name="name" minlength="3" maxlength="255" class="border rounded-lg px-4 py-2 w-full" required>
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg ml-2">Добавить</button>
                            </div>
                        </form>
                        <h1 class="text-2xl pb-3">Ваш список задач:</h1>

                        @if($tasks->count() > 0)

                        <ul>

                            @foreach($tasks as $task)
                                <li class="border-b border-gray-300 py-4 flex justify-between items-center">  
                                    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="flex items-center">
                                            <button type="submit" name="completed" value="{{ $task->completed ? 0 : 1 }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" stroke="{{ $task->completed ? 'green' : 'gray' }}" />
                                                </svg>
                                            </button>
                                            <span class="px-3 break-all {{ $task->completed ? 'text-lime-700' : 'text-black' }}">{{ $task->name }}</span>
                                        </div>
                                    </form>
                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500">Delete</button>
                                    </form>
                                </li>
                            @endforeach
                        
                        </ul>
                        <div class="mt-5"> {{ $tasks->links() }} </div>

                        @else
                            <p>Список задач пуст</p>
                        @endif
                        
                    </div>
                </div>           
            </div>
        </div>
    </section>
</body>
</html>