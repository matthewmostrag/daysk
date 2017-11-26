@extends('layout')

@section('content')

    <div class="col">
        @include('partials.date')
        @include('partials.progress')
    </div>

    <ul class="col">
        @foreach ($tasks as $task)
            <li><a href="{{ route('tasks.show', ['task' => $task]) }}">{{ $task->title }}</a></li>
        @endforeach
    </ul>

@endsection
