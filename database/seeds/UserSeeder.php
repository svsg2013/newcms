<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\User::where("email", "admin@easycredit.co")->first();
        if(!$user){
            $arr = [
                'name' => 'Admin',
                'email' => 'admin@easycredit.co',
                "password" => \Hash::make("12345667"),
                "active" => 1,
                "active_code" => uniqid()
            ];
            $user = \App\Models\User::create($arr);
        }
        $admin = \App\Models\Role::where("slug", "admin")->first();
        if($admin){
            $user->syncRoles([$admin->id]);
        }
    }
}
