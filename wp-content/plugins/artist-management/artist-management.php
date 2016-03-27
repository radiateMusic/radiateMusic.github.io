<?php 
/*
Plugin Name: Artist Management
*/
	defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class Artist {
    public function __construct() {
    	register_activation_hook(__FILE__, array($this, 'install'));

    	add_action('init', array($this, 'init'));

    }
    //runs when the plugin is activated
    function install() {
    	$this->init();
    	flush_rewrite_rules();
    }
    //runs when the plugin is initialized
    function init() {
    	$this->register_post_types();
    	/*$this->register_custom_taxonomies();*/
    }

    function register_post_types() {

    	$labels = array(
    		'name' => _x('Artists','artist'),
    		'singular_name' => _x('Artist','artist'),
    		'add_new' => _x('Add New Artist','artist'),
    		'add_new_item' => _x('Add New Artist','artist'),
    		'edit_item' => _x('Edit Artist','artist'),
    		'new_item' => _x('New Artist','artist'),
    		'view_item' => _x('View Artist','artist'),
    		'search_items' => _x('Search Artists','artist'),
    		'not_found' => _x('No Artists found','artist'),
    		'not_found_in_trash' => _x('No Artists found in trash','artist'),
    		'parent_item_colon' => _x('Parent Artist','artist'),
    		'menu_name' => _x('Artists','artist'),
    	);

    	$args = array(
    		'labels' => $labels,
    		'hierarchical' => 'true',
    		'supports' => array('title','editor','custom-fields','thumbnail'),
    		'taxonomies' => array('post_tag'),
    		'public' => true,
    		'show_ui' => true,
    		'show_in_menu' => true,
    		'show_in_nav_menu' => true,
    		'publicly_queryable' => true,
    		'exclude_from_search' => false,
    		'has_archive' => true,
    		'query_var' => true,
    		'can_export' => true,
    		'rewrite' => array('slug' => 'artists'),
    		'capability_type' => 'post',

    	);

    	register_post_type('artist', $args);
    }
    //19 minutes of video
    /*function register_custom_taxonomies() {
    	$labels = array(
    		'name' => _x('Song ID','musician'),
    		'singular_name' => _x('Musician','Musician'),
    		'add_new' => _x('Add New','musician'),
    		'add_new_item' => _x('Add New Musician','musician'),
    		'edit_item' => _x('Edit Musician','musician'),
    		'new_item' => _x('New Muscian','musician'),
    		'view_item' => _x('View Musician','musician'),
    		'search_items' => _x('Search musicians','musician'),
    		'not_found' => _x('No musicians found','musician'),
    		'not_found_in_trash' => _x('No musicians found in trash','musician'),
    		'parent_item_colon' => _x('Parent Musician','musician'),
    		'menu_name' => _x('Musicians','Musician'),
    	);
    }*/

    function load_songs() {
        echo $this->ID;
    }
}
new Artist();