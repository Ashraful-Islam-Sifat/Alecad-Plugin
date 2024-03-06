<?php

/**
 * @package AlicadPlugin
 */

 namespace Inc\api\callbacks;

 use Inc\base\baseController;

 class AdminCallbacks extends BaseController{

    public function adminDashboard(){
        return require_once("$this->plugin_path/templates/admin.php");
    }

    public function adminCpt(){
        return require_once("$this->plugin_path/templates/cpt.php");
    }

    public function adminTaxonomy(){
        return require_once("$this->plugin_path/templates/taxonomy.php");
    }

    public function adminWidget(){
        return require_once("$this->plugin_path/templates/widget.php");
    }

    public function adminGallery(){
        return require_once("$this->plugin_path/templates/gallery.php");
    }

    public function adminTestimonial(){
        return require_once("$this->plugin_path/templates/testimonial.php");
    }

    public function adminTemplates(){
        return require_once("$this->plugin_path/templates/templates.php");
    }

    public function adminAuth(){
        return require_once("$this->plugin_path/templates/auth.php");
    }

    public function adminMembership(){
        return require_once("$this->plugin_path/templates/membership.php");
    }
    

    // public function alecadOptionsGroup($input){
    //     return $input;
    // }

    // public function alecadAdminSection(){
    //     echo 'Admin Section';
    // }

    public function alecadTextExample(){
        $value = esc_attr( get_option( 'text_example' ) );
        echo '<input type="text" calss="regular-text" name="text_example" value="'.$value.'" placeholder="Write something" >';
    }

 }