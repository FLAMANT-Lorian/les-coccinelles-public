<?php get_header(); ?>

<?php $id = get_page_by_path('nos-actualites')->ID; ?>

<?php get_template_part('template-parts/news/single'); ?>

<?php get_template_part('template-parts/news/slider', args: [
    'title' => get_field('slider-title', $id),
    'button' => false
]); ?>

<?php $id = get_page_by_path('nos-actualites')->ID; ?>
<?php get_template_part('template-parts/banner/cta', args: [
    'page_id' => $id
]); ?>

<?php get_footer(); ?>
