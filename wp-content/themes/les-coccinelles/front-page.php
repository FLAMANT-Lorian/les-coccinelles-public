<?php get_header(); ?>

<?php get_template_part('template-parts/banner/hero') ?>
<?php get_template_part('template-parts/about/about') ?>
<?php get_template_part('template-parts/services/services') ?>
<?php get_template_part('template-parts/news/slider', args: ['title' => get_field('news')['title']]); ?>
<?php get_template_part('template-parts/cta/cta') ?>

<?php get_footer(); ?>