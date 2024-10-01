<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\subtask;

class SubtaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        subtask::factory(35)->create();
    }
}
