<?php

namespace Database\Seeders;

use App\Models\User;
use App\Repositories\UserRepository;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Str;

class UserSeeder extends Seeder
{
    use TruncateTable, DisableForeignKeys;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate('users');
        // $user = \App\Models\User::factory(1)->create();
        // $user = User::where('email', 'user@domain.com')->first();
        // $token = $user->createToken('myapptoken', ['server:update'])->plainTextToken;
        $user = User::create([
            'name' => 'user',
            'email' => 'user@domain.com',
            'password' => bcrypt('123456'),

        ]);

        $token = $user->createToken('myapptoken', ['server:update'])->plainTextToken;
        $this->enableForeignKeys();
    }
}
