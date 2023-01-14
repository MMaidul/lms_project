<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Course;
use App\Models\Curriculumn;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
        $user = new User();
        $user->name = 'Super Admin';
        $user->email = 'super@admin.com';
        $user->password = bcrypt('password');
        $user->save();

        $role = Role::create([
            'name' => 'Super Admin',
        ]);

        $permission = Permission::create([
            'name' => 'create-admin',
        ]);

        $role->givePermissionTo($permission);
        $permission->assignRole($role);

        $user->assignRole($role);

        Lead::factory()
            ->count(100)
            ->create();

        $course = Course::create([
            'name' => 'Laravel',
            'description' =>
                'Laravel is a web application framework with expressive,elegant syntax.We`ve already laid the foundation freeing you to create without sweating the small things',
            'image' => 'https://laravel.com/img/logomark.min.svg',
        ]);

        Curriculumn::factory()
            ->count(10)
            ->create();
    }
}
