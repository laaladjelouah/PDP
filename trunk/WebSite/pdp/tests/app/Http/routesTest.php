<?php

use App\Http\routes;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class routesTest extends TestCase {

    use DatabaseTransactions;

    public function testProfile() {
        $this->visit('/profile');
        $this->assertResponseOk();
    }

    public function testWelcome() {
        $this->visit('/');
        $this->assertResponseOk();
    }

    public function testHome() {
        $this->visit('/home');
        $this->assertResponseOk();
    }

    public function testProfileUpdate() {
        $user_id = 1;
        $this->visit('/profile/edit/' . $user_id);
        $this->assertResponseOk();
    }

    public function testSubscription() {
        $this->visit('/subscription');
        $this->assertResponseOk();
    }

    public function testUnsubscribe() {
        $this->visit('/subscription/unsubscribe');
        $this->assertResponseOk();
    }

}
