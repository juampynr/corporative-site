<?php

$plugin = array(
  'title' => t('facepile'),
  'description' => t('Facebook facepile plugin'),
  'html tag name' => 'facepile',

);


function facepile_defaults(){
  return array(
      'href' => '',
      'size' => 'small',
      'width' => 'button_count', 
      'numrows' => 1, 
      'width' => 200, 
      'colorscheme' => 'light' 
  );
}


function facepile_fb_settings($options){

  $form = array();

  
  $form['href'] = array(
      '#type' => 'textfield', 
      '#title' => t('URL'), 
      '#description' => t('If you want the Facepile to display friends who have liked your page, specify the URL of the page here. If you want the Facepile to display users who have signed up for your site leave this empty.'), 
  );
  
  $form['size'] = array(
      '#type' => 'select', 
      '#title' => t('Layout style'), 
      '#description' => t('Determines the size and the images and social context in the facepile'), 
      '#options' => array(
          'small' => t('Small'), 
          'large' => t('large'), 
      )
  );
  
  $form['width'] = array(
      '#type' => 'textfield', 
      '#title' => t('Width'), 
      '#description' => t('The width of the widget in pixels'), 
  );
  
  $form['numrows'] = array(
      '#type' => 'textfield', 
      '#title' => t('Num rows'), 
      '#description' => t('The maximum number of rows of profile pictures to show'), 
  );
  
  $form['colorscheme'] = array(
      '#type' => 'select', 
      '#title' => t('Color'), 
      '#description' => t('The color scheme of the plugin'), 
      '#options' => array(
          'dark' => t('dark'), 
          'light' => t('light'), 
      ) 
  );
  
  $defaults = facepile_defaults();
  
  foreach ($form as $id => $f){
    $form[$id]['#default_value'] = isset($options[$id]) ? $options[$id] : $defaults[$id];
  }
  
  return $form;
  
}


function facepile_drupal_settings($options){
  return array();
}
