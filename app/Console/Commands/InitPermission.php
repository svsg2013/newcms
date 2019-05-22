<?php

namespace App\Console\Commands;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Console\Command;

class InitPermission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:init_permission';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $permissions  = config("permission");

        foreach ($permissions as $permission){
            foreach ($permission["permissions"] as $key => $name){
                Permission::firstOrCreate([
                    "slug" => $key
                ], [
                    "model" => $permission["model"],
                    "slug" => $key,
                    "name" => $name,
                    "description" => $name
                ]);
            }
        }

        $admin = Role::firstOrCreate([
            "slug" => "admin"
        ], [
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => '', // optional
            'level' => 100, // optional, set to 1 by default level cao co permission level thap
        ]);

        $permissions = Permission::get()->pluck("id")->toArray();
        $admin->syncPermissions($permissions);

        Role::firstOrCreate([
            "slug" => "user"
        ],[
            'name' => 'User',
            'slug' => 'user',
            'description' => '', // optional
            'level' => 1, // optional, set to 1 by default
        ]);

        // Remove cache permission
        removeAllConfig();
        echo "Successful! \n";
    }
}
