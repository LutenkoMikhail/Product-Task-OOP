<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Faker\Provider\it_IT\Person as FakerPerson;

$factory->define(Product::class, function (Faker $faker) {
    $authorId = \App\Author::all()->random()->id;
    $sku = FakerPerson::taxId();
    $price = $faker->randomFloat(2, 1, 99);

    return [
        'author_id' => $authorId,
        'title' => $faker->sentence(2),
        'description' => $faker->realText(100),
        'short_description' => $faker->realText(22),
        'sku' => $sku,
        'price' => $price,
        'thumbnail' => $faker->image('public/storage/images/products', 400, 300, null, true)
    ];
});
