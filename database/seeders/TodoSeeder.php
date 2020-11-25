<?php

namespace Database\Seeders;

use App\Models\Todo;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Todo::create([
            'title' => 'Create Github Repository',
            'description' => 'Login to Github account and create new repository',
            'rank' => 1,
        ]);
        Todo::create([
            'title' => 'Planning',
            'description' => 'Read requirements and do some planning.',
            'rank' => 2,
        ]);
        Todo::create([
            'title' => 'Development',
            'description' => 'Create the application and develop features.',
            'rank' => 3,
        ]);
    }
}
