<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\task;

class TaskController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('taskMiddleware')->only('storage');
    }
    function index()
    {
        $tasks = task::where('id_user',auth()->user()->id)->get();
        return view('home', compact('tasks'));
    }
    function show($title)
    {
        $task = task::where('title',$title)->first();
        return view('task', compact('task'));
    }
    function storage(Request $request)
    {
        $task = Task::create($request->all());
        return redirect()->route('task.index',compact('task'));
    }
    function update(Request $request)
    {
        $data = [
            'title'=>$request->title,
            'id_user'=>$request->id_user,
            'concluded'=> $request->concluded,
            'abandoned'=> $request->abandoned
        ];
        task::where('id',$request->id)->update($data);
        return redirect()->route('task.index');
    }
    function destroy(Request $request)
    {
        dd($request);
        task::where('id',$request->id_task_delete)->delete();
        //return redirect()->route('task.index');
    }
}
