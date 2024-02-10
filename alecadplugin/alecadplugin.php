<?php

/**
 * @package AlecadPlugin
 * 
 * Plugin Name: Alecad Plugin
 * Description: This plugin is made for practise purpose
 * Author: Sifat
 * Version: 1.1.0
 */



//If this file is called derectly, abort!!
if(!defined('ABSPATH')){
    die;
}

//Require the composer Autoload..
if(file_exists(dirname(__FILE__).'/vendor/autoload.php')){
   require_once dirname(__FILE__).'/vendor/autoload.php';
}




// The coode that runs during plugin activation
function activate_alecad_pugin(){
    Inc\base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_alecad_pugin' );
// The coode that runs during plugin deactivation
function deactivate_alecad_plugin(){
    Inc\base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_alecad_plugin' );

//Automatically calling the register() function
if( class_exists ('Inc\\Init' )){
    Inc\Init::register_services();
}


class AlecadPlugin{

   //Some codes
}



?>