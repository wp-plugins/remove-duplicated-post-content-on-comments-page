<?php

class remove_duplicated_post_content_parser extends remove_duplicated_post_content
{
function remove_duplicated_post_content_parser()
{
  add_filter('the_content',array($this,'comment_page_filter'),999);
  $this->init_lang();
}
function comment_page_filter($text)
{global $post;
  if(strpos($_SERVER['REQUEST_URI'],'/comment-page-')||$_REQUEST['cpage'])
  {
    $text=$this->GetReplaceText();
    $text=str_replace('LINK_BEGIN','<a href="'.get_permalink($post->ID).'">',$text);
    $text=str_replace('LINK_END','</a>',$text);
    return $text;
  }
  return $text;
}
}

new remove_duplicated_post_content_parser();
?>