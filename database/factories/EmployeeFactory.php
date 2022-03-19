<?php

namespace Database\Factories;

use App\Models\Fund;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'firstname' => $this->faker->colorName(),
            'fullname'  => $this->faker->colorName(),
            'lastname' => $this->faker->colorName(),
            'sex' => $this->faker->numberBetween(1,2),
            'type' => $this->faker->numberBetween(1,3),
            // 'fund_id' => Fund::pluck('id')->random(),
            'title' => $this->faker->colorName(),
            'content' => $this->faker->text(),
            'content_en' => $this->faker->text(),
            'type_value' => $this->faker->numberBetween(20,100),
            'type_value_en' => $this->faker->numberBetween(20,100),
        ];
    }
}
