@extends('layouts.app')


@section('title', 'The list of tasks')

@section('content')
    <a class="link" href="{{ route('tasks.create')}}">Add Task</a>
    @forelse ($tasks as $task)
        
    <div>
        <a href="{{ route('tasks.show', ['task'=>$task->id])}}"
            @class(['line-through'=>$task->completed])>{{$task->title}}</a>
    </div>
    @empty
    <div>There are no tasks</div>  
    @endforelse ($tasks as $task)

    @if ($task->count())
        <nav class="mt-4">
            {{ $tasks->links() }}
        </nav>
    @endif
    
@endsection
