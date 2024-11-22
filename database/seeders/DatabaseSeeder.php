<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Principal;
use App\Models\Download;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Principal::factory(1)->create();
        Download::factory(1)->create();
    }
}
