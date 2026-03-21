<?php

$cpt_news = [
    'name' => 'Nos actualités',
    'cpt_name' => 'news',
    'menu_icon' => 'dashicons-admin-post',
    'publicly_queryable' => true,
    'menu_position' => 10,
    'has_archive' => true,
    'hierarchical' => true,
    'rewrite' => [
        'slug' => 'nos-actualites'
    ],
    'supports' => [
        'title', 'editor', 'thumbnail', 'excerpt'
    ],
];

if (!function_exists('register_custom_post_types')) {
    function register_custom_post_types($cpt): void
    {
        register_post_type(
            $cpt['cpt_name'], [
                'label' => $cpt['name'],
                'labels' => [
                    'add_new' => 'Ajouter un élément',
                    'add_new_item' => 'Ajouter un nouvel élément',
                    'new_item' => 'Nouvel élément',
                    'edit_item' => 'Modifier un élément',
                    'view_item' => 'Voir l’élément',
                    'all_items' => 'Tous les éléments',
                    'search_items' => 'Rechercher un élément',
                ],
                'menu_icon' => $cpt['menu_icon'],
                'publicly_queryable' => $cpt['publicly_queryable'],
                'has_archive' => $cpt['has_archive'],
                'menu_position' => $cpt['menu_position'],
                'rewrite' => $cpt['rewrite'],
                'hierarchical' => $cpt['hierarchical'],
                'public' => true,
                'show_ui' => true,
                'supports' => $cpt['supports']
            ]
        );
    }
}

if (!function_exists('create_custom_post_type')) {
    function create_custom_post_type(): void
    {
        global $cpt_news;

        register_custom_post_types($cpt_news);
    }
}

add_action('init', 'create_custom_post_type');