<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Auth;

class TodoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $items = Todo::where('user_id', Auth::user()->id)->where('is_complete',0)->where('is_deleted',0)->orderBy('id')->get();
        return view('list')->with(['items'=>$items]);
    }

    public function create(Request $request)
    {

        if (trim($request->input('item')) == "") {
            $request->session()->flash('status', 'Task cannot be blank');
            return redirect()->route('todo_list');
        }
        $todo = new Todo();
        $todo->user_id = Auth::user()->id;
        $todo->item = $request->input('item');
        $todo->save();
        return redirect()->route('todo_list');
    }

    public function delete(Request $request)
    {

        Todo::where('id',$request->input('id'))->update(['is_deleted'=>1]);
        return response()->json(['result' => 'success']);
    }

    public function complete(Request $request)
    {
        Todo::where('id',$request->input('id'))->update(['is_complete'=>1]);

        return response()->json(['result' => 'success']);
    }




    //
}
