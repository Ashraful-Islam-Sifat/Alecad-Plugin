<?php
/**
 * @package AledPlugin
 */

 namespace Inc\base;

 use Inc\base\baseController;
 use Inc\api\settingsApi;
 use \Inc\api\callbacks\adminCallbacks;

 class GalleryController extends BaseController{

    public $callbacks;

    public $subpages = array();

    public $settings;

    public function register(){

         if ( ! $this->activated('gallery_manager')) return;

        $this->callbacks = new AdminCallbacks();

        $this->settings = new SettingsApi();

        $this->setSubpages();

        $this->settings->addSubPages($this->subpages)->register();
    }

    public function setSubpages(){
        $this->subpages =  [
            [
                'parent_slug' => 'alecad_plugin', 
				'page_title' => 'Gallery Manager', 
				'menu_title' => 'Gallery Manager', 
				'capability' => 'manage_options', 
				'menu_slug' => 'alecad_gallery', 
				'callback' => array( $this->callbacks, 'adminGallery' )
            ]
        ];
    }
    
 }