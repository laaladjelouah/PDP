<?php

/*
  |--------------------------------------------------------------------------
  | Model Factories
  |--------------------------------------------------------------------------
  |
  | Here you may define all of your model factories. Model factories give
  | you a convenient way to create models for testing and seeding your
  | database. Just tell the factory how a default model should look.
  |
 */

/* Factory to generate fake users */

$factory->define(App\User::class,
        function (Faker\Generator $faker) {
    return [
        'lastname' => $faker->lastName,
        'firstname' => $faker->firstName,
        'birthdate' => $faker->date('Y-m-d', 'now'),
        'credit' => '30',
        'phoneNumber' => $faker->numberBetween('1000000000', '2147483647'),
        'blacklisted' => 'false',
        'subscriber' => 'true',
        'email' => $faker->email,
        'password' => Hash::make(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

/* Factory to generate fake credit card */

$factory->define(App\CreditCardModel::class,
        function (Faker\Generator $faker) {
    $month = $faker->randomElement(array('2016', '2017'));
    $year = $faker->randomElement(array('05', '07', '08', '09', '10', '11', '12'));
    $credit_card_number_part_one = $faker->numberBetween('10000', '99999');
    $credit_card_number_part_two = $faker->numberBetween('10000', '99999');
    $credit_card_number_part_three = $faker->numberBetween('100000', '999999');
    $credit_card_number = $credit_card_number_part_one . '' .
            $credit_card_number_part_two . '' . $credit_card_number_part_three;
    return [
        'expiration_date' => $month . '-' . $year,
        'card_owner' => $faker->lastName,
        'credit_card_number' => $credit_card_number,
        'cvv_code' => $faker->numberBetween('100', '999'),
    ];
});

/* Factory to generate fake bikes */

$factory->define(App\Bike::class,
        function (Faker\Generator $faker) {
    return [
        'Qr_code' => 'qr_code\\' . $faker->word,
//        'picture' => $faker->image('public\img\bikePicture'),
        'picture' => 'public\img\bikePicture',
        'reserved' => $faker->randomElement(array('true', 'false')),
        'status' => "i don't know",
    ];
});

/* Factory to generate fake history */

$factory->define(App\History::class,
        function (Faker\Generator $faker) {
    return [
        'start_borrowing_date' => $faker->dateTimeBetween('-2 years', 'now'),
        'end_borrowing_date' => $faker->dateTimeBetween('-2 years', 'now'),
        'active' => "i don't know",
//        'picture_before' => $faker->image('public\img\bikePicture\history'),
        'picture_before' => 'public\img\bikePicture\history',
//        'picture_after' => $faker->image('public\img\bikePicture\history'),
        'picture_after' => 'public\img\bikePicture\history',
        'repair_cost' => $faker->randomElement(array('0', '5', '10', '20')),
        'status_before' => $faker->randomElement(array('Neuf', 'Bon etat', 'Passable',
            'Mauvais etat', 'Dégradé')),
        'status_after' => $faker->randomElement(array('Neuf', 'Bon etat', 'Passable',
            'Mauvais etat', 'Dégradé')),
    ];
});
