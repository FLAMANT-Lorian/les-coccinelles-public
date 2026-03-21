<?php

if (!function_exists('custom_pagination')) {
    function custom_pagination($query): array|string|null
    {
        $total_pages = $query->max_num_pages;

        $prev_arrow = 'Précédent';
        $next_arrow = 'Suivant';

        if ($total_pages <= 1) {
            return null;
        }

        $current_page = get_query_var('paged') ? get_query_var('paged') : 1;

        return paginate_links([
            'base' => '/nos-actualites' . '?paged=%#%',
            'current' => $current_page,
            'total' => $total_pages,
            'type' => 'list',
            'prev_text' => $prev_arrow,
            'next_text' => $next_arrow,
        ]);

    }
}