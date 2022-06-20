<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::factory()->count(2)->create();
        \App\Models\Lent::factory()->count(10)->create();
        \App\Models\LentHistory::factory()->count(10)->create();
    }
}
