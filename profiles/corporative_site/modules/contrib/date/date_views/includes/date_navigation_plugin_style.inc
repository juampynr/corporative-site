<?php
/**
 * @file
 * Views navigation style plugin for Date API.
 */

/**
 * Style plugin to create date back/next navigation.
 *
 * The style plugin passes some argument values to the theme, and
 * ensures that the date argument is present and that the default
 * value is set to the current date.
 */
class date_navigation_plugin_style extends views_plugin_style {

  /**
   * Style validation.
   */
  function validate() {
    $errors = parent::validate();

    $arguments = $this->display->handler->get_option('arguments');
    $count = 0;
    $found = FALSE;
    foreach ($arguments as $id => $argument) {
      if (!date_views_handler_is_date($argument, 'argument')) {
        if ($count > 0) {
          $errors[] = t('The %style cannot use more than one Date: Date argument.', array('%style' => $this->definition['title']));
        }
        elseif ($argument['default_argument_type'] != 'date') {
          $errors[] = t('The %style requires the Date: Date argument be set to default to the current date.', array('%style' => $this->definition['title']));
        }
        $count++;
        $found = TRUE;
      }
    }
    if (!$found) {
      $errors[] = t('The %style requires the Date: Date argument.', array('%style' => $this->definition['title']));
    }
    return $errors;
  }

  function query() {
    // We don't actually want to retrieve any fields in the query for the navigation bar.
    $this->view->query->clear_fields();
    // But we have to have *something* as a field or Views will throw database exception errors.
    $this->view->query->add_field(NULL, "0", 'EMPTY');

    // Bring the argument information into the view so our theme can access it.
    $i = 0;
    foreach ($this->view->argument as $id => $argument) {
      if (date_views_handler_is_date($argument, 'argument')) {
        $this->view->date_info->granularity = $argument->date_handler->granularity;
        $this->view->date_info->date_arg = $argument->argument;
        $this->view->date_info->date_arg_pos = $i;
        $this->view->date_info->year = date_format($argument->min_date, 'Y');
        $this->view->date_info->month = date_format($argument->min_date, 'n');;
        $this->view->date_info->day = date_format($argument->min_date, 'j');
        $this->view->date_info->week = date_week(date_format($argument->min_date, DATE_FORMAT_DATE));
        $this->view->date_info->date_range = $argument->date_range;
        $this->view->date_info->min_date = $argument->min_date;
        $this->view->date_info->max_date = $argument->max_date;
        $this->view->date_info->limit = $argument->limit;
        $this->view->date_info->url = $this->view->get_url();
      }
      $i++;
    }
  }
}
