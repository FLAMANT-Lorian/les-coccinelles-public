<?php

if (!function_exists('searchInPost')) {
    function searchInPost(): void
    {
        $term = sanitize_text_field($_POST['search']);
        $order = sanitize_text_field($_POST['order']);
        $cpt_name = sanitize_text_field($_POST['cpt_name']);

        $content = get_filtered_items($term, $order, $cpt_name);

        wp_send_json_success(['html' => $content]);

    }
}

add_action('wp_ajax_search_in_post', 'searchInPost');
add_action('wp_ajax_nopriv_search_in_post', 'searchInPost');

if (!function_exists('get_filtered_items')) {
    function get_filtered_items($term = '', $order = '', $cpt_name = ''): string
    {
        global $content, $card, $cpt_events, $cpt_news;

        $query_args = [
            'post_type' => $cpt_name,
            'paged' => get_query_var('paged'),
        ];

        if (!empty($term)) {
            $query_args['search_prod_title'] = $term;
            add_filter('posts_where', 'filter_by_title', 10, 2);
        }

        if (!empty($order) && ($cpt_name === $cpt_events['cpt_name'])) {
            $query_args['meta_key'] = 'date';
            $query_args['orderby'] = 'meta_value_num';
            $query_args['order'] = $order;
        }

        $items = new WP_Query($query_args);

        if (!empty($term)) {
            remove_filter('posts_where', 'filter_by_title');
        }

        $content = '';
        $index = 1;

        if ($items->have_posts()) {
            while ($items->have_posts()) {
                $items->the_post();
                ob_start();

                if ($cpt_name === $cpt_news['cpt_name']) {
                    $card = get_template_part('template-parts/news/card', args: ['index' => $index]);
                } else if ($cpt_name === $cpt_events['cpt_name']) {
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

            $content .= custom_pagination($items, $term);
        } else {
            ob_start();
            $content .= get_template_part('template-parts/archive/no-post-found', args: ['term' => $term]);
            $content .= ob_get_clean();
        }
        wp_reset_postdata();

        return $content;
    }
}

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