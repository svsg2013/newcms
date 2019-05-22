<?php

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = config('menu');
        $languages = config('laravellocalization.supportedLocales');

        foreach($menus as $key => $bs){
            if(Menu::where('type', $bs['type'])->get()->count() == 0) {
                $input['type'] = $bs['type'];
                foreach($languages as $key => $language){
                    $input[$key]['title'] = $bs['title'];
                }
                $menu = Menu::create($input);
                $menu->updateSlugTranslation();
            }
        }
    }
}
