<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Ticket;
use App\Models\Reply;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $count=rand(3, 4);
        User::factory()->count(10)
            ->has(Ticket::factory()->count(10)
            ->has(Reply::factory()->count($count)  , 'replies')
            , 'tickets') ->create();
            //replies and tickets are relationship methods 
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
}
