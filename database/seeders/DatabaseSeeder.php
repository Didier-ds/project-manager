<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::truncate();
        Project::truncate();
        Task::truncate();
        DB::table('project_user')->truncate();

        $admin = User::create([
            'name' => 'super Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'api_token' => Str::random(60)
        ]);

        $user1 = User::create([
            'name' => 'Didier',
            'email' => 'didier@gmail.com',
            'password' => bcrypt('password'),
            'api_token' => Str::random(60)
        ]);

        $proj = Project::create([
            'title' => 'Apace',
            'description' => 'An eccommerce sit',
            'manager_id' => $admin->id
        ]);

        $task1 = Task::create([
            'title' => 'Seed Database',
            'description' => 'Seed the Database with test data',
            'user_id' => $admin->id,
            'project_id' => $proj->id,
            'status_code' => 'COMPLETE'
        ]);

        $task2 = Task::create([
            'title' => 'Complete Development',
            'description' => 'write the code yo.',
            'user_id' => $user1->id,
            'project_id' => $proj->id,
            'status_code' => 'COMPLETE'
        ]);

        $proj->users()->saveMany([$admin, $user1]);
    }
}
