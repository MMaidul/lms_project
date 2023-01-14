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
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'Superadmin@lms.test',
            'password' => bcrypt('password'),
        ]);

        $role = Role::create([
            'name' => 'Super Admin',
        ]);

        $permission = Permission::create([
            'name' => 'create-admin',
        ]);

        $role->givePermissionTo($permission);
        $permission->assignRole($role);

        $user->assignRole($role);

        $communicationRole = Role::create([
            'name' => 'Communication',
        ]);

        $user = User::create([
            'name' => 'Comminucation Team',
            'email' => 'communication@lms.test',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole($communicationRole);

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
