<?php

namespace App\Http\Controllers;
use App\commetns;
use App\User;
use DB;
use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
      public function showAuthUserComments(Request $request){
        $userId=Auth::id();
        $users = user::join('commetns', 'users.id', '=', 'commetns.User_id')
            ->select('users.*', 'commetns.*')
            ->where('Object_id', '=', $userId)
            ->get();
        $commetns = commetns::where('Object_id', '=', $userId)->get();
        return view('users.index', compact('users'));    
    } 


     public function create(Request $request)
    {
          if(Auth::check()){
        $userId=Auth::id();
        $bodyComments = $request->input('CommentBody');
        commetns::insert(
            ['Body' => $bodyComments, 'User_Id' =>$userId, 'Object_id' => $userId]
        );
        return redirect()->back();
    } else {
         return redirect()->back();
    }
    }

    public function createOutherUserComment(Request $request, $id){
          if(Auth::check()){
       // $url = action('HomeController@showOutherUserComment');
        $bodyComments = $request->input('CommentBody');
        $userId=Auth::id();
         commetns::insert(
            ['Body' => $bodyComments, 'User_Id' =>$userId, 'Object_id' => $id]
        );
          return redirect()->back();
      } else{
            return redirect()->back();
      }
    }

    public function showOutherUserComment(Request $request, $id){
        $currentUserid = $id;
        $users = user::join('commetns', 'users.id', '=', 'commetns.User_id')
            ->select('users.*', 'commetns.*')
            ->where('Object_id', '=', $id)
            ->get();
            
        $commetns = commetns::where('Object_id', '=', $id)->get();
        return view('users.show', compact('users'), compact('currentUserid')); 

    }

     public function deleteAuthUserComments(Request $request, $id){
        if(Auth::check()){
        $users = commetns::where('id', '=', $id)
            ->delete('commetns.*');
            return redirect()->back();
        }
        else {
             return redirect()->back();
        }
    }

   	public function showAllAuthUserComments(Request $request){
   		 if(Auth::check()){
   		 	$id = Auth::id();
   		 	 $comments = user::join('commetns', 'users.id', '=', 'commetns.User_id')
            ->select('users.*', 'commetns.*')
            ->where('users.id', '=', $id)
            ->get();
            return view('users.userComment', compact('comments')); 
   		 }
   		  else {
             return redirect()->back();
        }
   	}

   	public function createAnswerComments(Request $request, $id){

   	}
}
