<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginAdminTest extends TestCase {

    use DatabaseTransactions;

    public function testlogin() {
        $this->visit('/panel/login')
                ->type('admin@change.me', 'email')
                ->type('12345', 'password')
                ->press('Se connecter')
                ->see('Dashboard');

        $this->visit('/panel/login')
                ->type('admin@change.me', 'email')
                ->type('ooooo', 'password')
                ->press('Se connecter')
                ->see("Le mot de passe ou l'email n'est pas valide");

        $this->visit('/panel/login')
                ->click('Mot de passe oublié ?')
                ->seePageIs('/panel/remind')
                ->type('', 'email')
                ->press('Envoyer le mail de réinitialisation')
                ->see("Aucun utilisateur n'a été trouvé avec cette adresse e-mail.");
    }

}
