<h1>{{ $task->title }}</h1>

<a href="{{ route('tasks.index') }}">Back to the list</a>

<a href="{{ route('tasks.edit', ['task' => $task]) }}">Edit the task</a>

<form method="POST" action="{{ route('tasks.destroy', ['task' => $task]) }}">

    {{ method_field('DELETE') }}

    {{ csrf_field() }}

    <button type="submit">Delete the task!</button>

</form>
