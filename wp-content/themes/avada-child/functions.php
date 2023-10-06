<?php
add_action('wp_enqueue_scripts','loadAvadaScriptCss');
function loadAvadaScriptCss(){
    wp_register_style('avada_bootstrap_style','https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
    wp_enqueue_style('avada_bootstrap_style');

    wp_register_script('avada_bootstrap_script','https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js');
    wp_enqueue_script('avada_bootstrap_script');
}
add_action('init', 'loadtagotextdomain');
function loadtagotextdomain(){
    $res = load_textdomain('avada-child', get_stylesheet_directory().'/language/avada-child-it_IT.mo',get_locale());
}

add_shortcode('register_form', 'add_register_form');

function add_register_form (){
    //ob_start();
        get_template_part('template/registrazione');
    //return ob_end_flush();
}