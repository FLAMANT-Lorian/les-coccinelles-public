<?php

if (!function_exists('custom_pagination')) {
    function custom_pagination($query, string $search_term = ''): array|string|null
    {
        $total_pages = $query->max_num_pages;

        $prev_arrow = 'Précédent';
        $next_arrow = 'Suivant';

        if ($total_pages <= 1) {
            return null;
        }

        $current_page = get_query_var('paged') ? get_query_var('paged') : 1;

        $add_args['search'] = $search_term;

        return paginate_links([
            'base' => '/nos-actualites' . '?paged=%#%',
            'current' => $current_page,
            'total' => $total_pages,
            'type' => 'list',
            'prev_text' => $prev_arrow,
            'next_text' => $next_arrow,
            'add_args' => $add_args,
        ]);

    }
}