<?
/*
Plugin Name: Remove duplicated post content on comments page
Plugin URI: http://jehy.ru/articles/2009/04/14/wordpress-plugins-login-redirect-remove-duplicated-post-content-on-comments-page/
Description: Remove content duplicating on comments pages
Version: 0.1
Author: Jehy
Author URI: http://jehy.ru/index.en.html
*/


/*  
	Copyright 2008  jehy

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/



add_filter('the_content','comment_page_filter',999);

function comment_page_filter($text)
{global $post;
if(strpos($_SERVER['REQUEST_URI'],'/comment-page-'))
	return '<br><a href="'.get_permalink($post->ID).'">'.__('Click here to read post content instead of comments page').'</a><br><br>';
return $text;
}
?>