<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        
        
        Permission::create(['name' => 'admin_user_show']);
        Permission::create(['name' => 'admin_user_edit']);
        Permission::create(['name' => 'show_edit_category']);
        
        Permission::create(['name' => 'add_user_admin']);
        Permission::create(['name' => 'delete_user_admin']);
        Permission::create(['name' => 'add_delete_category']);

        // create roles and assign existing permissions
        
        $role1 = Role::create(['name' => 'writer']);
       
        $role1->givePermissionTo('admin_user_show');
        $role1->givePermissionTo('admin_user_edit');
        $role1->givePermissionTo('show_edit_category');

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('add_user_admin');
        $role2->givePermissionTo('delete_user_admin');
        $role2->givePermissionTo('add_delete_category');


        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
     /*   $user = \App\Models\admin\User::factory()->create([
            'name' => 'Example User',
            'email' => 'test@example.com',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Example Admin User',
            'email' => 'admin@example.com',
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Example Super-Admin User',
            'email' => 'superadmin@example.com',
        ]);
        $user->assignRole($role3);
        
        */
        
        //------------------------------------------------------------------//
        // $permessions = [
        //     'user-list',
        //     'user-create',
        //     'user-edit',
        //     'user-delete',
        //     'category-list',
        //     'category-create',
        //     'category-edit',
        //     'category-delete',
            
        // ];
    
        // foreach($permessions as $permession){
        //     Permission::create(['name'=>$permession]);
        // }
        //   $role = Role::create(['name' => 'super-admin', 'guard_name' => 'admin']);
        //   $role->syncPermissions(Permission::all());
    }
}