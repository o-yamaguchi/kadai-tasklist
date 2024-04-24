<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;    // 変更

class TasksController extends Controller  // 変更
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            // $tasks = Task::all();  // 変更
    
            $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);
            $data = [
                'user' => $user,
                'tasks' => $tasks,
            ];
        }
        
        return view('dashboard', $data);
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
            'status' => 'required|max:10',
        ]);


        $request->user()->tasks()->create([
            'status' => $request->status,   // 追加
            'content' => $request->content,
        ]);
        // $task->save();  // 変更

        return redirect('/');
    }

    public function show(string $id)
    {
        $task = Task::findOrFail($id);  // 変更
        
        if (\Auth::id() === $task->user_id) {
            return view('tasks.show', [  // 変更
                'task' => $task,  // 変更
            ]);
            
        }

        return redirect('/');
    }

    public function edit(string $id)
    {
        $task = Task::findOrFail($id);  // 変更
        
            if (\Auth::id() === $task->user_id) {
                
                return view('tasks.edit', [  // 変更
                    'task' => $task,  // 変更
                ]);
            }

        return redirect('/');
    }

    public function update(Request $request, string $id)
    {
        $task = Task::findOrFail($id);  // 変更
        
        if (\Auth::id() === $task->user_id) {
         // バリデーション
                $request->validate([
                    'content' => 'required|max:255',
                    'status' => 'required|max:10',
                ]);
                
                $task->status = $request->status;    // 追加
                $task->content = $request->content;  // 変更
                $task->save();  // 変更
            return redirect('/dashboard');
        }

        return redirect('/');
    }

    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);  // 変更
        
        if (\Auth::id() === $task->user_id) {
            $task->delete();  // 変更
            return back()
            ->with('success','Delete Successful');
        }
        

        return redirect('/');
    }
}