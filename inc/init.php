<?php
/**
 * @package Alecadplugin
 * 
 * Store all hte clases inside an array
 * @return array full list of calsses
 */

 namespace Inc;

 final class Init{
    public static function get_services(){
        return [
            pages\dashboard::class,
            base\enqueue::class,
            base\settingsLinks::class,
            base\cptController::class,
            base\taxonomyController::class,
            base\widgetController::class,
            base\galleryController::class,
            base\testimonialController::class,
            base\templatesController::class,
            base\authController::class,
            base\membershipController::class
        ];
    }

    /**
     * Loop through the classes, initialize them,
     * and call the register() method if it exists
     */
    public static function register_services(){
        foreach (self::get_services() as $class){
            $service = self::instantiate($class);
            if(method_exists($service, 'register') ) {
                $service->register();
            }
        }
    }

    /**
     * Initialize the class 
     * @param  calss @class    class from services array 
     * @return class instance  new instance of the class
     */
    private static function instantiate($class){
        $service = new $class();
        return $service;
    }
 }