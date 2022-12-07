<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

            //Default department with id =1
           


        //Department, Role and Permission first. then user. then the rest

        \App\Models\Department::factory()->create();
        \App\Models\Role::factory(10)->create();
        \App\Models\Permission::factory(10)->create();
        
        \App\Models\User::factory(10)->create();
        
        \App\Models\Rolepermission::factory(10)->create();
        \App\Models\Userrole::factory(10)->create();
        \App\Models\Departmentrole::factory(10)->create();
    }
}
