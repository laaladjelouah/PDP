<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;

class LogoutAdminTest extends TestCase {

    public function testLogout() {

        $this->visit('/panel/login')
                ->type('admin@change.me', 'email')
                ->type('12345', 'password')
                ->press('Se connecter')
                ->see('Dashboard')
                ->click('Sortir')
                ->seePageIs('/panel/login');
    }

}
