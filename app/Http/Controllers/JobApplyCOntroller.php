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
use App\Ratings;
use App\Reviews;

use App\JobApply;
class JobApplyCOntroller extends Controller
{
    public function apply()
    {
		$data = Input::all ();
		$rules = array (
				'username' => 'required',
				'email' => 'required||email|unique:applied_candidate',
				'website' => 'required|URL',
				'coverletter' => 'required|mimes:doc,pdf,docx',
				'resume' => 'required|mimes:doc,pdf',
				'question' => 'required',
				'CaptchaCode' => 'required|valid_captcha' 
		)
		;
		$validator = Validator::make ( $data, $rules );
		
		if ($validator->fails ()) {
			// Session::flash('message', 'Please Enter Valid Email & Password.');
			return Redirect::to ( '/job-apply' )->withInput ( Input::except ( 'password' ) )->withErrors ( $validator );
		} else {
			$user = new JobApply ();
			$return = $user->apply ();
			if ($return) {
				return Redirect::to ( '/job-apply' )->with ( "confirm", "You have successfully Applied for the job, Will connect back to you if your profile would be shortlisted! " );
			}
		}
    }
    
    
    
    public function getAppliedCandidates()
    {
    	$appliedCandidate=JobApply::orderBy('id','desc')->get();
    	//return Redirect::to ( '/applied-candidates' )->with('data',$appliedCandidate);
    	
    	return View::make("applied-candidates")->with(array('data'=>$appliedCandidate));
    	//dd($appliedCandidate);
    }
    public function viewAppliedCandidate($id)
    {
    	$appliedCandidate=JobApply::where('id',$id)->first();
    	if($appliedCandidate)
    	{
    		$reviews=Reviews::where('candidate_id',$id)->where('user_id',Auth::user()->id)->first();
    		if(!$reviews)
    		{
    			$revws=new Reviews();
    			$revws->candidate_id=$id;
                $revws->user_id=Auth::user()->id;
                $revws->save();
    		}
    	$ratings= Ratings::where('candidate_id',$id)->where('user_id',Auth::user()->id)->first();
    	if($ratings){$ratings=$ratings->ratings;}else {$ratings==0;}
    	$overallRatings= Ratings::where('candidate_id',$id)->avg('ratings');
    	$comments=Comments::leftjoin('users','users.id','=','comments.user_id')
    	->where('candidate_id',$id)->orderBy('comments.id','Desc')
    	->select('comments.*','users.name as name', 'users.id as user_id','comments.id as id','comments.comments as comments')
    	->get();

    	$total_reviews= Reviews::where('candidate_id',$id)->count();
    	//return Redirect::to ( '/applied-candidates' )->with('data',$appliedCandidate);
    	return View::make("view-applied-candidate")->with(array('data'=>$appliedCandidate,'comments'=>$comments,'ratings'=>$ratings,'overallRatings'=>$overallRatings,'total_reviews'=>$total_reviews));
        }
    	else 
    	{
    		return Redirect::to ( '/applied-candidates');
    	}
    }
    
}
