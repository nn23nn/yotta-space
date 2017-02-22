<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        Role::create(['name' => 'super_admin', 'display_name' => '超级管理员', 'description' => '']);
        $this->command->info('角色表数据初始化成功!');
    }
}