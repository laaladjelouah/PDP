<?php

namespace App\Http\Controllers;

use Paypalpayment;
use Illuminate\Http\Request;
use App\User;

class PaypalController extends Controller {

    /**
     * object to authenticate the call.
     * @param object $_apiContext
     */
    private $_apiContext;
    private $payment_history_controller = null;
    private $credit_card_controller = null;

    public function __construct() {

        $this->payment_history_controller = new PaymentHistoryController;
        $this->credit_card_controller = new CreditCardController();
        $this->_apiContext = Paypalpayment::ApiContext(config('paypal_payment.Account.ClientId'),
                        config('paypal_payment.Account.ClientSecret'));

        $config = config('paypal_payment'); // Get all config items as multi dimensional array

        $flatConfig = array_dot($config); // Flatten the array with dots

        $this->_apiContext->setConfig($flatConfig);
    }

    /*
     * Process payment using credit card
     */

    public function store(Request $request, $id) {
        $user = User::find($id);
        $credit_card_data = $user->creditCard;

        $data = $request->except('_token');
        $user_amount = $data['amount'];

        // ### Address
        // As we don't have address information in database, we give one
        // Of course if we have that information in database, we should retrieve
        // it.
        $addr = Paypalpayment::address();
        $addr->setLine1("3909 Witmer Road");
        $addr->setLine2("Niagara Falls");
        $addr->setCity("Niagara Falls");
        $addr->setState("NY");
        $addr->setPostalCode("14305");
        $addr->setCountryCode("US");
        $addr->setPhone("716-298-1822");

        // ### CreditCard
        // As we are in sandbox mode, we have to use credit card information
        // payapal give us.
        $card = Paypalpayment::creditCard();
        $card->setType("visa")
                ->setNumber("4020025448900204")
                ->setExpireMonth("04")
                ->setExpireYear("2021")
                ->setCvv2("456")
                ->setFirstName($user->firstname)
                ->setLastName($user->lastname);

        // ### FundingInstrument
        // A resource representing a Payer's funding instrument.
        // Use a Payer ID (A unique identifier of the payer generated
        // and provided by the facilitator. This is required when
        // creating or using a tokenized funding instrument)
        // and the `CreditCardDetails`
        $fi = Paypalpayment::fundingInstrument();
        $fi->setCreditCard($card);

        // ### Payer
        // A resource representing a Payer that funds a payment
        // Use the List of `FundingInstrument` and the Payment Method
        // as 'credit_card'
        $payer = Paypalpayment::payer();
        $payer->setPaymentMethod("credit_card")
                ->setFundingInstruments(array($fi));

        $item1 = Paypalpayment::item();
        $item1->setName('Créditer le compte')
                ->setCurrency('EUR')
                ->setQuantity(1)
                ->setTax(0.0)
                ->setPrice($user_amount);

        $itemList = Paypalpayment::itemList();
        $itemList->setItems(array($item1));


        $details = Paypalpayment::details();
        $details->setShipping("0.0")
                ->setTax("0.0")
                //total of items prices
                ->setSubtotal($user_amount);

        //Payment Amount
        $amount = Paypalpayment::amount();
        $amount->setCurrency("EUR")
                // the total is total item prices + taxes + shipping
                ->setTotal($user_amount)
                ->setDetails($details);

        // ### Transaction
        // A transaction defines the contract of a
        // payment - what is the payment for and who
        // is fulfilling it. Transaction is created with
        // a `Payee` and `Amount` types

        $transaction = Paypalpayment::transaction();
        $transaction->setAmount($amount)
                ->setItemList($itemList)
                ->setDescription("Payment description")
                ->setInvoiceNumber(uniqid());

        // ### Payment
        // A Payment Resource; create one using
        // the above types and intent as 'sale'

        $payment = Paypalpayment::payment();

        $payment->setIntent("sale")
                ->setPayer($payer)
                ->setTransactions(array($transaction));

        try {
            // ### Create Payment
            // Create a payment by posting to the APIService
            // using a valid ApiContext
            // The return object contains the status;
            $payment->create($this->_apiContext);
        } catch (\PPConnectionException $ex) {
            return "Exception: " . $ex->getMessage() . PHP_EOL;
            exit(1);
        }
        $this->credit_card_controller->increaseAmount($id, $user_amount);
        $data_json = json_decode($payment->toJSON(), true);

        $data_to_store = array(
            'old_amount' => $user->credit,
            'added_money' => $user_amount,
            'card_owner' => $credit_card_data['attributes']['card_owner'],
            'credit_card_number' => $credit_card_data['attributes']['credit_card_number'],
            'cvv_code' => $credit_card_data['attributes']['cvv_code'],
            'expiration_date' => $credit_card_data['attributes']['expiration_date'],
            'invoice_number' => $data_json['transactions'][0]['invoice_number'],
        );

        $this->payment_history_controller->store($request, $id, $data_to_store);

        return redirect('balance')->with('status',
                        'Votre compte a été crédité'
                        . ' de ' . $user_amount . '€');
    }

    public function increaseBalance() {
        return view('userBalance.increaseBalance');
    }

}
