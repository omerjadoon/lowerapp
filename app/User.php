<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;
class User extends Authenticatable implements MustVerifyEmail
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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function sendEmailVerificationNotification()
    {

        $this->notify(new \App\Notifications\UserVerifyNotification(Auth::user()));  //pass the currently logged in user to the notification class
    }
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new  \App\Notifications\PasswordReset($token));
    }
   
    public function buyerDetail(){
        return $this->hasOne('App\BuyerDetail','user_id','id');
    }
    public function sellerDetail(){
        return $this->hasOne('App\SellerDetail','user_id','id');
    }
    
}
