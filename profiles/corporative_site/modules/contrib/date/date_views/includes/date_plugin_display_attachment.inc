<?php
/**
 * @file
 * Views display plugin for Date API.
 */

/**
 * The plugin that handles date navigation attachments.
 *
 * Creates a special attachment for this purpose only.
 */
class date_plugin_display_attachment extends views_plugin_display_attachment {

  // Require the date_nav style. That style has a date_nav type
  // so it won't show up as a style option on any other display.
  function get_style_type() { return 'date_nav'; }

  // No options to set style, force it to the right value.
  function defaultable_sections($section = NULL) {
    if (in_array($section, array('row_options', 'row_plugin', 'items_per_page'))) {
      return FALSE;
    }
    return parent::defaultable_sections($section);
  }

  /**
   * Override some of the parent options.
   */
  function options(&$display) {
    parent::options($display);
    $display['style_plugin'] = 'date_nav';
    $display['items_per_page'] = 0;
    $display['row_plugin']['default'] = '';
    $display['default']['style_plugin'] = FALSE;
    $display['default']['style_options'] = FALSE;
    $display['default']['items_per_page'] = FALSE;
    $display['default']['row_plugin'] = FALSE;
    $display['default']['row_options'] = FALSE;

    return $display;
  }
}
