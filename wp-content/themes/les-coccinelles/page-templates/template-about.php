<?php /* Template Name: About */ ?>

<?php get_header(args: ['title' => 'À propos de l’asbl les Coccinelles']); ?>

<?php get_template_part('template-parts/history/basic'); ?>
<?php get_template_part('template-parts/news/slider', args: ['title' => get_field('news')['title']]); ?>
<?php get_template_part('template-parts/banner/cta'); ?>

<?php get_footer(); ?>

