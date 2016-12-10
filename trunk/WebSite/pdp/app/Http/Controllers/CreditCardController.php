<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\CreditCardModel as CreditCardModel;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class CreditCardController extends Controller {

    private $credit_card_model = null;

    public function __construct() {
        $this->credit_card_model = new CreditCardModel();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $credit_card_data = User::find(Auth::user()->id)->creditCard;

        return view('credit-card.creditCard',
                ['credit_card_data' => $credit_card_data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
//
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $credit_card_data = User::find(Auth::user()->id)->creditCard;
        return view('credit-card.modifyCreditCard',
                ['credit_card_data' => $credit_card_data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $user = User::find(intval($id));
        if ($user != null) {
            $this->validate($request,
                    [
                'credit_card_number' => 'required|digits:16',
                'card_owner' => 'required|alpha|max:30',
                'expiration_date' => 'required|date|after:today',
                'cvv_code' => 'required|digits:3',
            ]);
            $data = $request->except('_token');
            $modified = $this->credit_card_model->store($data, intval($id));
            if ($modified) {
                return redirect('credit-card')->with('status',
                                'Votre carte de crédit'
                                . ' a bien été mise à jour.');
            }
            return redirect('credit-card')->with('status_not_modified',
                            "Aucune "
                            . "information n'a été modifiée.");
        }
        return 'Utilisateur non trouvé';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
//
    }

    public function showBalance() {
        return view('userBalance.userBalance');
    }

    public function manage() {
        $credit_card_data = User::find(Auth::user()->id)->creditCard;
        return view('userBalance.userBalanceManagement',
                ['credit_card_data' => $credit_card_data]);
    }

    public function increaseAmount($user_id, $amount_to_add) {
        $this->credit_card_model->increaseAmount($user_id, $amount_to_add);
    }

}
