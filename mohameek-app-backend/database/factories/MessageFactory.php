<?php

namespace Database\Factories;

use App\Models\ChatRoom;
use App\Models\City;
use App\Models\Message;
use App\Models\Province;
use Database\Factories\Helpers\FactoryHelper;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\City>
 */
class MessageFactory extends Factory
{
    protected $model = Message::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'chatRoom_id' => FactoryHelper::getRandomModelId(ChatRoom::class),
            'message' => $this->faker->text(),
        ];
    }
}
