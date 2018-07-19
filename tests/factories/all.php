<?php
$factory('App\User',[

		'username' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'provider_id'=> $faker->randomNumber(8),
        'nickname'=> $faker->firstName,
        'avatar'=> $faker->imageUrl()
]);

$factory('App\Post',[

		'title'=>$faker->sentence,
		'body'=>$faker->paragraph,
		'user_id'=>'factory:App\User'
]);

$factory('App\Comment',[

		'body'=>$faker->paragraph,
		'post_id'=>$faker->randomElement(range(1,20))
]);