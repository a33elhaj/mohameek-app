<?php

namespace Database\Seeders;

use Database\Factories\CustomerCaseFactory;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerCaseSeeder extends Seeder
{
    use TruncateTable, DisableForeignKeys;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->disableForeignKeys();
        $this->truncate('customer__cases');
        $customer_cases = \App\Models\Customer_Case::factory(10)->create();
        $this->enableForeignKeys();
    }
}
