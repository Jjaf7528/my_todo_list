<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\Task\StoreRequest;
use App\Http\Requests\Task\UpdateRequest;

class TaskController extends Controller
{
    
    public function index()
    {       
       $tasks = Task::all();
       return view('tasks.index', compact('tasks'));
    }   

    public function store(StoreRequest $request)
    {         
        $data=$request->only('name','description','date');

        Task::create($data);

        return redirect()->back()->with('success','Tarea CREADA satisfactoriamente');       
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', ['task' => $task]);
    }

    public function update(UpdateRequest $request, Task $task)
    {        
        $data=$request->only('name','description','date', 'status');

        $task->update($data);

        return redirect()->route('tasks.index')->with('success','Tarea ACTUALIZADA satisfactoriamente');
    }
   
    public function destroy(Task $task)
    {        
        $task->delete();

        return redirect()->back()->with('success','Tarea ELIMINADA satisfactoriamente');
    }
}
