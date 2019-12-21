<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
class taskController extends Controller
{
    public $data_view;
    public function index(Task $task){
        $this->data_view = [
            'view' => 'task.index',
        ];
        $task = Task::all();
        return view('layout',$this->data_view ,compact('task'));
    }
    public function store(){
        Task::create( request()->validate([
            'task' => ['required' , 'min:5']
        ]));
        return redirect('/task');
    }
    public function edit(Task $task){
        $this->data_view = [
            'view' => 'task.edit',
        ];
        return view('layout',$this->data_view ,compact('task'));
    }
    public function update(Task $task){
    
        $task->update(request(['task']));

        return redirect('/task'); 
    }
    public function destroy(Task $task){
        $task->delete();
        return redirect('/task'); 
    }
    public function completed(Task $task){
        $task->update([
            'completed' => request()->has('completed')  
        ]);
        return back();
    }
}