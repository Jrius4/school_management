<?php

use App\Career;
use App\Project;
use App\Service;
use App\QuoteRequest;
use App\FieldIndustry;
use App\SystemProcess;
use App\CareerCategory;
use App\ClientTestimony;
use App\NdebiTechClient;
use App\ProjectCategory;
use App\ServiceCategory;
use Faker\Generator as Faker;



$factory->define(CareerCategory::class, function (Faker $faker) {
    return [
        'title'=>$faker->randomElement(['Marketing','Data Science','Graphics','Leadership']),
        'slug'=>$faker->slug,
        'description'=>$faker->paragraph(rand(1, 2), true),
    ];
});

$factory->define(Career::class, function (Faker $faker) {
    return [
        'title'=>$faker->randomElement(['Marketing','Data Science','Graphics','Leadership']),
        'image'=>$faker->randomElement(['Post_Image_1.jpg','','Post_Image_3.jpg','Post_Image_2.jpg']),
        'slug'=>$faker->slug,
        'excerpt'=>$faker->paragraph(rand(1, 2), true),
        'body'=>$faker->paragraph(rand(5, 8), true),
        'career_category_id'=>$faker->numberBetween(1, 3),
    ];
});

$factory->define(ClientTestimony::class, function (Faker $faker) {
    return [
        'image'=>$faker->randomElement(['avatar_1.jpg','avatar_2.jpg','avatar_3.jpg']),
        'name'=>$faker->randomElement(['Kazibwe Julian Jr','Charity .K.','Jane Doe','John Doe']),
        'slug'=>$faker->slug,
        'title_of_client'=>$faker->title,
        'message'=>$faker->paragraph(rand(1, 2), true),
    ];
});

$factory->define(FieldIndustry::class, function (Faker $faker) {
    return [
        'title'=>$faker->randomElement(['Marketing','Data Science','Humanities','Leadership']),
        'slug'=>$faker->slug,
        'description'=>$faker->paragraph(rand(1, 2), true),
    ];
});

$factory->define(NdebiTechClient::class, function (Faker $faker) {
    return [
        'logo'=>$faker->randomElement(['logo.png','logo_2.png','logo_3.png','logo.png']),
        'name'=>$faker->randomElement(['Stanbic Bank','','NSSF','']),
    ];
});

$factory->define(ProjectCategory::class, function (Faker $faker) {
    return [
        'title'=>$faker->randomElement(['Marketing','Data Science','Graphics','Leadership']),
        'slug'=>$faker->slug,
        'description'=>$faker->paragraph(rand(1, 2), true),
    ];
});

$factory->define(Project::class, function (Faker $faker) {
    return [
        'title'=>$faker->randomElement(['Marketing','Data Science','Graphics','Leadership']),
        'image'=>$faker->randomElement(['Post_Image_1.jpg','','Post_Image_3.jpg','Post_Image_2.jpg']),
        'slug'=>$faker->slug,
        'excerpt'=>$faker->paragraph(rand(1, 2), true),
        'body'=>$faker->paragraph(rand(5, 8), true),
        'project_category_id'=>$faker->numberBetween(1, 3),
    ];
});

$factory->define(QuoteRequest::class, function (Faker $faker) {
    return [
        'name'=>$faker->randomElement(['Marketing','Data Science','Graphics','Leadership']),
        'email'=>$faker->email,
        'company'=>$faker->randomElement(['Stanbic Bank','','Centenury Bank','NSSF']),
        'telephone'=>$faker->randomElement(['+256 7839 27328','','+256 7777 55673','+256 6732 27328']),
        'idea'=>$faker->paragraph(rand(1, 2), true),
        'description'=>$faker->numberBetween(1, 3),
        'budget'=>$faker->numberBetween(1500, 2100),
        'time_done'=>$faker->numberBetween(1, 3),
        'field_industry_id'=>$faker->numberBetween(1, 3),
    ];
});

$factory->define(SystemProcess::class, function (Faker $faker) {
    return [
        'title'=>$faker->randomElement(['Marketing','Data Science','Graphics','Leadership']),
        'slug'=>$faker->slug,
        'excerpt'=>$faker->paragraph(rand(1, 2), true),
        'body'=>$faker->paragraph(rand(5, 8), true),
    ];
});

$factory->define(ServiceCategory::class, function (Faker $faker) {
    return [
        'title'=>$faker->randomElement(['Marketing','Data Science','Graphics','Leadership']),
        'slug'=>$faker->slug,
        'description'=>$faker->paragraph(rand(1, 2), true),
    ];
});

$factory->define(Service::class, function (Faker $faker) {
    return [
        'title'=>$faker->randomElement(['Marketing','Data Science','Graphics','Leadership']),
        'image'=>$faker->randomElement(['Post_Image_1.jpg','','Post_Image_3.jpg','Post_Image_2.jpg']),
        'slug'=>$faker->slug,
        'excerpt'=>$faker->paragraph(rand(1, 2), true),
        'body'=>$faker->paragraph(rand(5, 8), true),
        'service_category_id'=>$faker->numberBetween(1, 3),
    ];
});
