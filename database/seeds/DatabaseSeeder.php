<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(ElinkTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(LocationDataSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(BlockPageSeeder::class);
        $this->call(BussinessSeeder::class);
        $this->call(JoinUsPageBlockSeeder::class);
        $this->call(NewsCategorySeeder::class);
        $this->call(LoanSeeder::class);
        $this->call(MenuSeeder::class);

        $this->call(RawMomoDataFromApiSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
