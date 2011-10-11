<?php

$plugin = array(
  'title' => t('Like'),
  'description' => t('Facebook like button plugin'),
  'html tag name' => 'like',
  'nodeapi_view callback' => 'fb_social_like_nodeapi_view',
  'content_extra_fields callback' => 'fb_social_like_content_extra_fields',
  'hook_link callback' => 'fb_social_like_link',
);


function like_defaults(){
  return array(
      'href' => '',
      'send' => 0,
      'layout' => 'button_count', 
      'show_faces' => 0, 
      'width' => 350, 
      'action' => 'like', 
      'font' => 'verdana', 
      'colorscheme' => 'dark' 
  );
}


function like_fb_settings($options){

  $form = array();
  $form['send'] = array(
    '#type' => 'checkbox',
    '#title' => t('Send button'),
    '#description' => t('Include a Send button with the Like button'),
  );
  
  $form['layout'] = array(
      '#type' => 'select', 
      '#title' => t('Layout style'), 
      '#description' => t('Determines the size and the amount of the social context next to the button'), 
      '#options' => array(
          'standard' => t('standard'), 
          'button_count' => t('button_count'), 
          'box_count' => t('box_count') 
      )
  );
  
  $form['show_faces'] = array(
      '#type' => 'checkbox', 
      '#title' => t('Show faces'), 
      '#description' => t('Show profiles pictures below the button') 
  );
  
  $form['width'] = array(
      '#type' => 'textfield', 
      '#title' => t('Width'), 
      '#description' => t('The width of the plugin in pixel') 
  );
  
  $form['action'] = array(
      '#type' => 'select', 
      '#title' => t('Verb'), 
      '#description' => t('The verb to display in the button'), 
      '#options' => array(
          'like' => t('like'), 
          'recommend' => t('recommend') 
      ) 
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
  
  $defaults = like_defaults();
  
  foreach ($form as $id => $f){
    $form[$id]['#default_value'] = isset($options[$id]) ? $options[$id] : $defaults[$id];
  }
  
  return $form;
  
}


function like_drupal_settings($options){

  $form = array();
  $form['node_types'] = array(
    '#type' => 'fieldset',
    '#title' => t('Content types'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['node_types']['types'] = array(
    '#type' => 'checkboxes',
    '#description' => t('Select types that will use the facebook like plugin'),
    '#default_value' =>  isset($options['node_types']['types']) ? array_keys(array_filter($options['node_types']['types'])): array(),
    '#options' => node_type_get_names(),
  );
  
  $form['opengraph_tags'] = array(
    '#type' => 'checkbox',
    '#title' => t('Output the facebook opengraph tags for the above content types'),
    '#description' => t('This module has limited support for fb opengraph tags. Uncheck if you are using some other modules that better support opengraph protocol'),
    '#default_value' =>  isset($options['opengraph_tags']) ? $options['opengraph_tags']: 1,
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

function like_preprocess_options(&$options){
  $options['show_faces'] = $options['show_faces'] ? "true" : "false";
  $options['href'] = empty($options['href']) ? $url = fb_social_url($_GET['q']) : $options['href'];
}

/**
 * content_extra_fields callback for this plugin
 */
function fb_social_like_content_extra_fields(&$extras, $preset){

  $types = ($preset->settings['node_types']['types']);

  foreach ( $types as $type => $value ) {
    if (! empty($value)) {
      $extras['node'][$type]['display']['fb_social_' . $preset->name] = array(
        'label' => t('Facebook like: ' . $preset->name), 
        'description' => t('The "like" plugin field from ' . $preset->name . ' preset'), 
        'weight' => 15 
      );
    
    }
  }
}

/**
 * nodeapi_view callback for this plugin
 */
function fb_social_like_nodeapi_view($preset, &$node, $view_mode = 'full'){
  
  if ($node->status && fb_social_preset_node_types($preset, $node->type) && $preset->settings['plugin_location']['location']) {
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

/**
 * Pseudo hook_link for this plugin
 */
function fb_social_like_link($preset, $type, $object, $teaser = FALSE){
    $links = array();
    
    //only nodes are supported / dont like unpublished nodes
    if (('node' != $type) || (! $object->status)) {
      return $links;
    }

    
    // if no plugin on teasers continue
    if ($teaser && ! $preset->settings['plugin_location']['display_teasers']) {
      return $links;
    }

    // plugin is not to be displayed in the node links. continue
    if ($preset->settings['plugin_location']['location']) {
      return $links;
    }
    
    // good to go
    $links = array();
    if ($type == 'node' && fb_social_preset_node_types($preset, $object->type)) {
      $preset->fb_attrs['href'] = fb_social_url('node/' . $object->nid);
      $link_title = fb_social_preset_view($preset);
      $links['fb_social_' . $preset->plugin_type . '_' . $preset->name] = array(
          'title' => $link_title, 
          'html' => TRUE 
      );
    }
    
    return $links;

}
