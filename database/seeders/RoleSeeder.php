<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles =['admin','subadmin'];
        foreach($roles as $role){
            Role::create([
                'name'=> $role,
            ]);
        }
    }
}
