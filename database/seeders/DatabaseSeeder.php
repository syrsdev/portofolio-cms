<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Work_status;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'Surya Nata Ardhana',
            'email' => 'surya.nata.aardhana@gmail.com',
            'password' => bcrypt('password'),
        ]);

        Work_status::create(
            [
                'title' => 'Intership',
            ],
        );
        Work_status::create(
            [
                'title' => 'Fulltime',
            ],
        );
        Work_status::create(
            [
                'title' => 'Contact',
            ],
        );
        Work_status::create(
            [
                'title' => 'Freelance',
            ],
        );
    }
}
