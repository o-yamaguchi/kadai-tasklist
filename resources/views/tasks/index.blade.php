@extends('layouts.app')

@section('content')

<div class="prose ml-4">
    <h2 class="text-lg">タスク 一覧</h2>  <!-- 変更 -->
</div>

@if (isset($tasks))  <!-- 変更 -->
    <table class="table table-zebra w-full my-4">
        <thead>
            <tr>
                <th>id</th>
                <th>status</th>
                <th>タスク</th>  <!-- 変更 -->
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)  <!-- 変更 -->
            <tr>
                <td><a class="link link-hover text-info" href="{{ route('tasks.show', $task->id) }}">{{ $task->id }}</a></td>  <!-- 変更 -->
                <td>{{ $task->status }}</td>
                <td>{{ $task->content }}</td>  <!-- 変更 -->
            </tr>
            @endforeach
        </tbody>
    </table>
@endif
{{-- タスク作成ページへのリンク --}}                                                 
<a class="btn btn-primary" href="{{ route('tasks.create') }}">新規タスクの投稿</a>  <!-- 変更 -->


@endsection