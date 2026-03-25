<?php /* Template Name: About */ ?>

<?php get_header(); ?>

<?php get_template_part('template-parts/history/basic'); ?>
<?php get_template_part('template-parts/news/slider', args: ['title' => get_field('news')['title']]); ?>
<?php get_template_part('template-parts/banner/cta'); ?>

<?php get_footer(); ?>

