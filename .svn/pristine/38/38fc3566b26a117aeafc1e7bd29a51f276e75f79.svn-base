<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Http\Controllers\CreditCardController;
use Faker\Factory as Factory;
use App\User;
use App\CreditCardModel;

class CreditCardControllerTest extends TestCase {

    use DatabaseTransactions;

    public function testIndex() {

        // The user is not authenticated
        $this->action('GET', 'CreditCardController@index');
        $this->assertRedirectedTo('login');

        // The user is now authenticated
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $this->action('GET', 'CreditCardController@index');
        $this->seePageIs('/credit-card');
    }

    public function testUpdate() {

        $credit_card_controller = new CreditCardController();

        $user = User::where('subscriber', 'true')->first();
        $user_credit_card = $user->creditCard;

        // Verify information in "CreditCard" table before change them
        $this->seeInDatabase('CreditCard',
                array(
            'credit_card_id' => $user_credit_card->credit_card_id,
            'user_id' => $user_credit_card->user_id,
            'expiration_date' => $user_credit_card->expiration_date,
            'card_owner' => $user_credit_card->card_owner,
            'credit_card_number' => $user_credit_card->credit_card_number,
            'cvv_code' => $user_credit_card->cvv_code,
        ));

        $new_credit_card = factory(CreditCardModel::class)->create([
            'user_id' => $user->id,
        ]);

        $my_request = [
            '_token' => $user->remember_token,
            'credit_card_number' => $new_credit_card->credit_card_number,
            'card_owner' => $new_credit_card->card_owner,
            'expiration_date' => $new_credit_card->expiration_date,
            'cvv_code' => $new_credit_card->cvv_code,
        ];

        $myreq = Request::create('/credit-card/update/' . $user->id, 'POST',
                        $my_request);

        $result = $credit_card_controller->update($myreq, $user->id);

        // Find a row that corresponds to data in the array
        $this->seeInDatabase('CreditCard',
                array(
            'credit_card_id' => $user_credit_card->credit_card_id,
            'user_id' => $user_credit_card->user_id,
            'expiration_date' => $new_credit_card->expiration_date,
            'card_owner' => $new_credit_card->card_owner,
            'credit_card_number' => $new_credit_card->credit_card_number,
            'cvv_code' => $new_credit_card->cvv_code,
        ));
    }

    public function testShowBalance() {
        // The user is non authenticated
        $this->action('GET', 'CreditCardController@showBalance');
        $this->assertRedirectedTo('/login');

        // The user is now authenticated
        $user = factory(App\User::class)->make();
        $this->actingAs($user);
        $this->action('GET', 'CreditCardController@showBalance');
        $this->seePageIs('/balance');
    }

    public function testManage() {
        // The user is non authenticated
        $this->action('GET', 'CreditCardController@manage');
        $this->assertRedirectedTo('/login');

        // The user is now authenticated
        $user = factory(App\User::class)->create();
        $this->actingAs($user);
        $this->action('GET', 'CreditCardController@manage');
        $this->seePageIs('/userBalanceManagement');
    }

    public function testIncreaseAmount() {
        $credit_card_controller = new CreditCardController();
        $faker = Factory::create();

        // In the seeds files we create 20 users, so we have
        //user ids between 1 and 20
        $user_id = $faker->numberBetween('1', '20');
        $user = User::find($user_id);

        // Verify information in "users" table before change them
        $this->seeInDatabase('users',
                array(
            'lastname' => $user->lastname,
            'firstname' => $user->firstname,
            'credit' => '30',
        ));


        // min = 5, max = 200
        $random_amount_to_add = $faker->numberBetween('5', '200');

        $credit_card_controller->increaseAmount($user_id, $random_amount_to_add);

        $user_credit = intval($user->credit);
        $amount_added = $user_credit + $random_amount_to_add;

        // Find a row that corresponds to data in the array
        $this->seeInDatabase('users',
                array(
            'lastname' => $user->lastname,
            'firstname' => $user->firstname,
            'credit' => $amount_added,
        ));
    }

}
