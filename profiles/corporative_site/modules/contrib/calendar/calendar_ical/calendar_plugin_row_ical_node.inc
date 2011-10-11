<?php
/**
 * @file
 * Contains the iCal row style plugin.
 */

/**
 * Plugin which creates a view on the resulting object
 * and formats it as an iCal VEVENT.
 */
class calendar_plugin_row_ical_node extends views_plugin_row {

  // Basic properties that let the row style follow relationships.
  var $base_table = 'node';
  var $base_field = 'nid';

  // Stores the nodes loaded with pre_render.
  var $nodes = array();

  function option_definition() {
    $options = parent::option_definition();
    $options['date_field'] = array('default' => array());
    return $options;
  }

  /**
   * Provide a form for setting options.
   */
  function options_form(&$form, &$form_state) {
    parent::options_form($form, $form_state);
    $data = date_views_fields('node');
    $options = array();
    foreach ($data['name'] as $item => $value) {
      // We only want to see one value for each field, skip '_value2', and other columns.
      if ($item == $value['fromto'][0]) {
        $options[$item] = $value['label'];
      }
    }
    $form['date_field'] = array(
      '#type' => 'select',
      '#title' => t('Date field'),
      '#options' => $options,
      '#default_value' => $this->options['date_field'],
      '#description' => t('Please identify the node field to use as the iCal date for each item in this view. Add a Date Filter or a Date Argument to the view to limit results to content in a specified date range.'),
      '#required' => TRUE,
      '#prefix' => t("The node title will be used as the 'summary' and the node view will be used as the 'description' for the iCal event. To control the description, hide or show fields for the iCal view mode on the 'Display Fields' screen. Keep in mind that any html in the node view will be stripped out in the feed, to comply with the iCal standards."),
    );
  }

  function pre_render($values) {
    $nids = array();
    foreach ($values as $row) {
      $nids[] = $row->{$this->field_alias};
    }
    if (!empty($nids)) {
      $this->nodes = node_load_multiple($nids);
    }
  }

  function render($row) {
    global $base_url;
    $nid = $row->{$this->field_alias};
    if (!is_numeric($nid)) {
      return;
    }

    // Load the specified node:
    $node = $this->nodes[$nid];
    if (empty($node)) {
      return;
    }

    $data = date_views_fields('node');
    $info = $data['name'][$this->options['date_field']];
    $field_name  = str_replace(array('_value', '_value2'), '', $info['real_field_name']);
    $table_name  = $info['table_name'];
    $delta_field = $info['delta_field'];
    $is_field    = $info['is_field'];

    // Identify the field value that matched our query.
    $item = $node->$field_name;
    $node->date_id = array();
    $start = NULL;
    $end   = NULL;
    if ($is_field) {
      $lang = $node->language;
      $delta = isset($row->$delta_field) ? $row->$delta_field : 0;
      $item = array_key_exists($lang, $item) ? $item[$lang][$delta] : $item['und'][$delta];
      $node->date_id[] = 'calendar.' . $node->nid . '.' . $field_name . '.' . $delta;

      if (!empty($item['value'])) {
        // @TODO Need to come back after this is all working and make more timezone adjustments.    
        $start = new dateObject($item['value'], 'UTC');
        $end   = array_key_exists('value2', $item) ? new dateObject($item['value2'], 'UTC') : $start;
      }
    }
    elseif (!$is_field && !empty($item)) {
      $start = new dateObject($item, 'UTC');
      $end   = new dateObject($item, 'UTC');
     }
    
    // If we don't have an iCal date value, go no further.
    if (empty($start)) {
      return;
    }
    
    module_load_include('inc', 'date_api', 'date_api_ical');
    $item_text = '';

    // Create the rendered display using the display settings from the 'iCal' view mode.
    node_build_content($node, 'ical');

    if (!empty($node->content)) {
      // We render node contents and force links to be last.
      $links = drupal_render($node->content['links']);
      $item_text .= drupal_render($node->content) . $links;
    }

    $event = array();
    $event['summary'] = $node->title;
    $event['start'] = $start->format(DATE_FORMAT_ICAL);
    $event['end'] = $end->format(DATE_FORMAT_ICAL);
    $event['description'] = date_ical_escape_text($item_text);
    $event['url'] = url("node/$node->nid", array('absolute' => TRUE));
    $event['uid'] = !empty($node->date_id) ? $node->date_id[0] : $event['url'];
    $event['rrule'] = $is_field && array_key_exists('rrule', $item) ? $item['rrule'] : '';
    
    return theme($this->theme_functions(),
      array(
        'view' => $this->view,
        'options' => $this->options,
        'event' => $event
      ));
  }
}

