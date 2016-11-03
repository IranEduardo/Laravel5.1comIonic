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

$factory->define(CodeDelivery\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(CodeDelivery\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->define(CodeDelivery\Models\Product::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
        'price'       => $faker->randomFloat(2,1,1000)
    ];
});

$factory->define(CodeDelivery\Models\Client::class, function (Faker\Generator $faker) {
    return [
        'phone'   => $faker->phoneNumber,
        'address' => $faker->address,
        'city'    => $faker->city,
        'state'   => $faker->state,
        'zipcode' => $faker->postcode
    ];
});

$factory->define(CodeDelivery\Models\Order::class, function (Faker\Generator $faker) {
    return [
            'client_id'           => $faker->optional($weight = 0.75, $default = 1)->numberBetween(1,10), //25% chance of default value 1
            'user_deliveryman_id' => $faker->optional($weight = 0.60)->numberBetween(1,10), //40% chance of default value NULL
            'total'               => $faker->randomFloat(2,1,1000),
            'status'              => $faker->numberBetween(0,4)
    ];
});

$factory->define(CodeDelivery\Models\OrderItem::class, function (Faker\Generator $faker) {
    return [
          'price' => $faker->randomFloat(2,1,1000),
          'qtde'  => $faker->numberBetween(1,10),
          'product_id' => $faker->numberBetween(1,10)
    ];
});
