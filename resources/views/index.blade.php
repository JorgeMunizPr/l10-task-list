@extends('layouts.app')


@section('title', 'The list of tasks')

@section('content')
    <a href="{{ route('tasks.create')}}">Add Task</a>
    @forelse ($tasks as $task)
        
    <div>
        <a href="{{ route('tasks.show', ['task'=>$task->id])}}">{{$task->title}}</a>
    </div>
    @empty
    <div>There are no tasks</div>  
    @endforelse ($tasks as $task)

    @if ($task->count())
        <nav>
            {{ $tasks->links() }}
        </nav>
    @endif
    
@endsection
