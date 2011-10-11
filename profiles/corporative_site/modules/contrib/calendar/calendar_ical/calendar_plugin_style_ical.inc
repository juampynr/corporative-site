<?php

/**
 * @file
 * Views style plugin for the Calendar iCal module.
 */

/**
 * Default style plugin to render an iCal feed.
 */
class calendar_plugin_style_ical extends views_plugin_style_rss {

  function attach_to($display_id, $path, $title) {
    $display = $this->view->display[$display_id]->handler;
    $url_options = array();
    $input = $this->view->get_exposed_input();
    if ($input) {
      $url_options['query'] = $input;
    }
    $url_options['absolute'] = TRUE;
    $url = url($this->view->get_url(NULL, $path), $url_options);
    if (empty($this->preview)) {
      $this->view->feed_icon = theme('calendar_ical_icon', array('url' => $url, 'title' => $title));
      drupal_add_html_head_link(array(
        'rel' => 'alternate',
        'type' => 'application/calendar',
        'title' => $title,
        'href' => $url
      ));
    }
  }

  function options_form(&$form, &$form_state) {
    parent::options_form($form, $form_state);
    // Override the text in the RSS description field.
    $form['description'] = array(
      '#type' => 'textfield',
      '#title' => t('iCal description'),
      '#default_value' => $this->options['description'],
      '#description' => t('This will appear in the iCal feed itself.'),
    );
  }

  function render() {
    if (empty($this->row_plugin)) {
      debug('views_plugin_style_default: Missing row plugin');
      return;
    }
    $rows = '';
    foreach ($this->view->result as $row_index => $row) {
      $this->view->row_index = $row_index;
      $rows .= $this->row_plugin->render($row);
    }

    $output = theme($this->theme_functions(),
      array(
        'view' => $this->view,
        'options' => $this->options,
        'rows' => $rows
      ));
    unset($this->view->row_index);
    return $output;
  }

}