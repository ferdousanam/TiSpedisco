<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = array(
            'first_name' => 'Ferdous',
            'last_name' => 'Anam',
            'email' => 'anam@mail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12345678'),
        );
        User::create($admin);
    }
}
