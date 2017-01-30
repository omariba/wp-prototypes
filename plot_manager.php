<?php

	/*Plugin Name: Plot Manager
	Plugin URI: http:plotmanager.com
	Description: Plot Manger helps to show whether a plot is developed or not as well as show the actual size of the land in hectare
	Author:Nelson Omariba
	Version:1.0
	Author URI:nelsomariba.com
	*/

	if(!defined('ABSPATH')){
		exit;
	}

	function plot_manager_post(){
		$args = array('public'=>True, 'label'=>'Plot Manager');
		register_post_type('plot_manager',$args);
	}

	add_action('init','plot_manager_post');

?>