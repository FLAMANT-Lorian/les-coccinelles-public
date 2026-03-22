<?php get_header(args: ['title' => 'Découvrez les dernières actualités de l’asbl les Coccinelles']); ?>

<?php
global $cpt_news;
get_template_part('template-parts/archive/basic', args: [
    'id' => get_page_by_path('nos-actualites')->ID,
    'cpt_name' => $cpt_news['cpt_name'],
    'form_id' => 'search-news-form',
    'input_class' => 'news-search-input',
    'wrapper_class' => 'news-wrapper',
]); ?>

<?php get_footer(); ?>
