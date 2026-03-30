<?php
const IS_VITE_DEVELOPMENT = false;

function les_coccinelles_theme_setup(): void
{
    add_theme_support('title-tag');
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
    register_nav_menus([
        'primary' => 'Menu principal',
        'footer' => 'Menu secondaire',
        'rgpd' => 'Menu rgpd',
    ]);
}

require_once 'inc/inc.vite.php';
require_once 'inc/cpts.php';
require_once 'custom/custom.php';

add_action('after_setup_theme', 'les_coccinelles_theme_setup');
