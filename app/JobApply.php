<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Hash;
use Redirect;
use Illuminate\Support\Facades\Mail;

class JobApply extends Model
{
	public $table='applied_candidate';
	
	public function apply()
	{
		$data = Input::all ();
		$image = Input::file ( 'coverletter' );
		$coverletter = time () . '.' . $image->getClientOriginalExtension ();
		$destinationPath = public_path ( '../assets/users/coverletters' );
		$image->move ( $destinationPath, $coverletter );
		
		$image = Input::file ( 'resume' );
		$resume = time () . 'cv.' . $image->getClientOriginalExtension ();
		$destinationPath = public_path ( '../assets/users/resume' );
		
		$image->move ( $destinationPath, $resume );
		
		
		$ip= \Request::ip();
		$ipdata = \Location::get($ip);
		$candidate = new JobApply ();
		$candidate->name = Input::get ('username');
		$candidate->email = Input::get ('email' );
		$candidate->website = Input::get ('website');
		$candidate->question = Input::get ('question');
		$candidate->coverletter = $coverletter;
		$candidate->resume = $resume;
		$candidate->ip = $ip;
		$candidate->ipdata = json_encode($ipdata);
		$candidate->save ();
		
		Mail::send ( 'users.mails.Thanks_email', [ 
				'candidate' => $candidate 
		]
		, function ($message) use ($candidate) {
			$message->from ( 'example@gmail.com' );
			$message->to ( $candidate->email, $candidate->name )->subject ( 'Thanks For Applieng' );
		} );
		// return Redirect::to('/createpayment');
		// return redirect('createpayment');
		
		return $candidate;
	}
}
