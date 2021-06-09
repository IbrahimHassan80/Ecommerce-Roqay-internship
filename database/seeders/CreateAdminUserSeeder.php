<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\Admin;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $admin = Admin::create([
            'name' => 'ibrahim_hassan', 
            'email' => 'ibrahim@yahoo.com',
            'password' => bcrypt('123123'),
            'roles_name' => 'owner',
            'status'    => 'مفعل',
            ]);
      
            $role = Role::create(['name' => 'admin']);
       
            // $permissions = Permission::pluck('id','id')->all();
      
            // $role->syncPermissions($permissions);
       
            // $user->assignRole([$role->id]);
    
    }
}
