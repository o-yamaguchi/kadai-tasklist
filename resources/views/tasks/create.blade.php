{{--@extends('layouts.app')--}}

{{--@section('content')--}}
@if (Auth::id() == $user->id)
    <div class="prose ml-4">
        <h2 class="text-lg">タスク新規作成ページ</h2>  <!-- 変更 -->
    </div>
    
    <div class="flex justify-center">
        <form method="POST" action="{{ route('tasks.store') }}" class="w-1/2">  <!-- 変更 -->
            @csrf
            
            <div class="form-control my-4">
                <label for="status" class="label">
                    <span class="label-text">status:</span>
                </label>
                <input type="text" name="status" class="input input-bordered w-full">
            </div>
    
            <div class="form-control my-4">
                <label for="content" class="label">
                    <span class="label-text">タスク:</span>  <!-- 変更 -->
                </label>
                <input type="text" name="content" class="input input-bordered w-full">
            </div>
    
            <button type="submit" class="btn btn-primary btn-outline">投稿</button>
        </form>
    </div>
@endif
{{--@endsection--}}