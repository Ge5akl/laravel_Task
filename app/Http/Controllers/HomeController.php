<?php

namespace App\Http\Controllers;
use App\commetns;
use App\User;
use DB;
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

    public function showAuthUserComments(Request $request){
        $user = user::get();
        $UserId=Auth::id();
        $commetns = commetns::where('Object_id', '=', $UserId)->get();
        return view('users.index', compact('commetns'), ['user' => $user]);    
    } 


     public function create(Request $request)
    {
        $UserId=Auth::id();
        $BodyComments = $request->input('CommentBody');
        commetns::insert(
            ['Body' => $BodyComments, 'User_Id' =>$UserId, 'Object_id' => $UserId]
        );
        return redirect()->back();
    }

    public function createOutherUserComment(Request $request, $id){
        $BodyComments = $request->input('CommentBody');
        $UserId=Auth::id();
         commetns::insert(
            ['Body' => $id, 'User_Id' =>$UserId, 'Object_id' => $id]
        );
         return redirect()->back();
    }

    public function showOutherUserComment(Request $request, $id){
        $commetns = commetns::where('Object_id', '=', $id)->get();
        return view('users.show', compact('commetns'));    
    }
}
