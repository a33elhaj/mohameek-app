<?php

namespace Database\Factories;

use App\Models\ChatRoom;
use App\Models\Customer;
use App\Models\Customer_Case;
use App\Models\Lawyer;
use Brick\Math\BigInteger;
use Database\Factories\Helpers\FactoryHelper;
use Illuminate\Database\Eloquent\Factories\Factory;
use Mockery\Matcher\Any;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Case_Offer>
 */
class ChatRoomFactory extends Factory
{

    protected $model = ChatRoom::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $lawyerId = FactoryHelper::getRandomModelId(Lawyer::class);
        $customerId = FactoryHelper::getRandomModelId(Customer::class);
        return [
            'room_id' => 'customer_id' . $customerId . 'lawyer_id' . $lawyerId,
            'lawyer_id' => $lawyerId,
            'customer_id' => $customerId,
        ];
    }
}
