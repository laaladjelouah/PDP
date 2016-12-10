<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AllHistoryTest extends TestCase {

    use DatabaseTransactions;

    public function testHistoryTestAll() {
        /*
          $this->visit('/panel/login')
          ->type('admin@change.me', 'email')
          ->type('12345', 'password')
          ->press('Se connecter')
          ->see('Dashboard')
          ->click('Historys')
          ->seePageIs('/panel/all'); */
    }

}
