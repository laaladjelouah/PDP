<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Request as Request;
use App\Http\Controllers\ProfileController as ProfileController;
use App\User as User;
use App\ProfileModel as ProfileModel;
use Faker\Factory as Factory;

class ProfileControllerTest extends TestCase {

    use DatabaseTransactions;

    public function testIndex() {

        // The user is not authenticated
        $this->action('GET', 'ProfileController@index');
        $this->assertRedirectedTo('login');

        // The user is now authenticated
        $user = factory(User::class)->make();
        $this->actingAs($user);
        $this->action('GET', 'ProfileController@index');
        $this->seePageIs('/profile');
    }

    public function testUpdateOK() {

        $profileController = new ProfileController();
        $user = factory(User::class)->create();

        // Verify information in "users" table before change them
        $this->seeInDatabase('users',
                array(
            'lastname' => $user->lastname,
            'firstname' => $user->firstname,
            'birthdate' => $user->birthdate,
            'email' => $user->email,
            'password' => $user->password,
            'phoneNumber' => $user->phoneNumber,));

        // Create random values that will replace the ones in database
        $faker = Factory::create();
        $random_lastname = $faker->lastName;
        $random_firstname = $faker->firstName;
        $random_birthdate = $faker->date('Y-m-d', 'now');
        $random_email = $faker->email;
        $random_password = str_random(10);
        $random_phone_number = $faker->numberBetween('1000000000', '2147483647');

        $my_request = [
            '_token' => $user->remember_token,
            'lastname' => $random_lastname,
            'firstname' => $random_firstname,
            'birthdate' => $random_birthdate,
            'email' => $random_email,
            'password' => $random_password,
            'password_confirmation' => $random_password,
            'phoneNumber' => $random_phone_number,
        ];

        $myreq = Request::create('/profile/update/' . $user->id, 'POST',
                        $my_request);

        $result = $profileController->update($myreq, $user->id);
        $random_password_hash = ProfileModel::getHashedPassword();

        // Find a row that corresponds to data in the array
        $this->seeInDatabase('users',
                array(
            'lastname' => $random_lastname,
            'firstname' => $random_firstname,
            'birthdate' => $random_birthdate,
            'email' => $random_email,
            'password' => $random_password_hash,
            'phoneNumber' => $random_phone_number,
        ));
    }

}
