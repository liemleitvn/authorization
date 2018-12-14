<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role = DB::table('roles')->where('role','=','superAdmin')->first();
        DB::table('users')->insert([
            'name'=>'Super Admin',
            'email'=>'superadmin@authorization.local',
            'password'=>Hash::make(123456),
            'role_id'=>$role->id,
        ]);
    }
}
