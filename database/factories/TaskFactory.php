<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence();
        return [
            'title'=> $title,
            'id_user'=>User::pluck('id')->random(),
            'concluded' => false,
            'abandoned' => false
        ];
    }
}
