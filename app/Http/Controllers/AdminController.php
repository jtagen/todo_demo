<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\User;
use Auth;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {  
            
            if (!Auth::User()->is_admin)
                abort(403); //lazy cheat, really should set up proper middleware
            return $next($request);
        });


        
    }

    public function list()
    {

        $users = User::get()->sortBy('name');
        return view('admin.list')->with(['users'=>$users]);



    }

    public function view($user_id)
    {


        $items = Todo::where('user_id', $user_id)->orderBy('id')->get();
        $user = User::find($user_id)->first();
        return view('admin.view')->with(['user'=>$user,'items'=>$items]);

    }


}
