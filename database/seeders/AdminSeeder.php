<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin=[
            [
                'name'=>'ahmad',
                'email'=>'admin@gmail.com',
                'password'=>bcrypt('12345'),
            ],
            [
                'name'=>'ali',
                'email'=>'subadmin@gmail.com',
                'password'=>bcrypt('12345'),
            ]
            ];
            foreach($admins as $admin){
                $adminUser=User::create($admin);
                $adminUser->roles()->attach(1);
            }
    }
}
