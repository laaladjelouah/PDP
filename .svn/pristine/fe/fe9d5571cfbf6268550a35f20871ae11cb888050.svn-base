<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $number_of_users = 19;
        $number_of_credit_cards = 20;

        Artisan::call('pane:install');

        /* Generate user ezra gorka. We will use the password and the login(email)
          of this user to login. So we don't have to register, we can login
          because the data of this user will be in the database */
        factory(App\User::class)->create([
            'lastname' => 'Ezra',
            'firstname' => 'Gorka',
            'phoneNumber' => '0123645894',
            'email' => 'ezra.gorka@hotmail.com',
            'password' => Hash::make('ezragorka'),
        ]);

        // Generate users
        factory(App\User::class, $number_of_users)->create();


        for ($i = 1; $i <= $number_of_credit_cards; $i++) {
            // Generate credit cards
            factory(App\CreditCardModel::class)->create([
                'user_id' => $i,
            ]);

            // Generate bikes
            factory(App\Bike::class)->create();

            // Generate history
            factory(App\History::class)->create([
                'user_id' => $i,
                'bike_id' => $i,
            ]);
        }
    }

}
