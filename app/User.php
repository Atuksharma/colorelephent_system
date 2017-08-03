<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Hash;
use Redirect;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{
    use Notifiable;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
   public function registration()
   {
   	$data = Input::all();
   	//dd(	$data);
    $user= new User();
    $user->name= Input::get('username');
    $user->email= Input::get('email');
    $user->password= Hash::make(Input::get('password'));
    $user->status = 'Inactive';
    $user->user_type= 'evaluator';
    $user->remember_token= Input::get('_token');
    $user->save();
    
    Mail::send('users.mails.welcome_email',[
    		'user' => $user,
    		
    ],function ($message) use ($user){
    	$message->from('example@gmail.com');
    	$message->to ($user->email, $user->name)->subject('Welcome to Candidate Evaluation system ');
    });
   // return Redirect::to('/createpayment');
    //return redirect('createpayment');
    return ;
   }
}
