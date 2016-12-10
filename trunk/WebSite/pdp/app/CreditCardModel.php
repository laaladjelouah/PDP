<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditCardModel extends Model {

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'CreditCard';
    protected $primaryKey = 'credit_card_id';
    protected $fillable = ['user_id', 'credit_card_number',
        'expiration_date', 'cvv_code', 'card_owner'];
    public $timestamps = false;

    public static function store(Array $request, $id) {
        // Variable to know if information changed
        $modified = false;
        $user = User::find($id);
        $credit_card = $user->creditCard;

        if (strcmp($credit_card['attributes']['credit_card_number'],
                        $request['credit_card_number']) !== 0) {
            $credit_card->credit_card_number = $request['credit_card_number'];
            $modified = true;
        }
        if (strcmp($credit_card['attributes']['card_owner'],
                        $request['card_owner']) !== 0) {
            $credit_card->card_owner = $request['card_owner'];
            $modified = true;
        }
        if (strcmp($credit_card['attributes']['expiration_date'],
                        $request['expiration_date']) !== 0) {
            // dd('yes');
            $credit_card->expiration_date = $request['expiration_date'];
            $modified = true;
        }
        if (strcmp($credit_card['attributes']['cvv_code'], $request['cvv_code']) !== 0) {
            $credit_card->cvv_code = $request['cvv_code'];
            $modified = true;
        }

        $credit_card->save();
        return $modified;
    }

    /**
     * Get the user that owns the credit card.
     */
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function increaseAmount($user_id, $amount_to_add) {
        $user = User::find($user_id);
        $user_amount = intval($user->credit);
        $user_amount = $user_amount + $amount_to_add;
        $user->credit = strval($user_amount);
        $user->save();
    }

}
