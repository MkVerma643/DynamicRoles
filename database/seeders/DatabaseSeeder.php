<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
        ]);

        $adminRole = Role::create(['name' => 'admin']);
        $editorRole = Role::create(['name' => 'editor']);

        $editPostsPermission = Permission::create(['name' => 'edit_posts']);
        $deletePostsPermission = Permission::create(['name' => 'delete_posts']);

        $adminRole->givePermissionTo($editPostsPermission);
        $adminRole->givePermissionTo($deletePostsPermission);
        $editorRole->givePermissionTo($editPostsPermission);

    }
}
