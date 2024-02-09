<?php

namespace Database\Factories;

use App\Models\Customer_Case;
use App\Models\Lawyer;
use Database\Factories\Helpers\FactoryHelper;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Case_Offer>
 */
class Case_OfferFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'price' => $this->faker->randomNumber(1, 10) * 1000,
            'lawyer_id' => FactoryHelper::getRandomModelId(Lawyer::class),
            'customer_case_id' => FactoryHelper::getRandomModelId(Customer_Case::class),
        ];
    }
}
