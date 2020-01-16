<?php

use App\User;
use Illuminate\Database\Seeder;
use illuminate\Support\Str;
use illuminate\Support\Facades\Hash;

class SeedUsersTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /*
        $sql = 'INSERT INTO users (name, email, password) values (:name, :email, :password)';

        for($i=0; $i<30; $i++){
            DB::statement($sql,[
                'name'=> Str::random(10),
                'email'=> Str::random(10).'@gmail.com',
                'password'=> 'pippo'.$i
            ]);
        }*/

        factory(User::class, 30)->create();

    }
}
