<?php

if (!function_exists('searchInNews')) {
    function searchInNews(): void
    {
        $term = sanitize_text_field($_POST['search']);

        $query_args = [
            'post_type' => 'news',
            'paged' => get_query_var('paged'),
            'meta_query' => [
                [
                    'key' => 'search-title',
                    'value' => $term,
                    'compare' => 'LIKE',
                ]
            ]
        ];

        $news = new WP_Query($query_args);

        global $content, $card;
        $content = '';
        $index = 1;

        if ($news->have_posts()) {
            while ($news->have_posts()) {
                $news->the_post();
                ob_start();

                $card = get_template_part('template-parts/news/card', args: ['index' => $index]);

                $card .= ob_get_clean();

                $content .= '<div class="col-span-full md:col-span-4 h-full">' . $card . '</div>';
                $index++;
            }

            // Actualiser la pagination
            $content .= custom_pagination($news);
        } else {
            ob_start();
            $content .= '<div class="col-span-full md:col-span-4">Aucun résultat</div>';
            $content .= ob_get_clean();
        }
        wp_reset_postdata();

        wp_send_json_success(['html' => $content]);

    }
}

add_action('wp_ajax_search_in_news', 'searchInNews');
add_action('wp_ajax_nopriv_search_in_news', 'searchInNews');