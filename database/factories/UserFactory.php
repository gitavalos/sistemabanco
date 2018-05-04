<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'firstname' => $faker->name,
        'lastname' => $faker->name,
        'countnumber' => '123456',
        
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),

        /*
        $table->integer('id')->unique();
            $table->string('firstname');
            $table->string('lastname');
            $table->integer('countnumber')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('balance');
            $table->rememberToken();
            $table->timestamps();
        */
    ];
});
