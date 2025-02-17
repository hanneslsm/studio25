<?php

/**
 * studio25 Dashboard Widget
 *
 * @package studio25
 * @since 0.1.0
 * @version 1.1.0
 */

add_action('wp_dashboard_setup', 'studio25_dashboard_widgets');
function studio25_dashboard_widgets()
{
	wp_add_dashboard_widget('studio25_help_widget', 'Theme Support & Server Info', 'studio25_dashboard_help');
}

function studio25_dashboard_help()
{
	$theme = wp_get_theme();
	$screenshot_url = get_template_directory_uri() . '/screenshot.jpg';

	// Server Information
	$php_version = phpversion();
	$mysql_version = $GLOBALS['wpdb']->db_version();
	$server_software = $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown';
	$host = gethostname() ?: 'Unknown Host';
	$max_upload_size = size_format(wp_max_upload_size());
	$wp_memory_limit = ini_get('memory_limit') ?: WP_MEMORY_LIMIT;

	echo '
    <div style="margin-bottom: 10px;">
		<div style="border: 1px solid #ddd;">
			<img src="' . esc_url($screenshot_url) . '" alt="Theme Screenshot" style="max-width: 100%; height: auto; display: block; margin-top: 10px;">
			<div style="padding: 10px; background: #f9f9f9; border-top: 1px solid #ddd;">
				<strong>' . esc_html($theme->get('Name')) . '</strong>
				<span style="font-size: 0.75em">' . esc_html($theme->get('Version')) . '</span>
				<br />
			</div>
		</div>
	</div>

<h2 style="margin-bottom: 10px; font-size: 20px; border-bottom: 1px solid #ddd; padding-bottom: 5px;">Theme Information</h2>

        <div style="margin-bottom: 20px;">
		<p> ' . esc_html($theme->get('Description')) . '</p>
			<strong>Theme Name:</strong> ' . esc_html($theme->get('Name')) . '<br>
			<strong>Author:</strong> <a href="' . esc_url($theme->get('AuthorURI')) . '">' . esc_html($theme->get('Author')) . '</a><br>
			<strong>Author URI:</strong> <a href="' . esc_url($theme->get('AuthorURI')) . '">' . esc_html($theme->get('AuthorURI')) . '</a><br>
			<strong>Theme URI:</strong> <a href="' . esc_url($theme->get('ThemeURI')) . '">' . esc_html($theme->get('ThemeURI')) . '</a><br>
			<strong>Version:</strong> ' . esc_html($theme->get('Version')) . '<br />
            <strong>Text Domain:</strong> ' . esc_html($theme->get('TextDomain')) . '<br />
        </div>

        <h2 style="margin-bottom: 10px; font-size: 20px; border-bottom: 1px solid #ddd; padding-bottom: 5px;">Server Information</h2>
        <p style="margin-bottom: 10px;">
            <strong>PHP Version:</strong> ' . esc_html($php_version) . '<br />
            <strong>MySQL Version:</strong> ' . esc_html($mysql_version) . '<br />
            <strong>Server Software:</strong> ' . esc_html($server_software) . '<br />
            <strong>Host:</strong> ' . esc_html($host) . '<br />
            <strong>WordPress Version:</strong> ' . esc_html(get_bloginfo('version')) . '<br />
            <strong>WP Memory Limit:</strong> ' . esc_html($wp_memory_limit) . '<br />
            <strong>Max Upload Size:</strong> ' . esc_html($max_upload_size) . '<br />
        </p>
    </div>
    ';
}
