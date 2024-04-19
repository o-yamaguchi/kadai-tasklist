<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;    // 変更

class TasksController extends Controller  // 変更
{
    public function index()
    {
        $tasks = Task::all();  // 変更

        return view('tasks.index', [  // 変更
            'tasks' => $tasks,  // 変更
        ]); 
    }

    public function create()
    {
        $task = new Task;  // 変更

        return view('tasks.create', [  // 変更
            'task' => $task,  // 変更
        ]);
    }

    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'content' => 'required|max:255',
        ]);
        
        $task = new Task;  // 変更
        $task->content = $request->content;  // 変更
        $task->save();  // 変更

        return redirect('/');
    }

    public function show(string $id)
    {
        $task = Task::findOrFail($id);  // 変更

        return view('tasks.show', [  // 変更
            'task' => $task,  // 変更
        ]);
    }

    public function edit(string $id)
    {
        $task = Task::findOrFail($id);  // 変更

        return view('tasks.edit', [  // 変更
            'task' => $task,  // 変更
        ]);
    }

    public function update(Request $request, string $id)
    {
        // バリデーション
        $request->validate([
            'content' => 'required|max:255',
        ]);
        
        $task = Task::findOrFail($id);  // 変更
        $task->content = $request->content;  // 変更
        $task->save();  // 変更

        return redirect('/');
    }

    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);  // 変更
        $task->delete();  // 変更

        return redirect('/');
    }
}