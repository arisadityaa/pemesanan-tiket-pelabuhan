<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $password = Hash::make('m');
        $user = User::create([
            'name' => 'Made',
            'email' => 'm@gmail.com',
            'password' => $password,
            'role' => 'employe',
        ]);

        $user->employe()->create(
            [
            'user_id' => $user->id
            ]
        );

    }
}
