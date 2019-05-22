<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\NewsCategory;

class NewsCategorySeeder extends Seeder
{
    public function run()
    {

        $arrayNewsCategory = [
            [
                'code' => 1,
                'position' => 0,
                'parent_id' => null,
                // 'en' => [
                //     'name' => 'Promotion'
                // ],
                'vi' => [
                    'name' => 'Khuyến mãi'
                ]
            ],
            [
                'code' => 2,
                'position' => 0,
                'parent_id' => null,
                // 'en' => [
                //     'name' => 'Personal information'
                // ],
                'vi' => [
                    'name' => 'Thông tin nhân sự'
                ]
            ],
            [
                'code' => 2,
                'position' => 0,
                'parent_id' => null,
                // 'en' => [
                //     'name' => 'Recruitment Consultant'
                // ],
                'vi' => [
                    'name' => 'Tư vấn tuyển dụng'
                ]
            ],
            [
                'code' => 3,
                'position' => 0,
                'parent_id' => null,
                // 'en' => [
                //     'name' => 'News'
                // ],
                'vi' => [
                    'name' => 'Tin tức'
                ]
            ],
        ];

        foreach($arrayNewsCategory as $key => $value) {
            if(!NewsCategory::where('code', $value['code'])->first()) {
                $value['vi']['slug'] = str_slug($value['vi']['name']);
                NewsCategory::create($value);
            }
        }
        
        $this->command->info('News category table and news category translation table seeded!');
    }
}
