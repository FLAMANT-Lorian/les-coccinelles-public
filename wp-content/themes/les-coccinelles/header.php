<!doctype html>
<html <?php language_attributes() ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(['body']) ?>>
    <?php
    
    wp_body_open();
    include 'inc/svg.php';
    get_template_part('template-parts/header/header');
    if (defined('IS_VITE_DEVELOPMENT') && IS_VITE_DEVELOPMENT === true) :
        get_template_part('template-parts/tools/breakpoints');
    endif;
    
    ?>
    
    <main id="content">
