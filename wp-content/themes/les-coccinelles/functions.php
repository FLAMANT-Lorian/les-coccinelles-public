<?php
const IS_VITE_DEVELOPMENT = true;

function les_coccinelles_theme_setup(): void
{
    add_theme_support('title-tag');
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
    register_nav_menus([
        'primary' => __('Menu principal', 'les_coccinelles'),
        'footer' => __('Menu footer', 'les_coccinelles'),
        'rgpd' => __('Menu rgpd', 'les_coccinelles'),
    ]);
}

include "inc/inc.vite.php";
include 'inc/cpts.php';

add_action('after_setup_theme', 'les_coccinelles_theme_setup');
