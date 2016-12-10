<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class profileTest extends TestCase {

    use DatabaseTransactions;

    public function testSeeProfile() {
        $user = factory(App\User::class)->create();
        $this->actingAs($user)
                ->visit('/profile')
                ->press('Modifier')
                ->seePageIs('/profile/edit/' . $user->id);
        $this->see('Nom')
                ->see('Prénom')
                ->see('Date de naissance')
                ->see('Adresse e-mail')
                ->see('Mot de passe')
                ->see('Confirmation du mot de passe ')
                ->see('Numéro de téléphone');
    }

}
