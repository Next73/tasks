<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index() {
    $user = auth()->user();
    $tasks = $user->tasks(); 

    return view('user.dashboard.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        $userId = auth()->user()->id;
    
        $task = new Task();
        $task->name = $request->input('name');
        $task->user_id = $userId;
        $task->save();
    
        return redirect()->route('dashboard')->with('success', 'Задача успешно создана!');
    }

    
    public function destroy(Task $task)
    {     
            $this->authorize('destroy', $task);
            
            $task->delete();

            return redirect()->back()->with('success', 'Задача успешно удалена!');
    }

    public function update(Task $task)
    {   
        $this->authorize('update', $task);

            $completed = $task->completed;

            $task->update(['completed' => !$completed]);

            return redirect()->back()->with('success', 'Статус задачи обновлен!');
    }
}
