<?php

/**
 * Disable default post type (Source : https://wordpress.stackexchange.com/questions/293148/how-do-i-remove-the-default-post-type-from-the-admin-toolbar)
 */

add_action('admin_menu', 'remove_default_post_type');

function remove_default_post_type(): void
{
    remove_menu_page('edit.php');
}

add_action('admin_bar_menu', 'remove_default_post_type_menu_bar', 999);

function remove_default_post_type_menu_bar($wp_admin_bar): void
{
    $wp_admin_bar->remove_node('new-post');
}

function remove_add_new_post_href_in_admin_bar(): void
{
    ?>
    <script type="text/javascript">
        function remove_add_new_post_href_in_admin_bar() {
            var add_new = document.getElementById('wp-admin-bar-new-content');
            if (!add_new) return;
            var add_new_a = add_new.getElementsByTagName('a')[0];
            if (add_new_a) add_new_a.setAttribute('href', '#!');
        }

        remove_add_new_post_href_in_admin_bar();
    </script>
    <?php
}

add_action('admin_footer', 'remove_add_new_post_href_in_admin_bar');


function remove_frontend_post_href(): void
{
    if (is_user_logged_in()) {
        add_action('wp_footer', 'remove_add_new_post_href_in_admin_bar');
    }
}

add_action('init', 'remove_frontend_post_href');

add_action('wp_dashboard_setup', 'remove_draft_widget', 999);

function remove_draft_widget(): void
{
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
}
