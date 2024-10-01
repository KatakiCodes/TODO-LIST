<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        task::factory(10)->create();
    }
}
