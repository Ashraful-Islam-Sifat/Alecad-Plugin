<?php
/**
 * @package AledPlugin
 */

 namespace Inc\base;

 use Inc\base\baseController;
 use Inc\api\settingsApi;
 use \Inc\api\callbacks\adminCallbacks;

 class TemplatesController extends BaseController{



    public $callbacks;

    public $subpages = array();

    public $settings;

    public function register(){

         if ( ! $this->activated('templates_manager')) return;

        $this->callbacks = new AdminCallbacks();

        $this->settings = new SettingsApi();

        $this->setSubpages();

        $this->settings->addSubPages($this->subpages)->register();
    }

    public function setSubpages(){
        $this->subpages =  [
            [
              'parent_slug' => 'alecad_plugin',
              'page_title' => 'Templates Manager',
              'menu_title' => 'Templates Manager',
              'capability' => 'manage_options',
              'menu_slug' => 'alecad_templates',
              'callback' => array($this->callbacks, 'adminTemplates')
          
            ]
        ];
    }
    
 }