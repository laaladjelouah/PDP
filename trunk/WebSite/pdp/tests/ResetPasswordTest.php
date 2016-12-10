<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ResetPasswordTest extends TestCase {

    use DatabaseTransactions;

    public function testresetpassword() {
        /*
          $this->visit('/panel/login')
          ->type('admin@change.me', 'email')
          ->type('12345', 'password')
          ->press('Login')
          ->see('Dashboard')
          ->click('changer de mot de passe')
          ->seePageIs('/panel/ChangePassword')
          ->type('admin@change.me', 'email Adress')
          ->type('ooooo', 'mot de passe actuel')
          ->type('pppppp', 'mot de passe')
          ->type('pppppp', 'Confirmer le nouveau mot de passe')
          ->press('Changer de mot de passe')
          ->see('Password is not correct!!');

          $this->visit('/panel/login')
          ->type('admin@change.me', 'email')
          ->type('12345', 'password')
          ->press('Login')
          ->see('Dashboard')
          ->click('Change Password')
          ->type('admin@change.me', 'email')
          ->type('12345', 'current_password')
          ->type('pppppp', 'password')
          ->type('ppppp', 'password_confirmation')
          ->press('Change Password')
          ->see('Passwords not matched!!');

          $this->visit('/panel/login')
          ->type('admin@change.me', 'email')
          ->type('12345', 'password')
          ->press('Login')
          ->see('Dashboard')
          ->click('Change Password')
          ->type('admin@change.me', 'email')
          ->type('12345', 'current_password')
          ->type('pppppp', 'password')
          ->type('pppppp', 'password_confirmation')
          ->press('Change Password')
          ->see('Successfully Changed Your Password!!'); */
    }

}
