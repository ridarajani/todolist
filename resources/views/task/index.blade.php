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
            <div>
                <a href="{{url('/task')}}{{'/'.$tasks->id.'/edit'}}">edit</a>
            </div>
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
<a href="{{url('/task/create')}}">Add Task</a>