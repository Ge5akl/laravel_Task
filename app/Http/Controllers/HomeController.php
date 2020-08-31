<?php

namespace App\Http\Controllers;
use App\commetns;
use App\User;
use DB;
use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function showAuthUserPost(Request $request){
        $user = user::get();
        return view('welcome', ['user' => $user]);    
    }

    public function showUsersPost(Request $request, $id){
        $idUsr = $id;
      $users = user::find($id);
    return view('users.show', ['users' => $users]);
   }
}