<?php

class remove_duplicated_post_content_options extends remove_duplicated_post_content
{

function remove_duplicated_post_content_options()
{
  register_activation_hook(__FILE__,array($this,'Activate'));
  register_deactivation_hook(__FILE__,array($this,'DeActivate'));
  add_action('admin_menu', array($this,'modify_menu'));
  $this->init_lang();
}

function Activate()
{}

function DeActivate()
{
  //delete_option('remove_duplicated_post_content_text');
}


function admin_options()
{
  echo '<div class="wrap"><h2>',__('Remove duplicated post content','remove-duplicated-post-content').'</h2>';
  if($_REQUEST['submit'])
    $this->update_options();
  $this->print_form();
  echo '</div>';
}

function update_options()
{
  if(isset($_REQUEST['remove_duplicated_post_content_text']))
    update_option('remove_duplicated_post_content_text',$_REQUEST['remove_duplicated_post_content_text']);
}

function modify_menu()
{
  add_options_page(
    __('Remove duplicated post content','remove-duplicated-post-content'),
    __('Remove duplicated post content','remove-duplicated-post-content'),
    'manage_options',
    __FILE__,
    array($this,'admin_options')
    );
}



function print_form()
{
  ?>
  <form method="post" action="<?php echo $location;?>">
  <div style="float:right;margin-right:2em;">
  <b><?php _e('Remove duplicated post content','remove-duplicated-post-content');?></b><br>
  <a href="http://jehy.ru/wp-plugins.en.html" target="_blank"><?php _e('Plugin Homepage','remove-duplicated-post-content');?></a><br />
  <a href="http://jehy.ru/articles/2009/04/14/wordpress-plugins-login-redirect-remove-duplicated-post-content-on-comments-page/" target="_blank"><?php _e('Feedback','remove-duplicated-post-content');?></a></div>
  <div class="form-table" style="width:70%; border:1px solid #666; padding:10px; background-color:#CECECE;">
  <?php _e('Customize text which you want to show on comments page instead of post text. Use "LINK_BEGIN" and "LINK_END" to define the beginning and the end of link to original post text.','remove-duplicated-post-content');?><br><br>
  <textarea name="remove_duplicated_post_content_text" cols="70" rows="6"><?php echo $this->GetReplaceText(); ?></textarea>
  <input type="submit" name="submit" value="<?php _e('Save Changes','remove-duplicated-post-content') ?>" class="button-primary">
  </div></form>
  <?php
}

}


new remove_duplicated_post_content_options();
?>