<?
/*
Plugin Name: Remove duplicated post content on comments page
Plugin URI: http://jehy.ru/articles/2009/04/14/wordpress-plugins-login-redirect-remove-duplicated-post-content-on-comments-page/
Description: Remove content duplicating on comments pages
Version: 1.3
Min WP Version: 2.6
Max WP Version: 3.4.2
Author: Jehy
Author URI: http://jehy.ru/index.en.html
*/

/*
	Copyright 2008  jehy

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General License for more details.

    You should have received a copy of the GNU General License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/


class remove_duplicated_post_content
{var $post_replace_text;

function GetReplaceText()
{  if(!$this->post_replace_text)
  {
    $text=get_option('remove_duplicated_post_content_text');
    if(!$text)
      $text=REM_DUPL_CONT_DEFAULT_REPLACE;
    $text=stripslashes($text);
    $this->post_replace_text=$text;
    return $text;
  }
  return $this->post_replace_text;}
function init_lang()
{
  if(file_exists(ABSPATH . 'wp-content/plugins/remove-duplicated-post-content-on-comments-page/lang/lang.'.WPLANG.'.inc'))
    $lang='.'.WPLANG;
    include_once(ABSPATH . 'wp-content/plugins/remove-duplicated-post-content-on-comments-page/lang/lang'.$lang.'.inc');
}
}

if(is_admin())
  include_once(ABSPATH . 'wp-content/plugins/remove-duplicated-post-content-on-comments-page/remove-duplicated-post-content-options.php');
else
	include_once(ABSPATH . 'wp-content/plugins/remove-duplicated-post-content-on-comments-page/remove-duplicated-post-content-parser.php');

?>