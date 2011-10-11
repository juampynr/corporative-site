<?php

$plugin = array(
  'title' => t('Comments'),
  'description' => t('Facebook comments plugin'),
  'html tag name' => 'comments',
  'nodeapi_view callback' => 'fb_social_comments_nodeapi_view',
  'content_extra_fields callback' => 'fb_social_comments_content_extra_fields',
  'hook_link callback' => 'fb_social_comments_link',
);


function comments_defaults(){
  return array(
    'numposts' => 10,
    'width' => 550,
    'colorscheme' => 'light',
    'migrated' => 0,
  );
}


function comments_fb_settings($options){

  $form = array();
  
  $form['numposts'] = array(
    '#type' => 'textfield',
    '#title' => t('Number of posts'),
    '#description' => t('The maximum number of posts to display. You can set numposts to 0 to not display any comments. (Default value is 10.)'),
  );

  $form['width'] = array(
    '#type' => 'textfield',
    '#title' => t('Width'),
    '#description' => t('The width of the Comments Box in pixels. (Default value is 550px.)'),
  );
  
  $form['colorscheme'] = array(
    '#type' => 'select',
    '#title' => t('Color Scheme'),
    '#description' => t('The color scheme of the plugin'),
    '#options' => array(
      'dark' => t('dark'),
      'light' => t('light'),
    ),
  );
  
  //@todo move this in the fb_social module settings form
  $form['migrated'] = array(
    '#type' => 'checkbox',
    '#title' => t('Migrate to the new version of facebook comments'),
    '#description' => t('If you are using the original version of the Facebook Comments box, check and the comments box will automatically switch to the new version'),
  );
  
  $defaults = comments_defaults();
  
  foreach ($form as $id => $f){
    $form[$id]['#default_value'] = isset($options[$id]) ? $options[$id] : $defaults[$id];
  }
  
  return $form;
  
}


function comments_drupal_settings($options){

  $form = array();
  $form['node_types'] = array(
    '#type' => 'fieldset',
    '#title' => t('Content types'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['node_types']['types'] = array(
    '#type' => 'checkboxes',
    '#description' => t('Select types that will use the facebook comments plugin'),
    '#default_value' =>  isset($options['node_types']['types']) ? array_keys(array_filter($options['node_types']['types'])): array(),
    '#options' => node_type_get_names(),
  );

  
  $form['plugin_location'] = array(
    '#type' => 'fieldset',
    '#title' => t('plugin location and display'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  
  $form['plugin_location']['display_teasers'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show on teasers'),
    '#default_value' =>  isset($options['plugin_location']['display_teasers']) ? $options['plugin_location']['display_teasers']: 1,
    '#description' => t('Should the plugin be displayed on teasers?'),
  );
  
  return $form;
}

/**
 * content_extra_fields callback for this plugin
 */
function fb_social_comments_content_extra_fields(&$extras, $preset){

  $types = ($preset->settings['node_types']['types']);

  foreach ( $types as $type => $value ) {
    if (! empty($value)) {
      $extras['node'][$type]['display']['fb_social_' . $preset->name] = array(
        'label' => t('Facebook comment: ' . $preset->name), 
        'description' => t('The "comment" plugin field from ' . $preset->name . ' preset'), 
        'weight' => 15 
      );
    
    }
  }

}

function comments_preprocess_options(&$options){
  $options['href'] = empty($options['href']) ? $url = fb_social_url($_GET['q']) : $options['href'];
}


/**
 * nodeapi_view callback for this plugin
 */
function fb_social_comments_nodeapi_view($preset, &$node, $view_mode = 'full'){
  
  if ($node->status && fb_social_preset_node_types($preset, $node->type)) {
    if ($view_mode == 'full' || $preset->settings['plugin_location']['display_teasers'] && $view_mode == 'teaser') {
      $preset->fb_attrs['href'] = fb_social_url('node/' . $node->nid);
      $output = fb_social_preset_view($preset);
      //$weight = (module_exists('content')) ? content_extra_field_weight($node->type, 'fb_social_like_' . $preset->name) : - 10;
      $node->content['fb_social_' . $preset->name] = array(
          '#markup' => $output 
      );
    
    }
  }
}

