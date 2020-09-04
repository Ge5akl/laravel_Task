<?php

namespace App\Http\Controllers;
use App\commetns;
use App\User;
use DB;
use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;


class CommentController extends Controller
{
      public function showAuthUserComments(Request $request){
        $userId=Auth::id();
   		$count = App\Commetns::count();
		$skip = 0;
		$limit = 5;
        $user=App\Commetns::where('object_id', $userId)->skip($skip)->take($limit)->with('parent', 'user')->get();
        $commentdd = json_decode($user, true);
        //dump($commentdd);
       	//dump($commentdd);	
            	//$user->comments()->get();
          	 //$comment = App\User::->find($User_Id)->comments()->with('parent');
        	
          	/*$comments=App\User::find(1)->with('comments.parent')->get();
          	$comment = json_decode($comments, true);
          	$ddcomment = json_decode(App\User::find($userId)->with('comments.parent')->get(), true);
  
          	*/
          	
           return view('users.index', compact('commentdd'));   
           dump(Request::json('Data')); 
    } 

    public function getOuhterComment(Request $request){
    	 $userId=Auth::id();
    	 $count = App\Commetns::count();
		$skip = 5;
		$limit = $count - $skip;
    	 $user=App\Commetns::where('object_id', $userId)->skip($skip)->take($limit)->with('parent', 'user')->get();
    	  $commentdd = json_decode($user, true);

    	 


    	 return view('users.pagination_data',compact('commentdd'));


    	 //return view('users.pagination_data', compact('commentdd'));
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
         $user=App\Commetns::where('object_id', $id)->with('parent', 'user')->get();
         //$user=App\User::with('comments.parent', 'comments.user')->where('id', $id)->get();
          $commentdd = json_decode($user, true);
        // dump($commentdd);
        return view('users.show', compact('commentdd'), compact('currentUserid')); 	
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

   	public function createAnswerComments(Request $request, $Object_id, $id){

   		 $bodyComments = $request->input('CommentBody');
        $User_Id=Auth::id();
        if(isset($_POST['button'])){
         commetns::insert(
            ['Body' => $bodyComments, 'User_Id' =>$User_Id, 'Object_id' => $Object_id, 'parent_id' => $id]
        );
         return redirect()->back();
     }
   		return view('users.addAnswerComment');

   	}
}
