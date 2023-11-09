<?php

/**
 * Plugin Name:       Custom Breadcrumb
 * Description:       Breadcrumbs Block for Gutenberg Editor
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Hemanth Sharma
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       custom-breadcrumb
 *
 * @package           create-block
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}


function custom_breadcrumb_block_init()
{
	register_block_type(__DIR__ . '/build/block');
	register_post_meta('', 'use_custom_breadcrumbs', array(
		'show_in_rest' => true,
		'single' => true,
		'type' => 'boolean',
		'default' => false
	));
	register_post_meta('', 'custom_breadcrumbs', array(
		'show_in_rest' => [
			'schema' => [
				'type'  => 'array',
				'items' => [
					'type' => 'object',
					'properties' => [
						'label' => [
							'type' => 'string',
						],
						'value' => [
							'type' => 'number',
						]
					]
				]
			]
		],
		'single' => true,
		'type' => 'array',
	));
	wp_register_style("google-fonts", "https://fonts.googleapis.com/css2?family=Figtree:wght@400;500;600&family=Plus+Jakarta+Sans:wght@400;700&display=swap", array(), "1.0.0", "all");
}
add_action('init', 'custom_breadcrumb_block_init');
function custom_breadcrumb_admin_init()
{
	$dir = plugin_dir_path(__FILE__) . 'build/metabox/index.asset.php';
	if (file_exists($dir)) {
		$meta_assets = include_once $dir;
		if (isset($meta_assets['dependencies']) && isset($meta_assets['version'])) {
			wp_enqueue_script("metabox", plugin_dir_url(__FILE__) . "build/metabox/index.js", $meta_assets['dependencies'], $meta_assets['version'], true);
		}
	}
}
add_action("admin_init", "custom_breadcrumb_admin_init");
