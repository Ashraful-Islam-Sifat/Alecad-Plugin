<?php
/**
 * @package AledPlugin
 */

 namespace Inc\base;

 use Inc\base\baseController;
 use Inc\api\settingsApi;
 use \Inc\api\callbacks\adminCallbacks;

 class MembershipController extends BaseController{



    public $callbacks;

    public $subpages = array();

    public $settings;

    public function register(){

         if ( ! $this->activated('membership_manager')) return;

        $this->callbacks = new AdminCallbacks();

        $this->settings = new SettingsApi();

        $this->setSubpages();

        $this->settings->addSubPages($this->subpages)->register();
    }

    public function setSubpages(){
        $this->subpages =  [
            [
              'parent_slug' => 'alecad_plugin',
              'page_title' => 'Membership Manager',
              'menu_title' => 'Membership Manager',
              'capability' => 'manage_options',
              'menu_slug' => 'alecad_membership',
              'callback' => array($this->callbacks, 'adminMembership')
          
            ]
        ];
    }
    
 }