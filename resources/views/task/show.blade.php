<h1>{{ $task->title }}</h1>

<form method="POST" action="/tasks/{{ $task->id }}">

    {{ method_field('DELETE') }}

    {{ csrf_field() }}

    <input type="submit" value="Delete the task!">

</form>
