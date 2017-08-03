<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Redirect;
class Comments extends Model
{
public $table='comments';
	
	public function addComments()
	{
		$data = Input::all ();
		$comment=Input::get ('comment');
		
		if(isset($comment) || !empty($comment))
		{
			$data = Input::all ();
	    $this->user_id = Auth::user()->id;
		$this->candidate_id = Input::get('candidate_id');
		$this->comments = Input::get ('comment');
		$this->save ();
		return true;
		}else{
		return false;
		}
	}
}
