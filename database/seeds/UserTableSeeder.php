<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        User::create(['name' => 'liukai', 'email' => 'hi_kay@qq.com', 'password' => '$2y$10$V//30GP4LyRePtb99XGa/e//.ECDWOVCfwjhnnrO93wruECzQK.Pa']);
        $this->command->info('用户表数据初始化成功!');
    }
}