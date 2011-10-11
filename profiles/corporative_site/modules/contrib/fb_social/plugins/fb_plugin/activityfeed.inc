<?php

$plugin = array(
    'title' => t('activityfeed'), 
    'description' => t('Facebook activityfeed plugin'), 
    'html tag name' => 'activity' 
)
;

function activityfeed_defaults(){
  return array(
      'site' => '', 
      'width' => 300, 
      'height' => 300, 
      'header' => 1, 
      'colorscheme' => 'light', 
      'font' => 'arial', 
      'border_color' => '', 
      'recommendations' => 1 
  );
}

function activityfeed_fb_settings($options){
  
  $form = array();
  
  $form['site'] = array(
      '#type' => 'textfield', 
      '#title' => t('Domain'), 
      '#description' => t('The domain for which to show recommendations') 
  );
  
  $form['width'] = array(
      '#type' => 'textfield', 
      '#title' => t('Width'), 
      '#description' => t('The width of the widget in pixels') 
  );
  
  $form['height'] = array(
      '#type' => 'textfield', 
      '#title' => t('Height'), 
      '#description' => t('The height of the widget in pixels') 
  );
  
  $form['header'] = array(
      '#type' => 'checkbox', 
      '#title' => t('Show the widget header'), 
      '#description' => t('Show the header in the recommendations widget') 
  );
  
  $form['colorscheme'] = array(
      '#type' => 'select', 
      '#title' => t('Color'), 
      '#description' => t('The color scheme of the widget'), 
      '#options' => array(
          'dark' => t('dark'), 
          'light' => t('light') 
      ) 
  );
  
  $form['font'] = array(
      '#type' => 'select', 
      '#title' => t('Font'), 
      '#description' => t('The font of the widget'), 
      '#options' => array(
          'arial' => t('arial'), 
          'lucida grande' => t('lucida grande'), 
          'segoe ui' => t('segoe ui'), 
          'tahoma' => t('tahoma'), 
          'trebuchet ms' => t('trebuchet ms'), 
          'verdana' 
      ) 
  );
  
  $form['border_color'] = array(
      '#type' => 'textfield', 
      '#title' => t('Border color'), 
      '#description' => t('The border color of the widget') 
  );
  
  $form['recommendations'] = array(
      '#type' => 'checkbox', 
      '#title' => t('Show the widget header'), 
      '#description' => t('Show the header in the recommendations widget') 
  );
  $defaults = activityfeed_defaults();
  
  foreach ( $form as $id => $f ) {
    $form[$id]['#default_value'] = isset($options[$id]) ? $options[$id] : $defaults[$id];
  }
  
  return $form;

}

function activityfeed_drupal_settings($options){
  return array();
}

function activityfeed_preprocess_options(&$options){
  $options['header'] = $options['header'] ? "true" : "false";
  $options['recommendations'] = $options['recommendations'] ? "true" : "false";
}
