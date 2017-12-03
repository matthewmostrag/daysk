@extends('layout')

@section('content')

    <div class="col">
        <h1 class="has-subtitle"><i class="icon icon-add"></i> Add a new task</h1>
        <p class="subtitle">Hey Pal, glad to see you there. This is a new task you'll succeed for sure! So, what is it about?</p>
    </div>

    <div class="col">
        <form method="POST" action="{{ route('tasks.store') }}">

            {{ csrf_field() }}

            <div class="form-group">
                <label for="title" class="has-label-message">Title:</label>
                <p class="label-message">* This field is <strong>required</strong>. Unless, you won't know what to do, you know...</p>
                <input type="text" name="title" id="title" placeholder="What is it?" value="{{ old('title') }}" required>
            </div>

            <div class="form-group">
                <label for="description" class="has-label-message">Description:</label>
                <p class="label-message">If you feel inspired you can fill this one! Up to you.</p>
                <textarea name="description" id="description" rows="3" placeholder="Something else to say?">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="due_date" class="has-label-message">Due date:</label>
                @if ($errors->has('due_date'))
                    @foreach ($errors->get('due_date') as $error)
                        <p class="label-error"><i class="icon icon-cancel-circled"></i> {{ $error }}</p>
                    @endforeach
                @else
                    <p class="label-message">It's better with it, believe me!</p>
                @endif
                <input type="date" name="due_date" id="due_date" class="datepicker-here" data-language="en" data-position="top left" placeholder="When will it be?" value="{{ old('due_date') }}">
            </div>

            <input type="submit" value="Let's do this!" class="button">

        </form>
    </div>

@endsection

@section('javascripts')
    @parent
    <script type="text/javascript" src="/js/tasks.js"></script>
@endsection
