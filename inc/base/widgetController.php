<?php
/**
 * @package AledPlugin
 */

 namespace Inc\base;

 use Inc\base\baseController;
 use Inc\api\settingsApi;
 use \Inc\api\callbacks\adminCallbacks;

 class WidgetController extends BaseController{



    public $callbacks;

    public $subpages = array();

    public $settings;

    public function register(){

         if ( ! $this->activated('media_widget')) return;

        $this->callbacks = new AdminCallbacks();

        $this->settings = new SettingsApi();

        $this->setSubpages();

        $this->settings->addSubPages($this->subpages)->register();
    }

    public function setSubpages(){
        $this->subpages =  [
            [
                'parent_slug' => 'alecad_plugin',
                'page_title' => 'Custom widgets',
                'menu_title' => 'widgets',
                'capability' => 'manage_options',
                'menu_slug' => 'alecad_widgets',
                'callback' => array($this->callbacks, 'adminWidget')
          
            ]
        ];
    }
    
 }