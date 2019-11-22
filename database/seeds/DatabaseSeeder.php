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
        factory(App\Address::class, 50)->create();
        // $this->call(UsersTableSeeder::class);
        $user = App\User::create([
            'first_name' => 'hasan',
            'last_name' => 'ali',
            'email' => 'hasan@dev.com',
            'email_verified_at' => date('Y-m-d H:m:s'),
            'password' => bcrypt(12345678)
        ]);
        App\Ticket::create([
            'user_id' => $user->id,
            'title' => 'First',
            'message' => 'About first message',
            'status' => 'unread',
            'state' => 'open'
        ]);
        App\Ticket::create([
            'user_id' => $user->id,
            'title' => 'First',
            'message' => 'About first message',
            'status' => 'unread',
            'state' => 'closed'
        ]);
        echo "email: hasan@dev.com\npassword: 12345678\n";
    }
}
