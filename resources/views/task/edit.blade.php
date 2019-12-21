<h1>Edit Project</h1>
<form method="post" action="{{url('/task')}}{{'/'.$task->id}}">
    @method('PATCH')
    @csrf
    <div>
        <input type="text" name="task" value={{ $task->task }}>
    </div>
    <div>
        <input type="submit" name="update" value="Update Project">
    </div>
</form>