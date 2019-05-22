<?php

namespace App\Console\Commands;

use App\Models\LandingTemplate;
use Illuminate\Console\Command;

class InitLandingTemplate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:init_landing_template';

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
        $templates = config('landing_templates');
        foreach($templates as $key => $value) {
            $current = LandingTemplate::firstOrCreate([
                'code' => $key
            ], $value);

            $file = resource_path("views/admin/landing_templates/{$current->code}.blade.php");
            if (!is_file($file)) {
                file_put_contents($file, '');
            }
        }
        echo "Successful! \n";
    }
}
