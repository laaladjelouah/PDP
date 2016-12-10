<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTableTest extends TestCase {

    use DatabaseTransactions;

    public function testSaveUserOK() {
        $user = factory(App\User::class)->create([
            'lastname' => 'bob',
            'firstname' => 'bob_first',
        ]);
        $this->seeInDatabase('users', array(
            'lastname' => 'bob',
            'firstname' => 'bob_first',
        ));
    }

    public function testSaveUserFail() {
        factory(App\User::class)->create([
            'lastname' => 'bob',
            'firstname' => 'bob_first',
        ]);
        $this->notSeeInDatabase('users', array(
            'lastname' => 'bob1',
            'firstname' => 'bob_first',
        ));
    }

}
