<h1>Add a task</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('tasks.store') }}">

    {{ csrf_field() }}

    <label for="title">Title:</label>
    <input type="text" name="title" id="title" required>

    <label for="title">Description:</label>
    <textarea name="description" id="description"></textarea>

    <label for="due_date">Due date:</label>
    <input type="date" name="due_date" id="due_date">

    <input type="submit" value="Create the task!">

</form>
