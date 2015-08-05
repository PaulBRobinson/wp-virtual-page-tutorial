<?php
/*
Plugin Name: Virtual Page Tutorial
Description: Creates a Virtual Page in WordPress while keeping the theme intact
Version: 1.0
Author: Paul Robinson
Author URI: http://return-true.com

	Copyright (c) 2015 Paul Robinson (http://return-true.com)
	Virtual Page Tutorial is released under the WTFPL
	http://www.wtfpl.net/

	This is a WordPress plugin (http://wordpress.org).

*/

Class VPTutorial {

	function __construct() {

		register_activation_hook( __FILE__, array( $this, 'activate' ) );

		add_action( 'init', array( $this, 'rewrite' ) );
		add_action( 'template_include', array( $this, 'change_template' ) );

	}

	function activate() {
		flush_rewrite_rules( false );
	}

	function rewrite() {
		add_rewrite_endpoint( 'dump', EP_PERMALINK );
	}

	function change_template( $template ) {

		if( get_query_var( 'dump', false ) !== false ) {

			//Check theme directory first
			$newTemplate = locate_template( array( 'template-dump.php' ) );
			if( '' != $newTemplate )
				return $newTemplate;

			//Check plugin directory next
			$newTemplate = plugin_dir_path( __FILE__ ) . 'templates/template-dump.php';
			if( file_exists( $newTemplate ) )
				return $newTemplate;
		}

		//Fall back to original template
		return $template;

	}

}

new VPTutorial;