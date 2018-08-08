<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        /* Settings */
        App\Models\Settings::create(['modified' => date("Y-m-d H:i:s", time())]);

        /* User groups */
        App\Models\UserGroup::create(['name' => 'Administrator', 'alias' => 'administrator', 'is_admin' => 1]);
        App\Models\UserGroup::create(['name' => 'Support', 'alias' => 'support', 'is_admin' => 1]);
        App\Models\UserGroup::create(['name' => 'Registered', 'alias' => 'registered']);

        /* Users */
        App\Models\User::create(['email' => 'admin@localhost.com', 'password' => 'b59c67bf196a4758191e42f76670ceba', 'group_id' => 1, 'first_name' => 'Admin', 'terms_accepted' => true, 'is_verified' => true]); // pass: 1111



       echo "\n\n\nSeeding completed. \n\n\n";
    }
}
