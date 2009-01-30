<?php
/*
Plugin Name: Full Comments On Dashboard
Description: Show full comments in the Recent Comments box on the admin dashboard.
Version: 1.0
Author: scribu
Author URI: http://scribu.net/
Plugin URI: http://scribu.net/projects/full-comments-on-dashboard.html

Copyright (C) 2008 scribu.net (scribu AT gmail DOT com)

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

add_filter('get_comment_excerpt', 'full_comments_on_dashboard');
function full_comments_on_dashboard($excerpt) {
	global $comment;
	$content = strip_tags($comment->comment_content);

	return is_admin() ? $content : $excerpt;
}
