<?php get_header(args: ['title' => 'Asbl les Coccinelles']); ?>

<?php get_template_part('template-parts/banner/hero') ?>
<?php get_template_part('template-parts/about/about') ?>
<?php get_template_part('template-parts/services/services') ?>
<?php get_template_part('template-parts/news/slider', args: ['title' => get_field('news')['title']]); ?>
<?php get_template_part('template-parts/banner/cta') ?>

<?php get_footer(); ?>