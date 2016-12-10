<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class subscriptionTest extends TestCase {

    use DatabaseTransactions;

    public function testSubscriptionPage() {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
                ->visit('/subscription')
                ->seeInElement('p', 'Actif');

        $this->actingAs($user)
                ->visit('/subscription')
                ->press("Se désabonner")
                ->seePageIs('/subscription');

        $this->seeInDatabase('users', array(
            'lastname' => $user->lastname,
            'firstname' => $user->firstname,
            'subscriber' => 'false',
        ));
    }

}
