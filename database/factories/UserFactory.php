<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'f_name' => $faker->firstName,
        'l_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'user_type' => 'seeker',
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});


$factory->define(App\Company::class, function (Faker $faker) {
    return [
        'user_id' =>App\User::all()->random()->id,
        'company_name' =>$company_name=$faker->company,
        'crte' => '2323123123',
        'description' => $faker ->paragraph(rand(2,10)),
        'industry' => rand(1,10) ,
        'address' => $faker ->address,
        'website' => $faker ->domainName,
        'logo' => 'avatar/ry.jpg',
        'rep_fullname' => $faker->name,
        'rep_position' => $faker->jobTitle,
        'rep_email' => $faker ->email,
        'rep_contact' => $faker ->phoneNumber,
    ];
});


$factory->define(App\Job::class, function (Faker $faker) {
    return [
        'user_id' =>App\User::all()->random()->id ,
        'company_id' =>App\User::all()->random()->id ,
        'category' => rand(1,5) ,
        'position' => $faker ->jobTitle ,
        'position_level' =>  rand(1,8),
        'number_vacancy' => rand(1,20) ,
        'work_schedule' =>  rand(1,6),
        'description' => $faker ->paragraph(rand(2,10)) ,
        'education' => rand(1,5) ,
        'work_experience' => rand(1,5) ,
        'gender' =>   rand(1,3),
        'salary' => '5,000' ,
        'type' => rand(0,1) ,
        'status' => rand(1,3) ,
        'skill' => $faker ->paragraph(rand(2,5)) ,
    ];
});


