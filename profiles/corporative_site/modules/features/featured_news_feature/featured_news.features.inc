<?php
/**
 * @file
 * featured_news.features.inc
 */

/**
 * Implementation of hook_views_api().
 */
function featured_news_views_api() {
  list($module, $api) = func_get_args();
  if ($module == "views" && $api == "views_default") {
    return array("version" => "3.0");
  }
}

/**
 * Implementation of hook_node_info().
 */
function featured_news_node_info() {
  $items = array(
    'new' => array(
      'name' => t('New'),
      'base' => 'node_content',
      'description' => t('New item'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
