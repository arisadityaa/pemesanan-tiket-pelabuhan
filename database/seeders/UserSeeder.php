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
        $passwordEmploye = Hash::make('m');
        $userEmploye = User::create([
            'name' => 'Made',
            'email' => 'm@gmail.com',
            'password' => $passwordEmploye,
            'role' => 'employe',
        ]);

        $userEmploye->employe()->create(
            [
            'user_id' => $userEmploye->id
            ]
        );

        $passwordMember = Hash::make(('a'));
        $userMemeber = User::create([
            'name' => 'Aris',
            'email' => 'a@gmail.com',
            'password' => $passwordMember,
            'role' => 'member',
        ]);

        $userMemeber->member()->create(
            [
                'user_id' => $userMemeber->id
            ]
            );

    }
}
