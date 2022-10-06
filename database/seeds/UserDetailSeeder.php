<?php

use App\Models\UserDetail;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        // con il pluck mi prendo solo 'id dell'utente e poi faccio il foreach per girare su cui utenti
        $users_ids = User::pluck('id')->toArray();
        foreach ($users_ids as $id) {
            $user_detail = new UserDetail();
            $user_detail->user_id = $id;
            $user_detail->first_name = $faker->firstName();
            $user_detail->last_name = $faker->lastName();
            $user_detail->phone = $faker->phoneNumber();
            $user_detail->address = $faker->streetName();
            $user_detail->birth_year = $faker->year();
            $user_detail->save();
        }
    }
}
