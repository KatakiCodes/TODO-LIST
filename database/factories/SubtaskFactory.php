<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\task;

class SubtaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $note = $this->faker->paragraph();
        $id_task = task::pluck('id')->random();
        return [
            'note'=>$note,
            'id_task' => $id_task,
            'concluded' => false
        ];
    }
}
