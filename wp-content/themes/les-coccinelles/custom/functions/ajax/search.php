<?php

if (!function_exists('searchInPost')) {
    function searchInPost(): void
    {
        global $content, $card, $cpt_events, $cpt_news;

        $term = sanitize_text_field($_POST['search']);
        $cpt_name = $_POST['cpt_name'];

        $query_args = [
            'post_type' => $cpt_name,
            'paged' => get_query_var('paged'),
            'search_prod_title' => $term
        ];

        add_filter('posts_where', 'filter_by_title', accepted_args: 2);
        $items = new WP_Query($query_args);
        remove_filter('posts_where', 'filter_by_title');

        $content = '';
        $index = 1;

        if ($items->have_posts()) {
            while ($items->have_posts()) {
                $items->the_post();
                ob_start();

                if ($cpt_name === $cpt_news['cpt_name']) {
                    $card = get_template_part('template-parts/news/card', args: ['index' => $index]);
                } else {
                    $card = get_template_part('template-parts/events/card', args: ['index' => $index]);
                }

                $card .= ob_get_clean();

                if ($cpt_name === $cpt_news['cpt_name']) {
                    $content .= '<div class="col-span-full md:col-span-4 h-full">' . $card . '</div>';
                } else {
                    $content .= '<div class="col-span-full xg:col-start-2 xg:col-span-10 h-full">' . $card . '</div>';
                }
                $index++;
            }

            // Actualiser la pagination
            $content .= custom_pagination($items);
        } else {
            ob_start();
            $content .= '<div class="col-span-full md:col-span-4">Aucun résultat pour : <strong class="font-bold text-red">' . $term . '</strong></div>';
            $content .= ob_get_clean();
        }
        wp_reset_postdata();

        wp_send_json_success(['html' => $content]);

    }
}

add_action('wp_ajax_search_in_post', 'searchInPost');
add_action('wp_ajax_nopriv_search_in_post', 'searchInPost');


/**
 * Filter posts by title (Source: https://stackoverflow.com/questions/62350261/how-to-search-only-in-post-title-wp-query)
 */
function filter_by_title($where, $wp_query)
{
    global $wpdb;
    if ($search_term = $wp_query->get('search_prod_title')) {
        $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . esc_sql($wpdb->esc_like($search_term)) . '%\'';
    }
    return $where;
}