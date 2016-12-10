<?php

/*
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EditBikeTest extends TestCase {

    use DatabaseTransactions;

    public function BikeTestEdit()
    {      $this->visit('/panel/login')
        ->type('admin@change.me', 'email')
        ->type('12345', 'password')
        ->press('Se connecter')
        ->see('Dashboard')
        ->click('Bikes')
        ->see('/panel/all')
        ->click('Edit')
        ->seePageIs('/panel/edit')
        ->type('test id', 'id')
        ->type('test qr-code', 'Qr-code')
        ->type(' NON/OUI', 'reserved')
        ->type(' test state', 'state')
        ->type(' test picture', 'photo')
        ->press('save')
        ->seePageIs('/panel/all');






    }
}
*/