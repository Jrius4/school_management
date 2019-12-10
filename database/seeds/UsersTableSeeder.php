<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset the users table
        // DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->delete();

        if (env('APP_ENV') === 'local')
        {
            // generate 3 users/author
            $faker = Faker::create();

            DB::table('users')->insert([
                [
                    'name' => "Kazibwe Julius Junior",
                    'slug' => 'kazibwe-julius-junior',
                    'email' => "kazibwejuliusjunior@gmail.com",
                    'password' => bcrypt('admins3cret'),
                    'bio' => $faker->text(rand(250, 300))
                ],
                [
                    'name' => "Administator",
                    'slug' => 'administrator',
                    'email' => "charitykorreinz@gmail.com",
                    'password' => bcrypt('admins3cret'),
                    'bio' => $faker->text(rand(250, 300))
                ],
                [
                    'name' => "Male Paul",
                    'slug' => 'male-paul',
                    'email' => "mp@test.com",
                    'password' => bcrypt('s3cret'),
                    'bio' => $faker->text(rand(250, 300))
                ],
                [
                    'name' => "Jjuuko Henry",
                    'slug' => 'jjuuku-henry',
                    'email' => "jh@test.com",
                    'password' => bcrypt('s3cret'),
                    'bio' => $faker->text(rand(250, 300))
                ],
            ]);
        }
        else
        {
            DB::table('users')->insert([
                [
                    'name' => "administrator",
                    'slug' => 'admin',
                    'email' => "kazibwejuliusjunior@gmail.com",
                    'password' => bcrypt('admins3cret'),
                    'bio' => "I'm an Administrator"
                ]
            ]);
        }
    }
}
