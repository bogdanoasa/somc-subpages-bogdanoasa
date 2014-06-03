<?php
/**
 * Plugin Name: SOMC Subpages
 * Description: Plugin will get subpages of current page (via shortcode or widget)
 * Version: 1.0
 * Author: Oasa Bogdan-Valentin
 * Author URI: https://github.com/bogdanoasa/somc-subpages-bogdanoasa
 */

// If this file is called directly, then abort execution.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if(!class_exists('SOMC_Subpages'))
{
    class SOMC_Subpages
    {
    	private $version;

        public function __construct()
        {
        	$this->version = $version;

        	// Initialize Walker
			require_once(sprintf("%s/somc-subpages-walker.php", dirname(__FILE__)));

            // Initialize Shortcode
			require_once(sprintf("%s/somc-subpages-shortcode.php", dirname(__FILE__)));

			// Initialize Widget
			require_once(sprintf("%s/somc-subpages-widget.php", dirname(__FILE__)));

			wp_enqueue_style('SOMC-subpages',plugin_dir_url( __FILE__ )."somc-subpages.css",array(),$this->version,FALSE);
            wp_enqueue_script('SOMC-subpages-sort',plugin_dir_url( __FILE__ )."somc-subpages-sort.js",array( 'jquery' ));

        } // END __construct

        public static function activate()
        {
            
        } // END activate

    
        public static function deactivate()
        {
            
        } 
    } // END deactivate
} // END SOMC_subpages


if(class_exists('SOMC_Subpages'))
{

    register_activation_hook(__FILE__, array('SOMC_Subpages', 'activate'));
    register_deactivation_hook(__FILE__, array('SOMC_Subpages', 'deactivate'));

    $SOMC_Subpages = new SOMC_Subpages();
}