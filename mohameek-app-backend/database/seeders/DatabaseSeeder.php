<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(MajorSeeder::class);

        $this->call(AdminSeeder::class);
        $this->call(LawyerSeeder::class);
        $this->call(CustomerSeeder::class);

        $this->call(ProvinceSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(CustomerCaseSeeder::class);
        $this->call(CaseOfferSeeder::class);
        $this->call(ChatRoomSeeder::class);
        $this->call(MessageSeeder::class);
    }
}
