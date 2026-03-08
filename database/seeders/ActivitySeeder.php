<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Activity::create(['name' => 'Todo']);
        Activity::create(['name' => 'Doing']);
        Activity::create(['name' => 'Testing']);
        Activity::create(['name' => 'Verify']);
        Activity::create(['name' => 'Done']);
    }
}
