<?php
/**
 * @package AlecadPlugin
 */

 namespace Inc\base;

 class BaseController{

    public $plugin_path;
    public $plugin;
    public $plugin_url;
    public $managers;

    public function __construct(){
        $this->plugin_path = plugin_dir_path( dirname(__FILE__,2) );
        $this->plugin = plugin_basename( dirname(__FILE__, 3) . '/alecadplugin.php') ;
        $this->plugin_url = plugin_dir_url( dirname(__FILE__,2) ) ;

        $this->managers = [
            'cpt_manager' => 'Activate CPT Manager',
            'taxonomy_manager'=> 'Activate Taxonomy Manager',
            'media_widget' => 'Activate Media Widget',
            'gallery_manager' => 'Activate Galary Manager',
            'testimonial_manager' => 'Activate Testimonial Manager',
            'templates_manager' => 'Activate Templates Manager',
            'login_manager' => 'Activate Login Manager',
            'membership_manager' => 'Activate Membership Manager'
        ];
    }

    public function activated(string $key){
        $option = get_option( 'alecad_plugin' );

        return isset($option[$key]) ? $option[$key] :false;
    }
 }