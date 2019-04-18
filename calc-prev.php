<?php
/**
 * Plugin Name:       Calculadora Previdência
 * Plugin URI:        http://3xweb.site/previdencia-simples/
 * Description:       Ferramenta para calculo de anos e valor de aposentadoria, insira em qualquer post ou página utilizando o shortcode [prev].
 * Version:           1.0.0
 * Author:            3X Web
 * Author URI:        http://3xweb.site/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ABS
 *
 * @link              http://3xweb.site/previdencia-simples/
 * @package           ABS
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Define global constants.
 *
 * @since 1.0.0
 */
// Plugin version.
if ( ! defined( 'ABS_VERSION' ) ) {
	define( 'ABS_VERSION', '2.0.0' );
}

if ( ! defined( 'ABS_NAME' ) ) {
	define( 'ABS_NAME', trim( dirname( plugin_basename( __FILE__ ) ), '/' ) );
}

if ( ! defined( 'ABS_DIR' ) ) {
	define( 'ABS_DIR', WP_PLUGIN_DIR . '/' . ABS_NAME );
}

if ( ! defined( 'ABS_URL' ) ) {
	define( 'ABS_URL', WP_PLUGIN_URL . '/' . ABS_NAME );
}

/**
 * Form Previdência.
 *
 * @since 1.0.0
 */
if ( file_exists( ABS_DIR . '/shortcode/shortcode-prev.php' ) ) {
	require_once( ABS_DIR . '/shortcode/shortcode-prev.php' );
}

function calc_load(){
    // Register the script like this for a plugin:
    wp_register_script( 'calc-js', plugins_url( '/js/calculator.js', __FILE__ ) );
	wp_register_style('style-css', plugins_url('/css/style.css',__FILE__ ));
    wp_enqueue_style('style-css');
    wp_enqueue_script( 'calc-js' );
}
add_action( 'wp_enqueue_scripts', 'calc_load' );