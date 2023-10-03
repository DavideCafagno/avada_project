<?php
add_action('wp_enqueue_scripts','loadAvadaScriptCss');
function loadAvadaScriptCss(){
    wp_register_style('avada_bootstrap_style','https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
    wp_enqueue_style('avada_bootstrap_style');

    wp_register_script('avada_bootstrap_script','https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js');
    wp_enqueue_script('avada_bootstrap_script');
}