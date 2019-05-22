<?php namespace App\Helper;

class Breadcrumb
{
    public static $breadcrumb = [];

    public static $page_title = null;

    public static $page_description = null;

    public static function add($name, $link = null, $home = true)
    {
        if ($home && !count(self::$breadcrumb)) {
            $locale = \App::getLocale();
            self::add('Trang chủ', "/{$locale}", false);
        }
        self::$breadcrumb[] = [
            'name' => $name,
            'link' => $link
        ];
    }

    public static function title($name, $description = null)
    {
        self::$page_title = $name;
        self::$page_description = $description;
    }

    public static function out()
    {
        $string = '';
        if (self::$page_title) {
            $string = '<div class="block-header"><h2>' . self::$page_title . '</h2></div>';
        }
        if (self::$breadcrumb) {
            $string .= '<ol class="breadcrumb">';
            foreach (self::$breadcrumb as $name => $link) {
                if ($link !== null) {
                    $string .= '<li><a href="' . $link . '">' . $name . '</a></li>';
                } else {
                    $string .= '<li class="active">' . $name . '</li>';
                }
            }
            $string .= '</ol>';
        }
        return $string;
    }

    public static function output($view = 'frontend.layouts.partials.breadcrumb-2'){
        $breadcrumbs = self::$breadcrumb;
        return view($view, compact('breadcrumbs'))->render();
    }
}
