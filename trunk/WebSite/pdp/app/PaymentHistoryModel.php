<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use App\User;

class PaymentHistoryModel extends Model {

    protected $table = 'PaymentHistory';
    protected $fillable = [
        'user_id', 'expiration_date', 'card_owner', 'credit_card_number', 'cvv_code',
        'old_amount', 'added_money', 'new_amount', 'invoice_number',
    ];

    public function getHistory($id) {
        $payment_history = DB::table('PaymentHistory')->where('user_id', $id)
                        ->orderBy('id', 'desc')->get();

        //dd($payment_history);
        return $payment_history;
    }

    public function store($id, $data) {
        $user = User::find($id);
        $payment_history = User::find($id)->paymentHistory;

        $old_amount = intval($data['old_amount']);
        $added_money = intval($data['added_money']);
        $new_amount = $old_amount + $added_money;

        //$flight = App\Flight::create(['name' => 'Flight 10']);
        $new_payment = $this->create([
            'old_amount' => $data['old_amount'],
            'user_id' => $id,
            'added_money' => $data['added_money'],
            'new_amount' => strval($new_amount),
            'card_owner' => $data['card_owner'],
            'credit_card_number' => $data['credit_card_number'],
            'cvv_code' => $data['cvv_code'],
            'expiration_date' => $data['expiration_date'],
            'invoice_number' => $data['invoice_number'],
        ]);
        $new_payment->save();
        //dd($payment_history);
    }

}
