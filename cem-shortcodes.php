<?php
/**
 * Plugin Name: CEM Shortcodes
 * Plugin URI: https://github.com/craigmart-in/cem-shortcodes
 * Description: A collection of wordpress shortcords.
 * Version: 1.0.0
 * Author: Craig Martin
 * Author URI: https://craigmart.in
 * Text Domain: cem-shortcodes
 */

if ( ! function_exists('cem_sc_flex_func')) {
    function cem_sc_enqueue_scripts(){
        wp_enqueue_style( 'cem-sc-style', plugins_url( 'cem-shortcodes-style.css' , __FILE__ ) );
    }
    add_action('wp_enqueue_scripts','cem_sc_enqueue_scripts');
}


if ( ! function_exists('cem_sc_flex_func')) {
    function cem_sc_flex_func($atts, $content = null) {
        $a = shortcode_atts(array(
            'type' => null,
            'align' => null,
            'justify' => null,
            'smtype' => null,
            'mdtype' => null,
            'lgtype' => null,
        ), $atts);
    
        $type = esc_attr($a['type']);
        $align = esc_attr($a['align']);
        $justify = esc_attr($a['justify']);
        $smtype = esc_attr($a['smtype']);
        $mdtype = esc_attr($a['mdtype']);
        $lgtype = esc_attr($a['lgtype']);

        if ( ! empty($align)) {
            $align = " cem-flex--" . $align;
        }

        if ( ! empty($justify)) {
            $justify = " cem-flex--justifyCenter";
        }

        if ( ! empty($type)) {
            $type = " cem-flex--" . $type;
        }

        if ( ! empty($smtype)) {
            $smtype = " small-cem-flex--" . $smtype;
        }

        if ( ! empty($mdtype)) {
            $mdtype = " med-cem-flex--" . $mdtype;
        }

        if ( ! empty($lgtype)) {
            $lgtype = " large-cem-flex--" . $lgtype;
        }

        $html = "<div class=\"cem-flex cem-flex--gutters" . $type . $smtype . $mdtype . $lgtype . $align . $justify . "\">\n";
        $html .= "    ".do_shortcode($content)."\n";
        $html .= "</div>";

        return apply_filters('cem_sc_flex_html', $html);
    }
    add_shortcode('flex', 'cem_sc_flex_func');
}

if ( ! function_exists('cem_sc_flex_cell_func')) {
    function cem_sc_flex_cell_func($atts, $content = null) {
    
        $html = "<div class=\"cem-flex-cell\">\n";
        $html .= "    " . do_shortcode($content) . "\n";
        $html .= "</div>";

        return apply_filters('cem_sc_flex_cell_html', $html);
    }
    add_shortcode('cell', 'cem_sc_flex_cell_func');
}