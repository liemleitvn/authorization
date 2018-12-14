<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['superAdmin','admin','editor','user','guest'];

        foreach ($roles as $role) {
            DB::table('roles')->insert(['role'=>$role]);
        }
    }
}
