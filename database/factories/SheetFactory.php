<?php

namespace Database\Factories;

use App\Models\Sheet;
use Illuminate\Database\Eloquent\Factories\Factory;

class SheetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sheet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word(),
            'brief' => '表单简介'.$this->faker->sentence(),
            'explanation' => '表单详情'.$this->faker->paragraph(),
            'created_by_id' => function(){
                return \App\Models\User::inRandomOrder()->first()->id;
            },
        ];
    }

}
