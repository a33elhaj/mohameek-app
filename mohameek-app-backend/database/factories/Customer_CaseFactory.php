<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Customer;
use App\Models\Customer_Case;
use App\Models\Major;
use Database\Factories\Helpers\FactoryHelper;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer_Case>
 */
class Customer_CaseFactory extends Factory
{
    protected $model = Customer_Case::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'summary' => $this->faker->paragraph(),
            'duration' => $this->faker->randomNumber(1, 30),
            'customer_id' => FactoryHelper::getRandomModelId(Customer::class),
            'major_id' => FactoryHelper::getRandomModelId(Major::class),
            'city_id' => FactoryHelper::getRandomModelId(City::class),
        ];
    }
}
