<?php

use Illuminate\Database\Seeder;

class ElinkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $elink = \App\Models\ElCompany::where("email", "elink@longhau.co")->first();
        if(!$elink)
        {
            $arr = [
                'username' => 'elink@longhau.co',
                'email' => 'elink@longhau.co',
                "password" => \Hash::make("longhau.co")
            ];
            
            $elink = \App\Models\ElCompany::create($arr);
        }
    }
}