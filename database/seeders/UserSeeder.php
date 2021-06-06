<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = env('DEFAULT_USER_NAME', 'User');
        $user->email = env('DEFAULT_USER_EMAIL', 'user@user.user');
        $user->password = bcrypt(env('DEFAULT_USER_PASSWORD', 'password'));
        $user->save();
    }
}
