<?php

$plugin = array(
  'title' => t('Recommendations'),
  'description' => t('Facebook recommendations plugin'),
  'html tag name' => 'recommendations',

);


function recommendations_defaults(){
  return array(
      'site' => '', 
      'width' => 300, 
      'height' => 300, 
      'header' => 1, 
      'colorscheme' => 'light', 
      'border_color' => '',
      'font' => 'arial' 
  );
}


function recommendations_fb_settings($options){

  $form = array();
  
  $form['site'] = array(
      '#type' => 'textfield', 
      '#title' => t('Domain'), 
      '#description' => t('The domain for which to show recommendations'), 
  );
  
  $form['width'] = array(
      '#type' => 'textfield', 
      '#title' => t('Width'), 
      '#description' => t('The width of the plugin in pixels'), 
  );
  
  $form['height'] = array(
      '#type' => 'textfield', 
      '#title' => t('Height'), 
      '#description' => t('The height of the plugin in pixels'), 
  );
  
  $form['header'] = array(
      '#type' => 'checkbox', 
      '#title' => t('Show the plugin header'), 
      '#description' => t('Show the header in the recommendations plugin'), 
  );
  
  $form['colorscheme'] = array(
      '#type' => 'select', 
      '#title' => t('Color'), 
      '#description' => t('The color scheme of the plugin'), 
      '#options' => array(
          'dark' => t('dark'), 
          'light' => t('light') 
      ) 
  );
  
  $form['border_color'] = array(
      '#type' => 'textfield', 
      '#title' => t('Border color'), 
      '#description' => t('The border color of the plugin'), 
  );
  
  $form['font'] = array(
      '#type' => 'select', 
      '#title' => t('Font'), 
      '#description' => t('The font of the plugin'), 
      '#options' => array(
          'arial' => t('arial'), 
          'lucida grande' => t('lucida grande'), 
          'segoe ui' => t('segoe ui'),
          'tahoma' => t('tahoma'),
          'trebuchet ms' => t('trebuchet ms'),
          'verdana', 
      ) 
  );
  
  
  $defaults = recommendations_defaults();
  
  foreach ($form as $id => $f){
    $form[$id]['#default_value'] = isset($options[$id]) ? $options[$id] : $defaults[$id];
  }
  
  return $form;
  
}


function recommendations_drupal_settings($options){

  return array();

}

function recommendations_preprocess_options(&$options){
  $options['header'] = $options['header'] ? "true" : "false";
}
