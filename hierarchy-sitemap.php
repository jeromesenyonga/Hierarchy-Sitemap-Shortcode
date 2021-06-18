  <?php

/*
Plugin name: Hierarchy Sitemap Shortcode
Description: shortcode function that generates a page hierarchy sitemap
Plugin Author: Jerome Ssenyonga
Plugin URI: https://jarvtechnologies.com
Author URI: https://jarvtechnologies.com
*/

function GenerateSitemap($params = array()) {

	// default parameters
	extract(shortcode_atts(array(
		'title' => 'Site map',
		'id' => 'sitemap',
	    'depth' => 2
	), $params));

	// create sitemap
	$sitemap = wp_list_pages("title_li=&depth=$depth&sort_column=menu_order&echo=0");
	if ($sitemap != '') {
		$sitemap =
			($title == '' ? '' : "<h2>$title</h2>") .
			'<ul' . ($id == '' ? '' : " id="$id"") . ">$sitemap</ul>";
	}

	return $sitemap;
}
add_shortcode('sitemap', 'GenerateSitemap');
