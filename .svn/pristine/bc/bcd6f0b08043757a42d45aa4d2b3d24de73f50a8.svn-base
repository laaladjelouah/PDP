<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Http\Controllers\PaypalController;
use App\User as User;
use Faker\Factory as Factory;
use App\CreditCardModel;

class PaypalControllerTest extends TestCase {

    use DatabaseTransactions;

    public function testStore() {


        $paypal_controller = new PaypalController();

        $user = User::where('subscriber', 'true')->first();

        // Verify information in "users" table before change them
        $this->seeInDatabase('users',
                array(
            'lastname' => $user->lastname,
            'firstname' => $user->firstname,
            'credit' => '30',
        ));

        // Create random amount
        $faker = Factory::create();

        // min = 5, max = 200
        $random_amount = $faker->numberBetween('5', '200');

        $my_request = [
            '_token' => $user->remember_token,
            'amount' => $random_amount,
        ];

        $myreq = Request::create('/payment/' . $user->id, 'POST', $my_request);

        $result = $paypal_controller->store($myreq, $user->id);

        $user_credit = intval($user->credit);
        $amount_after_payment = $user_credit + $random_amount;

        // Find a row that corresponds to data in the array
        $this->seeInDatabase('users',
                array(
            'lastname' => $user->lastname,
            'firstname' => $user->firstname,
            'credit' => $amount_after_payment,
        ));
    }

}
