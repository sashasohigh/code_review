<?php

namespace App\Services;

class Image
{

    public static function init()
    {
        global $_wp_additional_image_sizes;
        $_wp_additional_image_sizes = [];

        add_image_size('m-', 1100, 0);
        add_image_size('m+', 2200, 0);
        //270
        //370
        //570
        //870
        //970f
        //1170
        //1920

        //400 //thumbnail
        //750 //m--
        //1100 //m-
        //1600 //medium
        //2200 // m+
        //4000 //large


        if(!empty(get_option('thumbnail_crop'))) {
            update_option('thumbnail_crop', false);
        }

        add_filter('wp_get_attachment_image_attributes', [__CLASS__, 'filter_attachment_image'], 999, 3);
    }

    public static function filter_attachment_image($attr, $attachment, $size)
    {
        $attr['src']    = wp_get_attachment_image_url($attachment->ID, 'large');
        $attr['srcset'] = wp_get_attachment_image_srcset($attachment->ID);
        unset($attr['sizes']);

        $size == 'thumbnail' && $attr['sizes'] = self::sizes_thumbnail();
        $size == 'medium' && $attr['sizes'] = self::sizes_medium();
        $size == 'large' && $attr['sizes'] = self::sizes_large();

        if(strpos(wp_get_attachment_metadata($attachment->ID)['file'], '.svg')) {
            unset($attr['srcset']);
            unset($attr['sizes']);
        }

        return $attr;
    }

    public static function sizes_thumbnail()
    {
        return ' (max-width: 800px) 400px, 400px';
    }

    public static function sizes_medium()
    {
        return ' (max-width: 1000px) 350px, 700px';
    }

    public static function sizes_large()
    {
        return ' (max-width: 1000px) 350px, 1100px';
    }
}
