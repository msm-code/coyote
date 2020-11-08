<?php

use Faker\Generator as Faker;

$factory->define(\Coyote\Post::class, function (Faker $faker) {
    return [
        'text' => $faker->realText(),
        'ip' => $ip = $faker->ipv4,
        'host' => $ip,
        'browser' => $faker->userAgent,
        'user_name' => $faker->userName,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now()
    ];
});

$factory->afterMaking(\Coyote\Post::class, function (\Coyote\Post $post, Faker $faker) {
    $post->id = $faker->numberBetween(10000000);
});
