<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;

class TaskController extends Controller
{
   public function index(){
      $tasks = Task::all();
      return view('admin.task.index',compact('tasks'));
   }

   public function taskCreate(){
    $users = User::all();
     return view('admin.task.create',compact('users'));
   }

   public function taskPost(Request $request){
    $user = User::find($request->user);

    $task = new Task();
    $task->title = $request->title;
    $task->date = $request->date;
    $task->user_id = $user->id;
    $task->description = $request->description;
    $task->status = 0;

    $task->save();
    return redirect()->route('task.all')
        ->with('message', 'Record added successfully!');

   }

   public function taskMark($id){
      $task = Task::findOrFail($id);
      $task->status = 1;
      $task->save();
      return redirect()->route('task.all')
      ->with('message', 'Record added successfully!');
   }

   public function taskEdit($id){
    $users = User::all();
    $task = Task::findOrFail($id);
    return view('admin.task.taskEdit',compact('task','users'));
   }

   public function taskUpdate(Request $request){
    $task = Task::findOrFail($request->task_id);
    $task->title = $request->title;
    $task->date = $request->date;
    $task->user_id = $request->user;
    $task->description = $request->description;
    $task->status = $request->status;
    $task->save();
    return redirect()->route('task.all')
        ->with('message', 'Record added successfully!');
   }
}
