@extends('layouts.app')

@section('content')
        
        <div class="prose ml-4">
    <h2>id = {{ $task->id }} のタスク詳細ページ</h2>  <!-- 変更 -->
</div>

<table class="table w-full my-4">
    <tr>
        <th>id</th>
        <td>{{ $task->id }}</td>  <!-- 変更 -->
    </tr>
    <tr>
            <th>status</th>
            <td>{{ $task->status }}</td>
        </tr>
    <tr>
        <th>タスク</th>  <!-- 変更 -->
        <td>{{ $task->content }}</td>  <!-- 変更 -->
    </tr>
</table>
{{-- タスク編集ページへのリンク --}}
<a class="btn btn-outline" href="{{ route('tasks.edit', $task->id) }}">このタスクを編集</a>  <!-- 変更 -->
    
{{-- タスク削除フォーム --}}
<form method="POST" action="{{ route('tasks.destroy', $task->id) }}" class="my-2">  <!-- 変更 -->
    @csrf
    @method('DELETE')
    
    <button type="submit" class="btn btn-error btn-outline" 
        onclick="return confirm('id = {{ $task->id }} のタスクを削除します。よろしいですか？')">削除</button>  <!-- 変更 -->
</form>

@endsection