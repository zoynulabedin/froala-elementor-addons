<?php
/*
Plugin Name: Froala Elementor Addons
Plugin URI:
Description: Boilerplate for creating Elementor Extensions
Version: 1.0
Author: zoynul
Author URI: https://wppixelfit.com
License: GPLv2 or later
Text Domain: froala-elementor-addons
Domain Path: /languages/
*/
require_once __DIR__ . '/vendor/autoload.php';
use User\Froala\Assets\Frontend\Front_end_assets;
final class Froala_Elementor_Addons {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.0';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var Elementor_Test_Extension The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return Elementor_Test_Extension An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {

		add_action( 'init', [ $this, 'i18n' ] );
		add_action( 'plugins_loaded', [ $this, 'init' ] );

	}

	/**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 *
	 * Fired by `init` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function i18n() {

		load_plugin_textdomain( 'froala-elementor-addons' );

	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		// Add Plugin actions
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
        // froala categories
        add_action( 'elementor/elements/categories_registered', [ $this, 'froala_elementor_category' ] );
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'froala_styles' ] );
		add_action( 'elementor/frontend/after_enqueue_scripts', [ $this, 'froala_scripts' ] );
		
		

	}

	/**
	 * froala styles
	 */

	function froala_styles() {
		wp_enqueue_style( 'froala_blocks', plugins_url( '/assets/css/froala_blocks.css', __FILE__ ) );
		wp_enqueue_style( 'froala-flipclock', plugins_url( '/assets/css/flipclock.css', __FILE__ ) );
		wp_enqueue_style( 'froala-style', plugins_url( '/assets/css/frola-style.css', __FILE__ ) );
		wp_enqueue_style( 'froala-team-css', plugins_url( '/widgets/team/style.css', __FILE__ ) );
		wp_enqueue_style( 'froala-service-css', plugins_url( '/widgets/service/style.css', __FILE__ ) );
		wp_enqueue_style( 'froala-price-table-css', plugins_url( '/widgets/price-table/style.css', __FILE__ ) );
		wp_enqueue_style( 'froala-email-signature-css', plugins_url( '/widgets/email-signature/style.css', __FILE__ ) );
		
		
		
	}

	/**
	 * froala scripts
	 */
	function froala_scripts() {
		wp_enqueue_script( 'froala-flipclock', plugins_url( '/assets/js/flipclock.min.js', __FILE__ ), array( 'jquery' ), '1.0.0', true );
		wp_enqueue_script( 'froala-scripts', plugins_url( '/assets/js/scripts.js', __FILE__ ), array( 'jquery' ), time(), true );
		
	}

    /**
     * froala elementor category
     */

    public function froala_elementor_category( $elements_manager ) {

        $elements_manager->add_category(
            'froala',
            [
                'title' => __( 'Froala', 'froala-elementor-addons' ),
                'icon' => 'fa fa-image',
            ]
        );
    }

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
		/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'froala-elementor-addons' ),
			'<strong>' . esc_html__( 'froala Elementor Addons', 'froala-elementor-addons' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'froala-elementor-addons' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
		/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'froala-elementor-addons' ),
			'<strong>' . esc_html__( 'froala Elementor Addons', 'froala-elementor-addons' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'froala-elementor-addons' ) . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
		/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'froala-elementor-addons' ),
			'<strong>' . esc_html__( 'froala Elementor Addons', 'froala-elementor-addons' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'froala-elementor-addons' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_widgets() {

		// Include Widget files

		require_once( __DIR__ . '/widgets/price-table/widgets.php' );
		require_once( __DIR__ . '/widgets/flipclock/flipclock.php' );
		require_once( __DIR__ . '/widgets/team/widgets.php' );
		require_once( __DIR__ . '/widgets/service/widgets.php');
		require_once( __DIR__ . '/widgets/email-signature/widgets.php');
		

		// Register widget
		
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Froala_Price_table() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Flipclock() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Team() );
	     \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Service());
	     \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \EmailSignature());
		
	}

}

Froala_Elementor_Addons::instance();