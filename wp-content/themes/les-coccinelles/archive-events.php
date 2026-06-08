<?php get_header(); ?>

<?php
global $cpt_events;
get_template_part('template-parts/archive/basic', args: [
    'id' => get_page_by_path('nos-evenements')->ID,
    'cpt_name' => $cpt_events['cpt_name'],
    'form_id' => 'search-events-form',
    'input_class' => 'events-search-input',
    'wrapper_class' => 'events-wrapper',
    'filter' => true
]); ?>

<?php get_footer(); ?>
