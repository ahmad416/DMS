<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Desigination;
use App\Department;

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
        factory(Desigination::class, 5)->create();
        factory(Department::class, 5)->create();
        factory(User::class, 10)->create();
    }
}
