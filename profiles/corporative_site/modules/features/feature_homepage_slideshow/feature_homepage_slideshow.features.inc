<?php
/**
 * @file
 * feature_homepage_slideshow.features.inc
 */

/**
 * Implementation of hook_ctools_plugin_api().
 */
function feature_homepage_slideshow_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implementation of hook_views_api().
 */
function feature_homepage_slideshow_views_api() {
  list($module, $api) = func_get_args();
  if ($module == "views" && $api == "views_default") {
    return array("version" => "3.0");
  }
}

/**
 * Implementation of hook_node_info().
 */
function feature_homepage_slideshow_node_info() {
  $items = array(
    'slide' => array(
      'name' => t('Slide'),
      'base' => 'node_content',
      'description' => t('Slide for a slider'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
