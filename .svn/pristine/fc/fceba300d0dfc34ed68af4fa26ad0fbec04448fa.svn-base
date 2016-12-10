<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class homeTest extends TestCase {

    use DatabaseTransactions;

    public function testSeeSubscription() {
        $user = factory(App\User::class)->make();
        $this->actingAs($user)
                ->visit('/home')
                ->click('Abonnement')
                ->seePageIs('/subscription');
        $this->see('Nom')
                ->see('Abonné depuis le :')
                ->see('Abonnement')
                ->see('Se désabonner');
    }

    public function testSeeHome() {
        $user = factory(App\User::class)->make();
        $this->actingAs($user)
                ->visit('home')
                ->see('Bienvenue' . $user->firtsname);
    }

    public function testSeeProfile() {

        $user = factory(App\User::class)->make();
        $this->actingAs($user)
                ->visit('/home')
                ->click('Profil')
                ->seePageIs('/profile');
        $this->see('Nom')
                ->see('Prénom')
                ->see('Date de naissance')
                ->see('Email')
                ->see('Numéro de téléphone');
    }

    public function testSeeUserBalanceManagement() {
        $user = factory(App\User::class)->create();
        $this->actingAs($user)
                ->visit('/home')
                ->click('Gestion du solde')
                ->seePageIs('/userBalanceManagement');
        $this->see('Solde actuel')
                ->see('Carte de crédit');
    }

    public function testSeePaymentHistory() {

        $user = factory(App\User::class)->create();

        $this->actingAs($user)
                ->visit('/home')
                ->click('Historique de virement')
                ->seePageIs('/history/payment');
        $this->see('Historique de virement')
                ->see('Numéro de facture')
                ->see('Ancien solde')
                ->see('Nouveau solde')
                ->see('Montant crédité')
                ->see('Nom du porteur')
                ->see('Numéro de carte')
                ->see('Code de sécurité')
                ->see('Date d\'expiration')
                ->see('Date du virement')
                ->see('Référence de facture');
    }

}
