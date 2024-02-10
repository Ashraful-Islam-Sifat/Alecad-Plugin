<?php

namespace Inc\base;

use Inc\base\baseController;

class Enqueue extends BaseController{

    public function register(){
        add_action( 'admin_enqueue_scripts', array($this, 'enqueue') );
    }

    function enqueue(){
        wp_enqueue_style( 'mypluginstyle', $this->plugin_url.  'assets/styles/tabs.css');
        wp_enqueue_script( 'mypluginscript', $this->plugin_url. 'assets/javascripts/tabs.js' );
        
    }
}