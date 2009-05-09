<?php
/*
Plugin Name: Full Comments On Dashboard
Description: Show full comments in the Recent Comments box on the admin dashboard.
Version: 1.0.3
Author: scribu
Author URI: http://scribu.net/
Plugin URI: http://scribu.net/wordpress/full-comments-on-dashboard

Copyright (C) 2009 scribu.net (scribu AT gmail DOT com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.
*/

add_filter('comment_excerpt', 'full_comments_on_dashboard');
function full_comments_on_dashboard($excerpt) {
	global $comment;

	if ( !is_admin() )
		return $excerpt;

	$content = wpautop($comment->comment_content);
	$content = substr($content, 3, -5);	// Remove first <p> and last </p>
	$content = str_replace('<p>', '<p style="display:block; margin:1em 0">', $content);

	return $content;
}
