<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Redirect;
class Ratings extends Model
{
  
	
	public $table='ratings';
	
	public function updateRatings()
	{
		$data = Input::all ();
		$rating=Input::get ('rating');
		$candidate_id=Input::get ('candidate_id');
		if(!empty($rating) && !empty($candidate_id))
		{
			$data = self::where('candidate_id',$candidate_id)->where('user_id',Auth::user()->id)->first();
			if(isset($data) && $data->id!='')
			{
				$data->ratings = $rating;
				$data->save();
			}
			else{
				$this->user_id = Auth::user()->id;
				$this->candidate_id = $candidate_id;
				$this->ratings =$rating;
				$this->save ();
			}
				
		}
		return;
	}
	
}
