@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <div class="mb-4">
        <a class="link" href="{{ route('task.index')}}"><-Go Back</a>
    </div>
    <p class="mb-4 text-slate-700">{{ $task->description }}</p>

    @if ($task->long_description)
        <p class="mb-4 text-slate-700">{{$task->long_description}}</p>
    @endif
    <p  class="mb-4 text-slate-700">{{$task->created_at->diffForHumans()}} . {{$task->updated_at->diffForHumans()}}</p>


    <p class="mb-4">
        @if ($task->completed)
            <span class="font-medium text-green-500">Completed</span>
        @else
            <span class="font-medium text-red-500">Not Completed</span>
        @endif
    </p>
    
    <div class="flex gap-2">
        <a class="btn" href="{{ route('tasks.edit', ['task'=>$task])}}">Edit</a>

        <form action="{{ route('task.toggle-complete', ['task'=>$task])}}" method="post">
            @csrf
            @method('PUT')
            <button class="btn" type="submit">
                Mark as {{ $task->completed ? 'not completed' : 'completed'}}
            </button>
        </form>
        <form action="{{ route('task.destroy', ['task'=>$task->id])}}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn" type="submit">Delete</button>
        </form>
    </div>
@endsection