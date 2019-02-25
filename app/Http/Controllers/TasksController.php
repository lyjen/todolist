<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class TasksController extends Controller
{
    //
	public function index(){
		$tasks = Task::orderBy('due_date','asc')->paginate(2);
		
		return view('tasks.index')->with('tasks', $tasks);
	}
	
	
	public function create(){
		
		return view('tasks.create');
	}
	
	public function store(Request $request)
    {
        // Validate The Data
        $this->validate($request, [
            'name' => 'required|string|max:255|min:3',
            'description' => 'required|string|max:10000|min:10',
            'due_date' => 'required|date',
        ]);
        // Create a New task
        $task = new Task;
        // Assign the Task data from our request
        $task->name = $request->name;
        $task->description = $request->description;
        $task->due_date = $request->due_date;
      
        $task->save();
 
        Session::flash('success', 'Task Created Successfully');
     
        return redirect()->route('task.create');
    } 
	
	public function edit($id){
		
		$task = Task::find($id);
		$task->dueDateFormatiing = false;
		return view('tasks.edit')->withTask($task);
		
		
	}
	
	public function update(Request $request, $id){
		 // Validate The Data
        $this->validate($request, [
            'name' => 'required|string|max:255|min:3',
            'description' => 'required|string|max:10000|min:10',
            'due_date' => 'required|date',
        ]);
        // Find ID
        $task = Task::find($id);
        // Assign the Task data from our request
        $task->name = $request->name;
        $task->description = $request->description;
        $task->due_date = $request->due_date;
      
        $task->save();
 
        Session::flash('success', 'Task Updated Successfully');
     
        return redirect()->route('task.index');
		
	}
	
	public function destroy($id){
		$task = Task::find($id);
		$task->delete();
		Session::flash('success','Task Deleted successfully');
		return redirect()->route('task.index');
	}
}
