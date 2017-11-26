@extends('layout')

@section('content')

    <h1>Tasks</h1>

    <ul>
        @foreach ($tasks as $task)
            <li><a href="{{ route('tasks.show', ['task' => $task]) }}">{{ $task->title }}</a></li>
        @endforeach
    </ul>

@endsection
