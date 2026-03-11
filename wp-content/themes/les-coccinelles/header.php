<!doctype html>
<html <?php language_attributes() ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Lorian">
    <meta name="keywords" content="site, les-coccinelles, asbl, les-coccinelles-asbl">
    <meta name="description" content="Site vitrine pour l’asbl Les Coccinelles situé à Morhet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(['body', 'bg-beige-light']) ?>>
    <?php
    
    wp_body_open();
    include 'inc/svg.php';
    
    get_template_part('template-parts/header/header');
    
    if (defined('IS_VITE_DEVELOPMENT') && IS_VITE_DEVELOPMENT === true) :
        get_template_part('template-parts/tools/breakpoints');
    endif;
    
    ?>
    
    <main id="content">
