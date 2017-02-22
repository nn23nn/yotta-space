<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->delete();
        Permission::create(['name' => 'ADD_ADMIN', 'display_name' => '添加管理员', 'description' => '']);
        Permission::create(['name' => 'DEL_ADMIN', 'display_name' => '删除管理员', 'description' => '']);
        Permission::create(['name' => 'LIST_ADMIN', 'display_name' => '管理员列表', 'description' => '']);
        Permission::create(['name' => 'UP_ADMIN', 'display_name' => '编辑管理员', 'description' => '']);
        Permission::create(['name' => 'LIST_PERMISSION', 'display_name' => '权限列表', 'description' => '']);
        Permission::create(['name' => 'ADD_PERMISSION', 'display_name' => '添加权限', 'description' => '']);
        Permission::create(['name' => 'DEL_PERMISSION', 'display_name' => '删除权限', 'description' => '']);
        Permission::create(['name' => 'UP_PERMISSION', 'display_name' => '编辑权限', 'description' => '']);
        Permission::create(['name' => 'LIST_ROLE', 'display_name' => '角色列表', 'description' => '']);
        Permission::create(['name' => 'ADD_ROLE', 'display_name' => '添加角色', 'description' => '']);
        Permission::create(['name' => 'UP_ROLE', 'display_name' => '编辑角色', 'description' => '']);
        Permission::create(['name' => 'DEL_ROLE', 'display_name' => '删除角色', 'description' => '']);
        Permission::create(['name' => 'LIST_CATEGORY', 'display_name' => '分类列表', 'description' => '']);
        Permission::create(['name' => 'ADD_CATEGORY', 'display_name' => '添加分类', 'description' => '']);
        Permission::create(['name' => 'UP_CATEGORY', 'display_name' => '编辑分类', 'description' => '']);
        Permission::create(['name' => 'DEL_CATEGORY', 'display_name' => '删除分类', 'description' => '']);
        $this->command->info('权限表数据初始化成功!');
    }
}