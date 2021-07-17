<?php

use App\User;
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
        $user = User::create([
            'name' => 'kasir',
            'email' => 'kasir@admin.test',
            'password' => bcrypt('12341234'),
            'email_verified_at' => now(),

        ]);
        $user->assignRole('user');
    }
}
