<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('name', 'liukai')->first();
        $role = Role::where('name', 'super_admin')->first();
        $user->attachRole($role);
        $this->command->info('用户角色关联表数据初始化成功!');
    }
}