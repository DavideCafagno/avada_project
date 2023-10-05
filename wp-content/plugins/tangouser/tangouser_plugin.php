<?php
/*
 * Plugin Name: Tango User
Plugin URI:
Description:
Version: 1.0
Author: Cafagno Davide
License:
Text Domain: tango-user
 * */
add_action('rest_api_init', 'load_tango_user_rest_api');
function load_tango_user_rest_api()
{
    register_rest_route('tango_user/v1', "registration/", array(
        'methods' => 'POST',
        'callback' => 'tango_user_registration',
        'permission_callback' => '__return_true'
    ));
}

add_action('wp_ajax_tango_user_registration', 'tango_user_registration');
function tango_user_registration()
{
    if(wp_verify_nonce($_REQUEST['tangononce'])){
        $tangouser = $_REQUEST['tangouser'];
        echo json_encode(new WP_REST_Response('Registrazione effettuata con successo',200));
    }else {
        echo json_encode(new WP_REST_Response('Non Autorizzato', 401));
    }
    die();
}