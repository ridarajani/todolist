<ul>
    @foreach ($task as $tasks)
        <li>
            <div>
                <form method="post" action="{{url('/task')}}{{'/'.$tasks->id}}">
                    @method('PATCH')
                    @csrf
                    <label for="completed">
                        <input type="checkbox" name="completed" onchange="this.form.submit()" {{ $tasks->completed ? 'checked' : ''}}>
                    </label>
                </form>
                <p>{{$tasks->task}}</p>
            </div>
            @if($tasks->completed == 0)
                <div>
                    <a href="{{url('/task')}}{{'/'.$tasks->id.'/edit'}}">edit</a>
                </div>
            @endif
            <div>
                <form method="post" action="{{url('/task')}}{{'/'.$tasks->id}}">
                    @method('DELETE')
                    @csrf
                    <div>
                        <input type="submit" name="submit" value="delete Project">
                    </div>
                </form>
            </div>
        </li>
        @endforeach
</ul>
<form method="post">
    @csrf
    <div>
        <input type="text" name="task" placeholder="Enter you task here" value="{{ old('task')}}">
    </div>
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error}}</div>
        @endforeach
    @endif
    <div>
        <input type="submit" name="submit" value="Add Task">
    </div>
</form>
{{-- <a href="{{url('/task/create')}}">Add Task</a> --}}