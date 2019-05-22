<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class JoinUsPageBlockSeeder extends Seeder
{
    public function run()
    {
        if(Schema::hasTable('page_block') && Schema::hasTable('page_block_translation'))
        {
            $page_join_us_ids = \App\Models\Page::whereIn('code',[
                'JOIN-US-CAREER-OPPORTUNITIES',
                'JOIN-US-FAQ',
                'JOIN-US',
                'JOIN-US-NEWS-TIPS',
                'JOIN-US-WORKSPACE-CULTURE',
                'JOIN-US-WORKSPACE-MEET-PEOPLE',
                'JOIN-US-WORKSPACE-WHY-EASY-CREDIT'
            ])->pluck('id')->toArray();
            $page_block_join_us = \App\Models\PageBlock::whereIn('page_id',$page_join_us_ids)->count();
            if ($page_block_join_us < 1)
            {
                \Eloquent::unguard();
                $path = 'database/seeds/page_block.sql';
                \DB::unprepared(file_get_contents($path));
                $this->command->info('Page_block table and page_block_translation table seeded!');
            }
        }
    }
}
