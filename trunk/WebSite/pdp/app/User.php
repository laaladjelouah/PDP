<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
use Auth;

class User extends Authenticatable {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lastname', 'firstname', 'birthdate', 'email', 'password',
        'phoneNumber', 'credit', 'blacklisted', 'subscriber',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the credit card record associated to the user.
     */
    public function creditCard() {
        return $this->hasOne('App\CreditCardModel');
    }

    /**
     * Get the payment history associated to the user.
     */
    public function paymentHistory() {
        return $this->hasMany('App\PaymentHistoryModel');
    }

    /**
     * Unsubscribe a user
     */
    public function unsubscribe() {
        DB::table('users')
                ->where('id', Auth::user()->id)
                ->update(['subscriber' => 'false']);
    }

}
