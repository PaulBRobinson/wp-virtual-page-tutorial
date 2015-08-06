<?php
/*
Plugin Name: Virtual Page Tutorial
Description: Creates a Virtual Page in WordPress while keeping the theme intact
Version: 1.0
Author: Paul Robinson
Author URI: http://return-true.com

	Copyright (c) 2015 Paul Robinson (http://return-true.com)
	General Public License v2 or later
	http://www.gnu.org/licenses/gpl-2.0.html

	This is a WordPress plugin (http://wordpress.org).
	This plugin, like WordPress, is licensed under the GPL.

*/

Class VPTutorial {

	function __construct() {

		register_activation_hook( __FILE__, array( $this, 'activate' ) );

		add_action( 'init', array( $this, 'rewrite' ) );
		add_action( 'template_include', array( $this, 'change_template' ) );

	}

	function activate() {
		set_transient( 'vpt_flush', 1, 60 );
	}

	function rewrite() {
		add_rewrite_endpoint( 'dump', EP_PERMALINK );

		if(get_transient( 'vpt_flush' )) {
			delete_transient( 'vpt_flush' );
			flush_rewrite_rules();
		}
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