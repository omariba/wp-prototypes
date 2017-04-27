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
		$args = array('public'=>True, 'label'=>'Plot Manager','supports' => array ('title'));
		register_post_type('plot_manager',$args);
	}

	add_action('init','plot_manager_post');


    function another_plot_post(){

        $new = array('public' => True, 'label'=>'Another Plot','supports'=>array(''));
        register_post_type('another_plot',$new);

    }

    add_action('init','another_plot_post');

    function n_e_t(){
        wp_register_script('s_script', plugins_url('require.js',__FILE__),'jquery');
        wp_enqueue_script('s_script');
    }

    add_action('admin_enqueue_scripts','n_e_t');

    // function require_title($hook){
    //     global $post;

    //     if('plot_manager' != $post->post_type){
    //         return;
    //     }
    //     if($hook == 'post_new.php' || $hook == 'post.php'){
    //         wp_enqueue_script( 'my_scripts', get_template_directory_uri() . 'require.js', array( 'jquery' ) );
    //         //error_log('Script will run!!');
    //     }



    // }

    // add_action('admin_enqueue_scripts','require_title');


    


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
                    // 'clone' => true,
                    // 'sort_clone' => true,
                ),
                array(
                    'id'   => 'status',
                    'name' => __( 'Status', 'textdomain' ),
                    'type' => 'select',
                    'options' => array('Developed'=>'Developed.','Not Developed'=>'Not Developed.'),
                ),
                
            ),
        );
        return $meta_boxes;
    } 
    add_filter( 'rwmb_meta_boxes', 'anotherplot' );
    function anotherplot( $meta_boxes ) {
        $meta_boxes[] = array(
            'title'      => __( 'Grouping', 'textdomain' ),
            'post_types' => 'another_plot',
            'context'    => 'advanced',
            'fields'     => array(
                array(
                    'id'        => 'address',
                    'name'      => __( 'Address', 'textdomain' ),
                    'type'      => 'select',
                    'options'   => array()
                ),
                               
            ),
        );
        return $meta_boxes;
    }


function shortc_codes($atts){
    // global $posts;
    // print_r($posts);
    // foreach ($posts as $key => $value) {
    //     echo $key . $value;
    // }

    // global $post;
    // foreach ($post as $key => $value) {
    //     echo $key . " " . $value;
    // }
    $m = get_post_meta('141','status',TRUE);
    echo $m;

}

add_shortcode('bujika','shortc_codes');


?>