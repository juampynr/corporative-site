<?php

$plugin = array(
  'title' => t('send'),
  'description' => t('Facebook send plugin'),
  'html tag name' => 'send',

);


function send_defaults(){
  return array(
      'href' => '',
      'font' => '', 
      'colorscheme' => 'light' 
  );
}


function send_fb_settings($options){

  $form = array();

  $form['href'] = array(
    '#type' => 'textfield',
    '#title' => t('URL to send'),
    '#description' => t('The URL to send.'),
    //'#required' => TRUE,
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
          'verdana' => t('verdana'),
      ) 
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
  
  $defaults = send_defaults();
  
  foreach ($form as $id => $f){
    $form[$id]['#default_value'] = isset($options[$id]) ? $options[$id] : $defaults[$id];
  }
  
  return $form;
  
}


function send_drupal_settings($options){

  $form = array();
  $form['node_types'] = array(
    '#type' => 'fieldset',
    '#title' => t('Content types'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['node_types']['types'] = array(
    '#type' => 'checkboxes',
    '#description' => t('Select types that will use the facebook send plugin'),
    '#default_value' =>  isset($options['node_types']['types']) ? array_keys(array_filter($options['node_types']['types'])): array(),
    '#options' => node_type_get_names(),
  );
  
  $form['plugin_location'] = array(
    '#type' => 'fieldset',
    '#title' => t('plugin location and display'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['plugin_location']['location'] = array(
    '#type' => 'radios',
    '#title' => t('plugin location'),
    '#default_value' =>  isset($options['plugin_location']['location']) ? $options['plugin_location']['location']: 0,
    '#options' => array(t('Node links'), t('Node content')),
    '#description' => t('The plugin can be printed in the "links" are of the node or as part of the node content'),
  );
  
  $form['plugin_location']['display_teasers'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show on teasers'),
    '#default_value' =>  isset($options['plugin_location']['display_teasers']) ? $options['plugin_location']['display_teasers']: 1,
    '#description' => t('Should the plugin be displayed on teasers?'),
  );
  return $form;

}
