@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')
@section('styles')
    <style>
        .error-message{
            color:red;
        }
    </style>
@endsection


@section('content')
    <form action="{{ isset($task) ? route('tasks.update', ['task'=>$task->id]) : route('tasks.store')}} " method="POST">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ $task->title ?? old('title') }}">
                @error('title')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="description">Description</label>
                <textarea name="description" id="description">{{ $task->description ?? old('description') }}</textarea>
                @error('description')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="long_description">Long Description</label>
                <textarea name="long_description" id="long_description">{{ $task->long_description ?? old('long_description') }}</textarea>
                @error('long_description')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit">
                @isset($task)
                    Edit Task
                @else
                    Add Task
                @endisset
            </button>
    </form>
@endsection