<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        
        User::create(array(
            'name'     => 'Hugh Haworth',
            'username' => 'hughsie',
            'email'    => 'hughelliotclyde@gmail.com',
            'password' => Hash::make('skux69'),
        ));
    }
}
