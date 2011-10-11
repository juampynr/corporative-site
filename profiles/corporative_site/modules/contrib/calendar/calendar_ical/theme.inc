<?php

/**
 * @file
 * Theme files for Calendar iCal.
 */

/**
 * Preprocess an iCal feed
 */
function template_preprocess_calendar_style_ical(&$vars) {
  global $base_url;
  global $language;
  $view = $vars['view'];

  if ($view->display_handler->get_option('sitename_title')) {
    $title = variable_get('site_name', 'Drupal');
    if ($slogan = variable_get('site_slogan', '')) {
      $title .= ' - ' . $slogan;
    }
  }
  else {
    $title = $view->get_title();
  }
  $vars['title'] = check_plain($title);

  // During live preview we don't want to output the header since the contents
  // of the feed are being displayed inside a normal HTML page.
  if (empty($vars['view']->live_preview)) {

    // Keep devel module from appending queries to ical export.
    $GLOBALS['devel_shutdown'] = FALSE;
    drupal_add_http_header('Content-Type', 'application/calendar; charset=utf-8');
  }
}

/**
 * Default theme function for all iCal rows.
 */
function template_preprocess_calendar_row_ical_node(&$vars) {
  $view     = &$vars['view'];
  $options  = &$vars['options'];
  $item     = &$vars['row'];

}
