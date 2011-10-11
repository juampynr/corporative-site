<?php

/**
 * @file
 * Default views for the Calendar module.
 */

/**
 * Set up so it can be used as an API to create default calendars for
 * specific date fields.
 * 
 * Use variable_set() to establish criteria for default calendars.
 * Set the variable in custom modules or in settings. 
 * 
 * Example: Add a new default calendar to custom
 * calendars that are already configured:
 *  
 * $options = variable_get('calendar_default_view_options', array());
 * $option = array(
 *   'name' => 'example_event',
 *   'description' => 'An example event calendar for the date field.',
 *   'path' => 'example_event',
 *   'types' => array('example_content_type'),
 *   'date_fields' => array('field_example_date'),
 *   );
 * $options[] = $option;
 * variable_set('calendar_default_view_options', $options);
 * 
*/
function calendar_views_default_views() {
  $views = array();

  // Construct the default view with default options.
  $view = calendar_views_construct();
  $views[$view->name] = $view;

  // Then see if there are any custom calendars to be created 
  // using variable_get().
  $calendar_options = variable_get('calendar_default_view_options', array());
  foreach ((array) $calendar_options as $calendar_option) {
    $view = calendar_views_construct($calendar_option);
    $views[$view->name] = $view;
  }
  return $views;
}

/**
 * 
 * Construct a default calendar to match specified options.
 * Views calls it without options, so the basic 
 * default view will use the default values.
 * 
 * @param $options: an optional array of options to 
 * create default calendars.
 * 
 * Possible options include:
 * @param string $name:           
 *   The view name, if empty, defaults to 'calendar'.
 * @param string $description:           
 *   The view description, if empty, defaults to generic description.
 * @param string $path:           
 *   The view url, if empty, defaults to 'calendar'.
 * @param array  $types:          
 *   Array of content types to limit the calendar to those types.  
 *   If empty, defaults to no type filter.
 * @param array  $date_fields:    
 *   Date fields used to filter the calendar.
 *   If empty, defaults to array('changed') for node.changed.
 * @param array  $display_fields: 
 *   Fields to display in the calendar.
 *   If empty, defaults to title and date fields.
 * 
 * @return the default calendar array.
 */
function calendar_views_construct($options = NULL) {
$name = NULL;
$description = NULL;
$path = NULL;
$types = NULL;
$date_fields = NULL;

if (empty($options)) {
  $disabled = TRUE;
}
else {
  $disabled = FALSE;
  extract($options);
}
if (empty($name)) {
  $name = 'calendar';
}
if (empty($description)) {
  $description = 'A multi-dimensional calendar view with back/next navigation.';
}
if (empty($path)) {
  $path = 'calendar';
}
if (empty($types)) {
  $types = array();
}
if (empty($date_fields)) {
  $date_fields = array('changed');
}
$colors = array();
$date_link_type = '';
foreach ($types as $type => $label) {
  $colors[0][$type] = '#ffffff';
  $date_link_type = $type;
  variable_set('calendar_date_link_' . $type, $path . '/month');
}

$type = '';
if (!empty($types) && is_array($types) && count($types) > 0 ) {
  $types = array_keys($types);
  $type = $types[0];
}

// Can handle core node timestamp fields or Field date fields.

$aliases = array();
foreach ($date_fields as $field_name) {
  if (substr($field_name, 0, 6) == 'field_') {
    $table = 'field_data_' . $field_name;
    $alias = $table . '.' . $field_name . '_value';
    $cck_field = TRUE;
  }
  else {
    $table = 'node';
    $alias = $table . '.' . $field_name;
    $cck_field = FALSE;
  }
  $aliases[] = $alias;
}

$view = new view;
$view->name = $name;
$view->description = $description;
$view->tag = 'Calendar';
$view->base_table = 'node';
$view->human_name = ucfirst($name);
$view->core = 7;
$view->api_version = '3.0-alpha1';
$view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

/* Display: Master */
$handler = $view->new_display('default', 'Master', 'default');
$handler->display->display_options['title'] = $name;
$handler->display->display_options['link_display'] = 'page_1';
$handler->display->display_options['access']['type'] = 'perm';
$handler->display->display_options['cache']['type'] = 'none';
$handler->display->display_options['query']['type'] = 'views_query';
$handler->display->display_options['query']['options']['query_comment'] = FALSE;
$handler->display->display_options['exposed_form']['type'] = 'basic';
$handler->display->display_options['pager']['type'] = 'date_views_pager';
$handler->display->display_options['pager']['options']['date_id'] = 'month';
$handler->display->display_options['pager']['options']['pager_position'] = 'top';
$handler->display->display_options['style_plugin'] = 'calendar_style';
$handler->display->display_options['style_options']['name_size'] = '3';
$handler->display->display_options['style_options']['with_weekno'] = '0';
$handler->display->display_options['style_options']['multiday_theme'] = '1';
$handler->display->display_options['style_options']['theme_style'] = '1';
$handler->display->display_options['style_options']['max_items'] = '0';
$handler->display->display_options['row_plugin'] = 'calendar_node';
/* Field: Content: Title */
$handler->display->display_options['fields']['title']['id'] = 'title';
$handler->display->display_options['fields']['title']['table'] = 'node';
$handler->display->display_options['fields']['title']['field'] = 'title';
$handler->display->display_options['fields']['title']['label'] = '';
$handler->display->display_options['fields']['title']['alter']['alter_text'] = 0;
$handler->display->display_options['fields']['title']['alter']['make_link'] = 0;
$handler->display->display_options['fields']['title']['alter']['absolute'] = 0;
$handler->display->display_options['fields']['title']['alter']['external'] = 0;
$handler->display->display_options['fields']['title']['alter']['replace_spaces'] = 0;
$handler->display->display_options['fields']['title']['alter']['trim_whitespace'] = 0;
$handler->display->display_options['fields']['title']['alter']['nl2br'] = 0;
$handler->display->display_options['fields']['title']['alter']['word_boundary'] = 0;
$handler->display->display_options['fields']['title']['alter']['ellipsis'] = 0;
$handler->display->display_options['fields']['title']['alter']['strip_tags'] = 0;
$handler->display->display_options['fields']['title']['alter']['trim'] = 0;
$handler->display->display_options['fields']['title']['alter']['html'] = 0;
$handler->display->display_options['fields']['title']['element_label_colon'] = FALSE;
$handler->display->display_options['fields']['title']['element_default_classes'] = 1;
$handler->display->display_options['fields']['title']['hide_empty'] = 0;
$handler->display->display_options['fields']['title']['empty_zero'] = 0;
$handler->display->display_options['fields']['title']['hide_alter_empty'] = 0;
$handler->display->display_options['fields']['title']['link_to_node'] = 1;
/* Field: Content: Datex */

foreach ($date_fields as $field_name) {
  if (substr($field_name, 0, 6) == 'field_') {
    $table = 'field_data_' . $field_name;
    $cck_field = TRUE;
  }
  else {
    $table = 'node';
    $cck_field = FALSE;
  }

  $handler->display->display_options['fields'][$field_name]['id'] = $field_name;
  $handler->display->display_options['fields'][$field_name]['table'] = $table;
  $handler->display->display_options['fields'][$field_name]['field'] = $field_name;
  $handler->display->display_options['fields'][$field_name]['label'] = '';
  $handler->display->display_options['fields'][$field_name]['alter']['alter_text'] = 0;
  $handler->display->display_options['fields'][$field_name]['alter']['make_link'] = 0;
  $handler->display->display_options['fields'][$field_name]['alter']['absolute'] = 0;
  $handler->display->display_options['fields'][$field_name]['alter']['external'] = 0;
  $handler->display->display_options['fields'][$field_name]['alter']['replace_spaces'] = 0;
  $handler->display->display_options['fields'][$field_name]['alter']['trim_whitespace'] = 0;
  $handler->display->display_options['fields'][$field_name]['alter']['nl2br'] = 0;
  $handler->display->display_options['fields'][$field_name]['alter']['word_boundary'] = 1;
  $handler->display->display_options['fields'][$field_name]['alter']['ellipsis'] = 1;
  $handler->display->display_options['fields'][$field_name]['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields'][$field_name]['alter']['trim'] = 0;
  $handler->display->display_options['fields'][$field_name]['alter']['html'] = 0;
  $handler->display->display_options['fields'][$field_name]['element_label_colon'] = FALSE;
  $handler->display->display_options['fields'][$field_name]['element_default_classes'] = 1;
  $handler->display->display_options['fields'][$field_name]['hide_empty'] = 0;
  $handler->display->display_options['fields'][$field_name]['empty_zero'] = 0;
  $handler->display->display_options['fields'][$field_name]['hide_alter_empty'] = 0;

  if ($cck_field) {
    $handler->display->display_options['fields'][$field_name]['settings'] = array(
      'format_type' => 'short',
      'fromto' => 'both',
      'multiple_number' => '',
      'multiple_from' => '',
      'multiple_to' => '',
      'show_repeat_rule' => '',
    );
    $handler->display->display_options['fields'][$field_name]['group_rows'] = 0;
    $handler->display->display_options['fields'][$field_name]['delta_offset'] = '0';
    $handler->display->display_options['fields'][$field_name]['delta_reversed'] = 0;
    $handler->display->display_options['fields'][$field_name]['field_api_classes'] = 0;

    /* Sort criterion */
    $handler->display->display_options['sorts'][$field_name . '_value']['id'] = $field_name . '_value';
    $handler->display->display_options['sorts'][$field_name . '_value']['table'] = $table;
    $handler->display->display_options['sorts'][$field_name . '_value']['field'] = $field_name . '_value';

  }
  else {

    /* Sort criterion */
    $handler->display->display_options['sorts'][$field_name]['id'] = $field_name;
    $handler->display->display_options['sorts'][$field_name]['table'] = $table;
    $handler->display->display_options['sorts'][$field_name]['field'] = $field_name;

  }

}

/* Filter criterion: Content: Published */
$handler->display->display_options['filters']['status']['id'] = 'status';
$handler->display->display_options['filters']['status']['table'] = 'node';
$handler->display->display_options['filters']['status']['field'] = 'status';
$handler->display->display_options['filters']['status']['value'] = 1;
$handler->display->display_options['filters']['status']['group'] = 0;
$handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
$handler->display->display_options['arguments']['date_argument']['id'] = 'date_argument';
$handler->display->display_options['arguments']['date_argument']['table'] = 'node';
$handler->display->display_options['arguments']['date_argument']['field'] = 'date_argument';
$handler->display->display_options['arguments']['date_argument']['default_action'] = 'default';
$handler->display->display_options['arguments']['date_argument']['default_argument_type'] = 'date';
$handler->display->display_options['arguments']['date_argument']['default_argument_skip_url'] = 0;
$handler->display->display_options['arguments']['date_argument']['summary']['format'] = 'default_summary';
$handler->display->display_options['arguments']['date_argument']['year_range'] = '-3:+3';
$handler->display->display_options['arguments']['date_argument']['granularity'] = 'month';
$handler->display->display_options['arguments']['date_argument']['add_delta'] = 'yes';
$handler->display->display_options['arguments']['date_argument']['date_fields'] = drupal_map_assoc($aliases);
$handler->display->display_options['arguments']['date_argument']['date_method'] = 'OR';
$handler->display->display_options['arguments']['date_argument']['date_group'] = 'date';


/* Display: Month */
$handler = $view->new_display('page', 'Month', 'page_1');
$handler->display->display_options['defaults']['pager'] = FALSE;
$handler->display->display_options['pager']['type'] = 'date_views_pager';
$handler->display->display_options['pager']['options']['date_id'] = 'month';
$handler->display->display_options['pager']['options']['pager_position'] = 'top';
$handler->display->display_options['defaults']['style_plugin'] = FALSE;
$handler->display->display_options['style_plugin'] = 'calendar_style';
$handler->display->display_options['style_options']['calendar_type'] = 'month';
$handler->display->display_options['style_options']['name_size'] = '3';
$handler->display->display_options['style_options']['mini'] = '0';
$handler->display->display_options['style_options']['with_weekno'] = '0';
$handler->display->display_options['style_options']['multiday_theme'] = '1';
$handler->display->display_options['style_options']['theme_style'] = '1';
$handler->display->display_options['style_options']['max_items'] = '0';
$handler->display->display_options['defaults']['style_options'] = FALSE;
$handler->display->display_options['defaults']['row_plugin'] = FALSE;
$handler->display->display_options['row_plugin'] = 'calendar_node';
$handler->display->display_options['row_options']['calendar_date_link'] = $type;
$handler->display->display_options['row_options']['colors']['legend'] = 'type';
$handler->display->display_options['row_options']['colors']['calendar_colors_type'] = array();
$handler->display->display_options['row_options']['colors']['calendar_colors_vocabulary'] = array();
$handler->display->display_options['defaults']['row_options'] = FALSE;
$handler->display->display_options['defaults']['arguments'] = FALSE;
/* Contextual filter: Date: Date (node) */
$handler->display->display_options['arguments']['date_argument']['id'] = 'date_argument';
$handler->display->display_options['arguments']['date_argument']['table'] = 'node';
$handler->display->display_options['arguments']['date_argument']['field'] = 'date_argument';
$handler->display->display_options['arguments']['date_argument']['default_action'] = 'default';
$handler->display->display_options['arguments']['date_argument']['default_argument_type'] = 'date';
$handler->display->display_options['arguments']['date_argument']['default_argument_skip_url'] = 0;
$handler->display->display_options['arguments']['date_argument']['summary']['format'] = 'default_summary';
$handler->display->display_options['arguments']['date_argument']['year_range'] = '-3:+3';
$handler->display->display_options['arguments']['date_argument']['granularity'] = 'month';
$handler->display->display_options['arguments']['date_argument']['add_delta'] = 'yes';
$handler->display->display_options['arguments']['date_argument']['date_fields'] = drupal_map_assoc($aliases);
$handler->display->display_options['arguments']['date_argument']['date_method'] = 'OR';
$handler->display->display_options['arguments']['date_argument']['date_group'] = 'date';
$handler->display->display_options['path'] = $path . '/month';
$handler->display->display_options['menu']['title'] = 'Month';
$handler->display->display_options['menu']['weight'] = '0';
$handler->display->display_options['tab_options']['type'] = 'normal';
$handler->display->display_options['tab_options']['title'] = 'Month';
$handler->display->display_options['tab_options']['weight'] = '0';

/* Display: Week */
$handler = $view->new_display('page', 'Week', 'page_2');
$handler->display->display_options['defaults']['pager'] = FALSE;
$handler->display->display_options['pager']['type'] = 'date_views_pager';
$handler->display->display_options['pager']['options']['date_id'] = 'week';
$handler->display->display_options['pager']['options']['pager_position'] = 'top';
$handler->display->display_options['defaults']['style_plugin'] = FALSE;
$handler->display->display_options['style_plugin'] = 'calendar_style';
$handler->display->display_options['style_options']['calendar_type'] = 'week';
$handler->display->display_options['style_options']['name_size'] = '3';
$handler->display->display_options['style_options']['mini'] = '0';
$handler->display->display_options['style_options']['with_weekno'] = '0';
$handler->display->display_options['style_options']['multiday_theme'] = '1';
$handler->display->display_options['style_options']['theme_style'] = '1';
$handler->display->display_options['style_options']['max_items'] = '0';
$handler->display->display_options['defaults']['style_options'] = FALSE;
$handler->display->display_options['defaults']['row_plugin'] = FALSE;
$handler->display->display_options['row_plugin'] = 'calendar_node';
$handler->display->display_options['defaults']['row_options'] = FALSE;
$handler->display->display_options['defaults']['arguments'] = FALSE;
/* Contextual filter: Date: Date (node) */
$handler->display->display_options['arguments']['date_argument']['id'] = 'date_argument';
$handler->display->display_options['arguments']['date_argument']['table'] = 'node';
$handler->display->display_options['arguments']['date_argument']['field'] = 'date_argument';
$handler->display->display_options['arguments']['date_argument']['default_action'] = 'default';
$handler->display->display_options['arguments']['date_argument']['default_argument_type'] = 'date';
$handler->display->display_options['arguments']['date_argument']['default_argument_skip_url'] = 0;
$handler->display->display_options['arguments']['date_argument']['summary']['format'] = 'default_summary';
$handler->display->display_options['arguments']['date_argument']['year_range'] = '-3:+3';
$handler->display->display_options['arguments']['date_argument']['granularity'] = 'week';
$handler->display->display_options['arguments']['date_argument']['add_delta'] = 'yes';
$handler->display->display_options['arguments']['date_argument']['date_fields'] = drupal_map_assoc($aliases);
$handler->display->display_options['arguments']['date_argument']['date_method'] = 'OR';
$handler->display->display_options['arguments']['date_argument']['date_group'] = 'date';
$handler->display->display_options['path'] = $path . '/week';
$handler->display->display_options['menu']['title'] = 'Week';
$handler->display->display_options['menu']['weight'] = '2';

/* Display: Day */
$handler = $view->new_display('page', 'Day', 'page_3');
$handler->display->display_options['defaults']['pager'] = FALSE;
$handler->display->display_options['pager']['type'] = 'date_views_pager';
$handler->display->display_options['pager']['options']['date_id'] = 'day';
$handler->display->display_options['pager']['options']['pager_position'] = 'top';
$handler->display->display_options['defaults']['style_plugin'] = FALSE;
$handler->display->display_options['style_plugin'] = 'calendar_style';
$handler->display->display_options['style_options']['calendar_type'] = 'day';
$handler->display->display_options['style_options']['name_size'] = '3';
$handler->display->display_options['style_options']['mini'] = '0';
$handler->display->display_options['style_options']['with_weekno'] = '0';
$handler->display->display_options['style_options']['multiday_theme'] = '1';
$handler->display->display_options['style_options']['theme_style'] = '1';
$handler->display->display_options['style_options']['max_items'] = '0';
$handler->display->display_options['style_options']['groupby_times'] = 'hour';
$handler->display->display_options['defaults']['style_options'] = FALSE;
$handler->display->display_options['defaults']['row_plugin'] = FALSE;
$handler->display->display_options['row_plugin'] = 'calendar_node';
$handler->display->display_options['defaults']['row_options'] = FALSE;
$handler->display->display_options['defaults']['arguments'] = FALSE;
/* Contextual filter: Date: Date (node) */
$handler->display->display_options['arguments']['date_argument']['id'] = 'date_argument';
$handler->display->display_options['arguments']['date_argument']['table'] = 'node';
$handler->display->display_options['arguments']['date_argument']['field'] = 'date_argument';
$handler->display->display_options['arguments']['date_argument']['default_action'] = 'default';
$handler->display->display_options['arguments']['date_argument']['default_argument_type'] = 'date';
$handler->display->display_options['arguments']['date_argument']['default_argument_skip_url'] = 0;
$handler->display->display_options['arguments']['date_argument']['summary']['format'] = 'default_summary';
$handler->display->display_options['arguments']['date_argument']['year_range'] = '-3:+3';
$handler->display->display_options['arguments']['date_argument']['granularity'] = 'day';
$handler->display->display_options['arguments']['date_argument']['add_delta'] = '';
$handler->display->display_options['arguments']['date_argument']['date_fields'] = drupal_map_assoc($aliases);
$handler->display->display_options['arguments']['date_argument']['date_method'] = 'OR';
$handler->display->display_options['arguments']['date_argument']['date_group'] = 'date';
$handler->display->display_options['path'] = $path . '/day';
$handler->display->display_options['menu']['title'] = 'Day';
$handler->display->display_options['menu']['weight'] = '3';

/* Display: Year */
$handler = $view->new_display('page', 'Year', 'page');
$handler->display->display_options['defaults']['pager'] = FALSE;
$handler->display->display_options['pager']['type'] = 'date_views_pager';
$handler->display->display_options['pager']['options']['date_id'] = 'year';
$handler->display->display_options['pager']['options']['pager_position'] = 'top';
$handler->display->display_options['defaults']['style_plugin'] = FALSE;
$handler->display->display_options['style_plugin'] = 'calendar_style';
$handler->display->display_options['style_options']['calendar_type'] = 'year';
$handler->display->display_options['style_options']['name_size'] = '1';
$handler->display->display_options['style_options']['mini'] = '0';
$handler->display->display_options['style_options']['with_weekno'] = '0';
$handler->display->display_options['style_options']['multiday_theme'] = '1';
$handler->display->display_options['style_options']['theme_style'] = '1';
$handler->display->display_options['style_options']['max_items'] = '0';
$handler->display->display_options['defaults']['style_options'] = FALSE;
$handler->display->display_options['defaults']['row_plugin'] = FALSE;
$handler->display->display_options['row_plugin'] = 'calendar_node';
$handler->display->display_options['defaults']['row_options'] = FALSE;
$handler->display->display_options['defaults']['arguments'] = FALSE;
/* Contextual filter: Date: Date (node) */
$handler->display->display_options['arguments']['date_argument']['id'] = 'date_argument';
$handler->display->display_options['arguments']['date_argument']['table'] = 'node';
$handler->display->display_options['arguments']['date_argument']['field'] = 'date_argument';
$handler->display->display_options['arguments']['date_argument']['default_action'] = 'default';
$handler->display->display_options['arguments']['date_argument']['default_argument_type'] = 'date';
$handler->display->display_options['arguments']['date_argument']['default_argument_skip_url'] = 0;
$handler->display->display_options['arguments']['date_argument']['summary']['format'] = 'default_summary';
$handler->display->display_options['arguments']['date_argument']['year_range'] = '-3:+3';
$handler->display->display_options['arguments']['date_argument']['granularity'] = 'year';
$handler->display->display_options['arguments']['date_argument']['add_delta'] = 'yes';
$handler->display->display_options['arguments']['date_argument']['date_fields'] = drupal_map_assoc($aliases);
$handler->display->display_options['arguments']['date_argument']['date_method'] = 'OR';
$handler->display->display_options['arguments']['date_argument']['date_group'] = 'date';
$handler->display->display_options['path'] = $path . '/year';
$handler->display->display_options['menu']['title'] = 'Year';
$handler->display->display_options['menu']['weight'] = '4';

/* Display: Block */
$handler = $view->new_display('block', 'Block', 'block_1');
$handler->display->display_options['defaults']['pager'] = FALSE;
$handler->display->display_options['pager']['type'] = 'date_views_pager';
$handler->display->display_options['pager']['options']['date_id'] = 'mini';
$handler->display->display_options['pager']['options']['pager_position'] = 'top';
$handler->display->display_options['defaults']['style_plugin'] = FALSE;
$handler->display->display_options['style_plugin'] = 'calendar_style';
$handler->display->display_options['style_options']['calendar_type'] = 'month';
$handler->display->display_options['style_options']['name_size'] = '1';
$handler->display->display_options['style_options']['mini'] = '1';
$handler->display->display_options['style_options']['with_weekno'] = '0';
$handler->display->display_options['style_options']['multiday_theme'] = '1';
$handler->display->display_options['style_options']['theme_style'] = '1';
$handler->display->display_options['style_options']['max_items'] = '0';
$handler->display->display_options['defaults']['style_options'] = FALSE;
$handler->display->display_options['defaults']['row_plugin'] = FALSE;
$handler->display->display_options['row_plugin'] = 'calendar_node';
$handler->display->display_options['defaults']['row_options'] = FALSE;
$handler->display->display_options['defaults']['arguments'] = FALSE;
/* Contextual filter: Date: Date (node) */
$handler->display->display_options['arguments']['date_argument']['id'] = 'date_argument';
$handler->display->display_options['arguments']['date_argument']['table'] = 'node';
$handler->display->display_options['arguments']['date_argument']['field'] = 'date_argument';
$handler->display->display_options['arguments']['date_argument']['default_action'] = 'default';
$handler->display->display_options['arguments']['date_argument']['default_argument_type'] = 'date';
$handler->display->display_options['arguments']['date_argument']['default_argument_skip_url'] = 0;
$handler->display->display_options['arguments']['date_argument']['summary']['format'] = 'default_summary';
$handler->display->display_options['arguments']['date_argument']['year_range'] = '-3:+3';
$handler->display->display_options['arguments']['date_argument']['granularity'] = 'month';
$handler->display->display_options['arguments']['date_argument']['add_delta'] = 'yes';
$handler->display->display_options['arguments']['date_argument']['date_fields'] = drupal_map_assoc($aliases);
$handler->display->display_options['arguments']['date_argument']['date_method'] = 'OR';
$handler->display->display_options['arguments']['date_argument']['date_group'] = 'date';

if (module_exists('calendar_ical')) {

/* Display: iCal */
$handler = $view->new_display('feed', 'iCal', 'feed_1');
$handler->display->display_options['pager']['type'] = 'some';
$handler->display->display_options['style_plugin'] = 'ical';
$handler->display->display_options['row_plugin'] = 'ical_node';
$handler->display->display_options['row_options']['date_field'] = $aliases[0];
$handler->display->display_options['defaults']['filters'] = FALSE;
/* Filter criterion: Content: Published */
$handler->display->display_options['filters']['status']['id'] = 'status';
$handler->display->display_options['filters']['status']['table'] = 'node';
$handler->display->display_options['filters']['status']['field'] = 'status';
$handler->display->display_options['filters']['status']['value'] = 1;
$handler->display->display_options['filters']['status']['group'] = 0;
$handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
/* Filter criterion: Date: Date (node) */
$handler->display->display_options['filters']['date_filter']['id'] = 'date_filter';
$handler->display->display_options['filters']['date_filter']['table'] = 'node';
$handler->display->display_options['filters']['date_filter']['field'] = 'date_filter';
$handler->display->display_options['filters']['date_filter']['operator'] = '>=';
$handler->display->display_options['filters']['date_filter']['granularity'] = 'day';
$handler->display->display_options['filters']['date_filter']['form_type'] = 'date_select';
$handler->display->display_options['filters']['date_filter']['default_date'] = 'now';
$handler->display->display_options['filters']['date_filter']['default_to_date'] = '';
$handler->display->display_options['filters']['date_filter']['year_range'] = '-3:+3';
$handler->display->display_options['filters']['date_filter']['add_delta'] = 'yes';
$handler->display->display_options['filters']['date_filter']['date_fields'] = drupal_map_assoc($aliases);
$handler->display->display_options['filters']['date_filter']['date_method'] = 'OR';
$handler->display->display_options['filters']['date_filter']['date_group'] = 'date';
$handler->display->display_options['path'] = $path . '/ical/%/calendar.ics';
$handler->display->display_options['displays'] = array(
  'page' => 'page',
  'page_1' => 'page_1',
  'page_2' => 'page_2',
  'page_3' => 'page_3',
  'block_1' => 'block_1',
  'default' => 0,
);

} // End if module_exists()

/* Display: Upcoming */
$handler = $view->new_display('block', 'Upcoming', 'block_2');
$handler->display->display_options['display_description'] = 'Upcoming events block';
$handler->display->display_options['defaults']['pager'] = FALSE;
$handler->display->display_options['pager']['type'] = 'some';
$handler->display->display_options['pager']['options']['items_per_page'] = '5';
$handler->display->display_options['pager']['options']['offset'] = '0';
$handler->display->display_options['defaults']['style_plugin'] = FALSE;
$handler->display->display_options['style_plugin'] = 'list';
$handler->display->display_options['defaults']['style_options'] = FALSE;
$handler->display->display_options['defaults']['row_plugin'] = FALSE;
$handler->display->display_options['row_plugin'] = 'fields';
$handler->display->display_options['row_options']['links'] = 1;
$handler->display->display_options['row_options']['comments'] = 0;
$handler->display->display_options['defaults']['row_options'] = FALSE;
$handler->display->display_options['defaults']['filters'] = FALSE;
/* Filter criterion: Content: Published */
$handler->display->display_options['filters']['status']['id'] = 'status';
$handler->display->display_options['filters']['status']['table'] = 'node';
$handler->display->display_options['filters']['status']['field'] = 'status';
$handler->display->display_options['filters']['status']['value'] = 1;
$handler->display->display_options['filters']['status']['group'] = 0;
$handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
/* Filter criterion: Date: Date (node) */
$handler->display->display_options['filters']['date_filter']['id'] = 'date_filter';
$handler->display->display_options['filters']['date_filter']['table'] = 'node';
$handler->display->display_options['filters']['date_filter']['field'] = 'date_filter';
$handler->display->display_options['filters']['date_filter']['operator'] = '>=';
$handler->display->display_options['filters']['date_filter']['granularity'] = 'day';
$handler->display->display_options['filters']['date_filter']['form_type'] = 'date_select';
$handler->display->display_options['filters']['date_filter']['default_date'] = 'now';
$handler->display->display_options['filters']['date_filter']['default_to_date'] = '';
$handler->display->display_options['filters']['date_filter']['year_range'] = '-3:+3';
$handler->display->display_options['filters']['date_filter']['add_delta'] = 'yes';
$handler->display->display_options['filters']['date_filter']['date_fields'] = drupal_map_assoc($aliases);
$handler->display->display_options['filters']['date_filter']['date_method'] = 'OR';
$handler->display->display_options['filters']['date_filter']['date_group'] = 'date';
$translatables[$name] = array(
  t('Master'),
  t($name),
  t('more'),
  t('Apply'),
  t('Reset'),
  t('Sort by'),
  t('Asc'),
  t('Desc'),
  t('Year'),
  t('All'),
  t('Month'),
  t('Week'),
  t('Day'),
  t('Block'),
  t('iCal'),
  t('Upcoming'),
  t('Upcoming events block'),
);


return $view;

}
