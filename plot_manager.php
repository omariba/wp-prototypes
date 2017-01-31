<?php

	/*Plugin Name: Plot Manager
	Plugin URI: http:plotmanager.com
	Description: Plot Manger helps to show whether a plot is developed or not as well as show the actual size of the land in hectare
	Author:Nelson Omariba
	Version:1.0
	Author URI:nelsomariba.com
	*/

	if ( defined( 'ABSPATH' ) && ! defined( 'RWMB_VER' ) ) {
		require_once dirname( __FILE__ ) . '/inc/loader.php';
		$loader = new RWMB_Loader;
		$loader->init();
	}


	function plot_manager_post(){
		$args = array('public'=>True, 'label'=>'Plot Manager','supports' => array (''));
		register_post_type('plot_manager',$args);
	}

	add_action('init','plot_manager_post');

	

	add_filter( 'rwmb_meta_boxes', 'your_prefix_meta_boxes' );
    function your_prefix_meta_boxes( $meta_boxes ) {
        $meta_boxes[] = array(
            'title'      => __( 'Plot Manager', 'textdomain' ),
            'post_types' => 'plot_manager',
            'context'	 => 'advanced',
            'fields'     => array(
                array(
                    'id'   => 'address',
                    'name' => __( 'Address', 'textdomain' ),
                    'type' => 'text',
                ),
                array(
                    'id'   => 'size',
                    'name' => __( 'Size in acres', 'textdomain' ),
                    'type' => 'text',
                ),
                array(
                    'id'   => 'status',
                    'name' => __( 'Status', 'textdomain' ),
                    'type' => 'select',
                    'options' => array('developed'=>'Developed','not_developed'=>'Not Developed'),
                ),
                
            ),
        );
        return $meta_boxes;
    }    

?>