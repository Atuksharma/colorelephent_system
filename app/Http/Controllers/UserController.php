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
use App\User;

class UserController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function registration()
    {
    	$data = Input::all();
      $rules = array(
      		'username' => 'required',
			'email' => 'required||email|unique:users',
			'password' => 'required|min:6',
      		'repassword' => 'required|min:6|same:password',
			'accept' => 'required',
			//'photo' => 'mimes:jpeg,bmp,png'
		     );
	    $validator = Validator::make($data, $rules);
	    if ($validator->fails()){
	      //Session::flash('message', 'Please Enter Valid Email & Password.'); 
	      return Redirect::to('/index')->withInput(Input::except('password'))->withErrors($validator);
	    }
	    else {
	    $user= new	User();
	    $user->registration();
	   // return Redirect::to('/index');
	    return Redirect::to('/index')->with("confirm","You have successfully registered with us, Please Varify your email to activate your account! ");
	    
	    }
    }
	    	
    public function Authuanticate()
    {
		$userdata = array (
				'email' => Input::get ('useremail'),
				'password' => Input::get ('password'),
				'status'=>'Active',
				'user_type' =>'Evaluator'
		);
		
		if (Auth::validate ( $userdata )) {
			if (Auth::attempt ( $userdata )) {
				return Redirect::to ( '/dashboard' );
			}
		} 

		else {
			Session::flash ( 'message', 'Username or Password is Incorrect!' );
			return Redirect::to ( '/index' )->withInput(Input::except('password'));
		}
	     
	    }
	    
	    
	    
	    public function confirmation($token)
	    {
	    	$user=User::where("remember_token",$token)->first();
	    	// We can add token expiry code also here
	    	if($user)
	    	{
	    		$user->status="Active";
	    		$user->save();
	    		return Redirect::to('/index')->with("confirm","Your account has been activated successfully, You can login now !");
	    	}
	    	else 
	    	{
	    		return Redirect::to('/index')->with("confirm","Sorry this is not the valid link");
	    	}
	    	
	    }   
	    
	    
	    
	    
	    
	    
    }

