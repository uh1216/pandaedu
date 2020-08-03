<?php

add_action( 'wp_ajax_get_id_uid', 'put_id_uid' );
function put_id_uid() {
    $file = "/opt/bitnami/apps/wordpress/htdocs/wp-content/log.json";
    $f_file = file_get_contents($file);
    
    $log_array = json_decode($f_file, true);
    $id = $_POST['id'];
    $uid = $_POST['uid'];

    $data = array('id' => (int)$id, 'uid' => (int)$uid);
    $log_array[] = $data;
    file_put_contents($file, json_encode($log_array));
 
}

add_action( 'wp_ajax_get_id', 'get_url' );
function get_url() {

    $id = $_POST['id'];
 
    exec('/usr/bin/python3 /opt/bitnami/apps/wordpress/htdocs/wp-content/recommend_uid.py .$id');
}

function theme_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'avada-stylesheet' ) );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function avada_lang_setup() {
	$lang = get_stylesheet_directory() . '/languages';
	load_child_theme_textdomain( 'Avada', $lang );
}
add_action( 'after_setup_theme', 'avada_lang_setup' );


add_shortcode('my_db_print', 'my_db_print_functoin');

function my_db_print_functoin($atts=array()){

	global $mydb;

	ob_start();

	

	$results = $mydb->get_results("SELECT user_login from wp_users where id = 4");

         print_r($results[0]->user_login);



	return ob_get_clean();

}
