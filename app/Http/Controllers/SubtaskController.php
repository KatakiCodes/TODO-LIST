<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subtask;

class SubtaskController extends Controller
{
    public function __construct() {
        $this->middleware('subTaskMiddleware')->only('storage');
    }
    function storage(Request $request)
    {
        subtask::create($request->all());
        return redirect()->back();
    }
    function update(Request $request)
    {
        $data = [
            'note'=>$request->note,
            'id_task'=>$request->id_task,
            'concluded'=> $request->concluded,
        ];
        subtask::where('id',$request->id)->update($data);
        return redirect()->back();
    }
    function destroy(Request $request)
    {
        subtask::where('id',$request->id)->delete();
        return redirect()->back();
    }
}
