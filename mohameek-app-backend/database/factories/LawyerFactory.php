<?php

namespace Database\Factories;

use App\Models\Lawyer;
use App\Models\Major;
use Database\Factories\Helpers\FactoryHelper;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lawyer>
 */
class LawyerFactory extends Factory
{
    protected $model = Lawyer::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // return [
        //     'name' => $this->faker->name(),
        //     'email' => $this->faker->unique()->safeEmail(),
        //     'phone' => $this->faker->unique()->phoneNumber(),
        //     'majors' => [1, 2, 3], //FactoryHelper::getRandomModelId(Major::class),
        //     'email_verified_at' => now(),
        //     'password' => 'password', // password
        //     'remember_token' => Str::random(10),
        // ];
        return [
            'name' => 'lawyer', //$this->faker->name(),
            'email' => 'lawyer@domain.com', //$this->faker->unique()->safeEmail(),
            'phone' => '0111111111',
            'email_verified_at' => now(),
            'password' => '123456', //bcrypt('123456'), //'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }
}
