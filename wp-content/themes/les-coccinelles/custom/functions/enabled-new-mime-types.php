<?php

/**
 * Add SVG support (Source : https://help.vernalweb.com/kb/enable-svg-file-support-in-wordpress/)
 */
function enabled_new_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'enabled_new_mime_types');
