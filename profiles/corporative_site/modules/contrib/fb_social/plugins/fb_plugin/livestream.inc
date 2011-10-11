<?php

$plugin = array(
  'title' => t('Livestream'),
  'description' => t('Facebook livestream plugin'),
  'html tag name' => 'live-stream'
);


function livestream_defaults(){
  return array(
      'event_app_id' => variable_get('fb_social_appid', ''),
      'width' => 400, 
      'height' => 500, 
      'xid' => '', 
      'via_url' => '',
      'always_post_to_friends' => 0,
  );
}


function livestream_fb_settings($options){

  $form = array();
  $form['event_app_id'] = array(
      '#type' => 'textfield', 
      '#title' => t('App ID'), 
      '#description' => t('Your facebook application ID or API key') 
  );
  
  $form['width'] = array(
      '#type' => 'textfield', 
      '#title' => t('Width'), 
      '#description' => t('The width of the plugin in pixel') 
  );
  
  $form['height'] = array(
      '#type' => 'textfield', 
      '#title' => t('Height'), 
      '#description' => t('The height of the plugin in pixel') 
  );
  
  $form['xid'] = array(
      '#type' => 'textfield', 
      '#title' => t('XID'), 
      '#description' => t('If you have multiple live stream boxes on the same page, specify a unique \'xid\' for each') 
  );

  $form['via_url'] = array(
      '#type' => 'textfield', 
      '#title' => t('Via Attribution URL'), 
      '#description' => t('The URL that users are redirected to when they click on your app name on a status (if not specified, your Connect URL is used)') 
  );
  
  $form['always_post_to_friends'] = array(
      '#type' => 'checkbox', 
      '#title' => t('Always post to friends'), 
      '#description' => t('If set, all user posts will always go to their profile. This option should only be used when users&#039; posts are likely to make sense outside of the context of the event.') 
  );
  
  $defaults = livestream_defaults();
  
  foreach ($form as $id => $f){
    $form[$id]['#default_value'] = isset($options[$id]) ? $options[$id] : $defaults[$id];
  }
  
  return $form;
}


function livestream_drupal_settings($options){
  return array();
}

function livestream_preprocess_options(&$options){
  $options['always_post_to_friends'] = $options['always_post_to_friends'] ? "true" : "false";
}
