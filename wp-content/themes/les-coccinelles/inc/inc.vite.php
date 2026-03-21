<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
    exit;  
    
/*
 * VITE & Tailwind JIT development
 * Inspired by https://github.com/andrefelipe/vite-php-setup
 *
 */

// dist subfolder - defined in vite.config.json
define('DIST_DEF', 'dist');

// defining some base urls and paths
define('DIST_URI', get_template_directory_uri() . '/' . DIST_DEF);
define('DIST_PATH', get_template_directory() . '/' . DIST_DEF);

// js enqueue settings
define('JS_DEPENDENCY', array()); // array('jquery') as example
define('JS_LOAD_IN_FOOTER', true); // load scripts in footer?

// deafult server address, port and entry point can be customized in vite.config.json
define('VITE_SERVER', 'http://localhost:3000');

define('VITE_ENTRY_POINT', '/main.js');
function add_module_attr_to_script($tag, $handle, $src) {
    if ('main' === $handle) {
        $tag = '<script type="module" src="' . esc_url($src) . '"></script>';
    }
    return $tag;
}

add_filter('script_loader_tag', 'add_module_attr_to_script', 10, 3);

// enqueue hook
add_action( 'wp_enqueue_scripts', function() {
    
    if (defined('IS_VITE_DEVELOPMENT') && IS_VITE_DEVELOPMENT === true) {

        // insert hmr into head for live reload
        function vite_head_module_hook() {
            echo '<script type="module" crossorigin src="' . VITE_SERVER . VITE_ENTRY_POINT . '"></script>';
        }
        add_action('wp_head', 'vite_head_module_hook');        

    } else {

        // production version, 'npm run build' must be executed in order to generate assets
        // ----------

        // read manifest.json to figure out what to enqueue
        $manifest = json_decode( file_get_contents( DIST_PATH . '/.vite/manifest.json'), true );
        
        // is ok
        if (is_array($manifest)) {
            
            // get first key, by default is 'main.js' but it can change
            $manifest_key = array_keys($manifest);
            if (isset($manifest_key[count($manifest_key) - 1])) {
                
                // enqueue CSS files
                foreach(@$manifest[$manifest_key[count($manifest_key) - 1]]['css'] as $css_file) {
                    wp_enqueue_style( 'main', DIST_URI . '/' . $css_file );
                }
                $mainJsIndex = array_search('main.js', $manifest_key);

                $main_js_file = @$manifest[$manifest_key[$mainJsIndex]]['file'];

                wp_enqueue_script( 'main', DIST_URI . '/' . $main_js_file, JS_DEPENDENCY, '', JS_LOAD_IN_FOOTER );
            }
        }
    }
});