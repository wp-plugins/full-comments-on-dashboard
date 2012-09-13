<?php
/*
Plugin Name: Full Comments On Dashboard
Description: Show full comments in the Recent Comments box on the admin dashboard.
Version: 1.0.3
Author: scribu
Author URI: http://scribu.net/
Plugin URI: http://scribu.net/wordpress/full-comments-on-dashboard
*/

function full_comments_on_dashboard($excerpt) {
	global $comment;

	if ( !is_admin() )
		return $excerpt;

	$content = wpautop($comment->comment_content);
	$content = substr($content, 3, -5);	// Remove first <p> and last </p>
	$content = str_replace('<p>', '<p style="display:block; margin:1em 0">', $content);

	return $content;
}
add_filter('comment_excerpt', 'full_comments_on_dashboard');
