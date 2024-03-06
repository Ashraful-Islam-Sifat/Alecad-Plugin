<?php

/**
 * @package AlecadPlugin
 */

 namespace Inc\base;

 class Activate{
    public static function activate(){
        flush_rewrite_rules();

        $default = array();

        if ( ! get_option( 'alecad_plugin' ) ) {
			update_option( 'alecad_plugin', $default );
		}

		if ( ! get_option( 'alecad_plugin_cpt' ) ) {
			update_option( 'alecad_plugin_cpt', $default );
		}
    }
 }