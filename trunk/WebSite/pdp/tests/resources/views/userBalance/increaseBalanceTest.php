<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Faker\Factory as Factory;
use App\User;

class increaseBalanceTest extends TestCase {

    use DatabaseTransactions;

    public function testIncreaseBalance() {

        // This test is ok but if it is commented it's because it takes a lot of time
        // due to the fact that it connects to paypal's sandbox

        $faker = Factory::create();
        $random_amount = $faker->numberBetween('5', '200');

        $user = User::where('subscriber', 'true')->first();

        $this->actingAs($user)
                ->visit('/increase/balance')
                ->type($random_amount, 'amount')
                ->press('Créditer')
                ->seePageIs('/balance');

        $this->seeInElement('div',
                'Votre compte a été crédité de ' . $random_amount . '€');
    }

}
