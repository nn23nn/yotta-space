<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name', 'super_admin')->first();
        $permissions = Permission::all();
        $role->attachPermissions($permissions);
        $this->command->info('角色权限关联表数据初始化成功!');
    }
}