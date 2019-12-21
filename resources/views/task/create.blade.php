<h1>hello!</h1>
<form method="post" action="{{url('/task')}}">
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