<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use View;
use App\Comments;

class CommentsController extends Controller
{
    //
	
	public function addComments()
	{
		$candidateId=Input::get ('candidate_id');
		
	$user = new Comments();
	$return = $user->addComments();
	if ($return==true) {
		return Redirect::to ( '/view-applied-candidate/'.$candidateId )->with ("confirm", "Your comment posted successfully! " );
	}
	else 
	{
		return Redirect::to ( '/view-applied-candidate/'.$candidateId )->with ("empty", "Please writte the comment " );
		
	}
		
	}
	public function deleteComments($id)
	{
		$user = Comments::where('id',$id)->where('user_id',Auth::user()->id)->delete();
		
		if ($user) {
		return back()->with ("confirm", "Your comment deleted successfully! " );
		}
		else
		{
			return back()->with("empty", "You can not delete this comment " );
	    }
	
	}
	
	
}
