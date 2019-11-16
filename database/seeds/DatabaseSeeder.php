<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        App\User::create([
            'first_name' => 'hasan',
            'last_name' => 'ali',
            'email' => 'hasan@dev.com',
            'email_verified_at' => date('Y-m-d H:m:s'),
            'password' => bcrypt(12345678)
        ]);
        echo "email: hasan@dev.com\npassword: 12345678\n";
    }
}
