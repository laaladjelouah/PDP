<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class loginTest extends TestCase {

    use DatabaseTransactions;

    public function testConnexionOK() {
        //email and password are correct
        $this->visit('login')
                ->type('ezra.gorka@hotmail.com', 'email')
                ->type('ezragorka', 'password')
                ->press('Connexion')
                ->seePageIs('/home');
    }

    public function testConnexionFail() {
        // password is not correct
        $this->visit('login')
                ->type('ezra.gorka@hotmail.com', 'email')
                ->type('ezragorkals', 'password')
                ->press('Connexion')
                ->seePageIs('/login');

        $this->seeInElement('span', 'Ces identifiants ne correspondent pas '
                . 'à nos enregistrements');
    }

}
