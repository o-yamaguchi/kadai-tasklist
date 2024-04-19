@extends('layouts.app')

@section('content')

<div class="prose ml-4">
    <h2 class="text-lg">id: {{ $task->id }} のタスク編集ページ</h2>  <!-- 変更 -->
</div>

<div class="flex justify-center">
    <form method="POST" action="{{ route('tasks.update', $task->id) }}" class="w-1/2">  <!-- 変更 -->
        @csrf
        @method('PUT')
        
        <div class="form-control my-4">
            <label for="status" class="label">
                <span class="label-text">status:</span>
            </label>
            <input type="text" name="status" value="{{ $task->status }}" class="input input-bordered w-full">
        </div>

        <div class="form-control my-4">
            <label for="content" class="label">
                <span class="label-text">タスク:</span>  <!-- 変更 -->
            </label>
            <input type="text" name="content" value="{{ $task->content }}" class="input input-bordered w-full">  <!-- 変更 -->
        </div>

        <button type="submit" class="btn btn-primary btn-outline">更新</button>
    </form>
</div>

@endsection