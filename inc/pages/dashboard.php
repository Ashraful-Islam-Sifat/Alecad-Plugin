<?php 
/**
 * @package AlicadPlugin
 */

 namespace Inc\pages;

 use \Inc\Api\settingsApi;
 use \Inc\base\baseController;
 use \Inc\api\callbacks\adminCallbacks;
 use \Inc\api\callbacks\managerCallbacks;

 class Dashboard extends BaseController{

    public $settings;

    public $callbacks;

    public $pages;

    // public $subpages;

    public $callbacks_mngr;

    public function register(){

        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->callbacks_mngr = new ManagerCallbacks();

        $this->setPages();

        // $this->setSubpages();

        $this->setSettings();
        $this->setSections();
        $this->setFields();


        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->register();
    }

    public function setPages(){
        $this->pages = [
            [
                'page_title'=> 'Alecad Plugin',
                'menu_title'=> 'Alecad',
                'capability'=> 'manage_options',
                'menu_slug'=> 'alecad_plugin',
                'callback'=> array($this->callbacks, 'adminDashboard'),
                'icon_url'=> 'dashicons-store',
                'position'=> 110
            ]
        ];
    }

    public function setSubpages(){
        // $this->subpages =  [
        //     [
        //         'parent_slug' => 'alecad_plugin',
        //         'page_title' => 'Custom post type',
        //         'menu_title' => 'CPT',
        //         'capability' => 'manage_options',
        //         'menu_slug' => 'alecad_cpt',
        //         'callback' => array($this->callbacks, 'adminCpt')
        //     ],
        //     [
        //         'parent_slug' => 'alecad_plugin',
        //         'page_title' => 'Custom Taxonomies',
        //         'menu_title' => 'Taxonomies',
        //         'capability' => 'manage_options',
        //         'menu_slug' => 'alecad_taxonomies',
        //         'callback' => array($this->callbacks, 'adminTaxonomy')
        //     ],
        //     [
        //         'parent_slug' => 'alecad_plugin',
        //         'page_title' => 'Custom widgets',
        //         'menu_title' => 'widgets',
        //         'capability' => 'manage_options',
        //         'menu_slug' => 'alecad_widgets',
        //         'callback' => array($this->callbacks, 'adminWidget')
        //     ]
        // ];
    }

    public function setSettings(){

        
        $args =[ 
                    [
                        'option_group' => 'alecad_plugin_settings',
                        'option_name' => 'alecad_plugin',
                        'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
                    ]
               ];

            $this->settings->setSettings($args);
    }

    public function setSections(){
        $args = [
            [
                'id' => 'alecad_admin_index',
                'title' => 'Settings Manager',
                'callback' => array($this->callbacks_mngr, 'adminSectionManager'),
                'page' => 'alecad_plugin'
            ]
            ];

            $this->settings->setSections($args);
    }

    public function setFields(){

        foreach($this->managers as $key => $value){
            $args[] = [
                'id' => $key,
                'title' => $value,
                'callback' => array($this->callbacks_mngr, 'checkBoxField'),
                'page' => 'alecad_plugin',
                'section' => 'alecad_admin_index',
                'args' => [
                    'option_name' => 'alecad_plugin',
                    'label_for' => $key,
                    'class' => 'ui-toogle'
                ]
                ];
        }

        // $args = [
        //     [
                
        //         ],
        //         [
        //             'id' => 'taxonomy_manager',
        //             'title' => 'Activate Taxonomy Manager',
        //             'callback' => array($this->callbacks_mngr, 'checkBoxField'),
        //             'page' => 'alecad_plugin',
        //             'section' => 'alecad_admin_index',
        //             'args' => [
        //                 'label_for' => 'taxonomy_manager',
        //                 'class' => 'ui-toogle'
        //             ],
                    
        //         ],
        //         [
        //             'id' => 'media_widget',
        //             'title' => 'Activate Media Widget',
        //             'callback' => array($this->callbacks_mngr, 'checkBoxField'),
        //             'page' => 'alecad_plugin',
        //             'section' => 'alecad_admin_index',
        //             'args' => [
        //                 'label_for' => 'media_widget',
        //                 'class' => 'ui-toogle'
        //             ],
                    
        //         ],
        //         [
        //             'id' => 'gallery_manager',
        //             'title' => 'Activate Galary Manager',
        //             'callback' => array($this->callbacks_mngr, 'checkBoxField'),
        //             'page' => 'alecad_plugin',
        //             'section' => 'alecad_admin_index',
        //             'args' => [
        //                 'label_for' => 'gallery_manager',
        //                 'class' => 'ui-toogle'
        //             ],
                    
        //         ],
        //         [
        //             'id' => 'testimonial_manager',
        //             'title' => 'Activate Testimonial Manager',
        //             'callback' => array($this->callbacks_mngr, 'checkBoxField'),
        //             'page' => 'alecad_plugin',
        //             'section' => 'alecad_admin_index',
        //             'args' => [
        //                 'label_for' => 'testimonial_manager',
        //                 'class' => 'ui-toogle'
        //             ],
                    
        //         ],
        //         [
        //             'id' => 'templates_manager',
        //             'title' => 'Activate Templates Manager',
        //             'callback' => array($this->callbacks_mngr, 'checkBoxField'),
        //             'page' => 'alecad_plugin',
        //             'section' => 'alecad_admin_index',
        //             'args' => [
        //                 'label_for' => 'templates_manager',
        //                 'class' => 'ui-toogle'
        //             ],
                    
        //         ],
        //         [
        //             'id' => 'login_manager',
        //             'title' => 'Activate Login Manager',
        //             'callback' => array($this->callbacks_mngr, 'checkBoxField'),
        //             'page' => 'alecad_plugin',
        //             'section' => 'alecad_admin_index',
        //             'args' => [
        //                 'label_for' => 'login_manager',
        //                 'class' => 'ui-toogle'
        //             ],
                    
        //         ],
        //         [
        //             'id' => 'membership_manager',
        //             'title' => 'Activate Membership Manager',
        //             'callback' => array($this->callbacks_mngr, 'checkBoxField'),
        //             'page' => 'alecad_plugin',
        //             'section' => 'alecad_admin_index',
        //             'args' => [
        //                 'label_for' => 'membership_manager',
        //                 'class' => 'ui-toogle'
        //             ],
                    
        //         ],
        //         [
        //             'id' => 'chat_manager',
        //             'title' => 'Activate Chat Manager',
        //             'callback' => array($this->callbacks_mngr, 'checkBoxField'),
        //             'page' => 'alecad_plugin',
        //             'section' => 'alecad_admin_index',
        //             'args' => [
        //                 'label_for' => 'chat_manager',
        //                 'class' => 'ui-toogle'
        //             ],
                    
        //         ]
        //     ];

            $this->settings->setFields($args);
    }
    
 }