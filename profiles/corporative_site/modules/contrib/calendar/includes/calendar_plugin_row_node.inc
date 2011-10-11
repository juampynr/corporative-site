<?php
/**
 * @file
 * Contains the Calendar row style plugin.
 *
 * This plugin takes the view results, finds the date value for each,
 * then compares that date to the date range for the current view.
 * Items that started before or ended after the current date range
 * are shortened to the current range. Items that extend over more
 * than one day are cloned to create a calendar item for each day.
 * The resulting array of results (which may have a different number
 * of items than the original view result) are then passed back
 * to the style plugin so they can be displayed in a calendar.
 *
 * Row plugins are specific to entity types. To create a row plugin
 * for other types of entities, this class can be extended or copied,
 * adjusting the parts that are specific to nodes.
 */

/**
 * Plugin which creates a view on the resulting object
 * and formats it as a Calendar node.
 */
class calendar_plugin_row_node extends views_plugin_row {

  // Basic properties that let the row style follow relationships.
  var $base_table = 'node';
  var $base_field = 'nid';

  // Stores the nodes loaded with pre_render.
  var $nodes = array();

  /**
   * Helper function to find the date argument handler for this view.
   */
  function date_argument_handler() {
    foreach ($this->view->argument as $name => $handler) {
      if (date_views_handler_is_date($handler, 'argument')) {
        return $handler;
      }
    }
  }

  function option_definition() {
    $options = parent::option_definition();
    $options['date_fields'] = array('default' => array());
    $options['calendar_date_link'] = array('default' => '');
    $options['colors'] = array(
      'contains' => array(
        'legend' => array('default' => ''),
        'calendar_colors_type' => array('default' => array()),
        'taxonomy_field' => array('default' => ''),
        'calendar_colors_vocabulary' => array('default' => array()),
        'calendar_colors_taxonomy' => array('default' => array()),
        'calendar_colors_group' => array('default' => array()),
    ));
    return $options;
  }

  /**
   * Provide a form for setting options.
   */
  function options_form(&$form, &$form_state) {
    parent::options_form($form, $form_state);
    
    $form['markup']['#markup'] = t("The calendar row plugin will format view results as calendar items. Make sure this display has a 'Calendar' format and uses a 'Date' contextual filter, or this plugin will not work correctly.");
    $form['calendar_date_link'] = array(
      '#title' => t('Add new date link'),
      '#type' => 'select',
      '#default_value' => $this->options['calendar_date_link'],
      '#options' => array('' => t('No link')) + node_type_get_names(),
      '#description' => t('Display a link to add a new date of the specified content type. Displayed only to users with appropriate permissions.'),
      );        
    $form['colors'] = array(
      '#type' => 'fieldset',
      '#title' => t('Legend Colors'),
      '#description' =>  t('Set a hex color value (like #ffffff) to use in the calendar legend for each content type. Items with empty values will have no stripe in the calendar and will not be added to the legend.'),
    );
    $form['colors']['legend'] = array(
      '#title' => t('Stripes'),
      '#description' => t('Add stripes to calendar items.'),
      '#type' => 'select',
      '#options' => array('' => t('None'), 'type' => t('Based on Content Type'), 'taxonomy' => t('Based on Taxonomy'), 'group' => t('Based on Organic Group')),
      '#default_value' => $this->options['colors']['legend'],
    );
    if (!module_exists('og')) {
      unset($form['colors']['legend']['#options']['group']);
    }
    $colors = $this->options['colors']['calendar_colors_type'];   
    $type_names = node_type_get_names();
    foreach ($type_names as $key => $name) {
      $form['colors']['calendar_colors_type'][$key] = array(
        '#title' => $name,
        '#type' => 'textfield',
        '#default_value' => isset($colors[$key]) ? $colors[$key] : '#ffffff',
        '#size' => 7,
        '#maxlength' => 7,
        '#element_validate' => array('calendar_validate_hex_color'),
        '#dependency' => array('edit-row-options-colors-legend' => array('type')),
        '#prefix' => '<div class="calendar-colorpicker-wrapper">',
        '#suffix' => '<div class="calendar-colorpicker"></div></div>',
        '#attributes' => array('class' => array('edit-calendar-colorpicker')),
        '#attached' => array(
          // Add Farbtastic color picker.
          'library' => array(
            array('system', 'farbtastic'),
          ),
          // Add javascript to trigger the colorpicker.
          'js' => array(drupal_get_path('module', 'calendar') . '/js/calendar_colorpicker.js'),
        ),
      );
    }

    $vocab_field_options = array();
    $fields = $this->display->handler->get_option('fields');
    foreach ($fields as $name => $field) {
      if (!empty($field['type']) && $field['type'] == 'taxonomy_term_reference_link') {
        $vocab_field_options[$field['field']] = $field['field'];
      }
    }
    $form['colors']['taxonomy_field'] = array(
      '#title' => t('Term field'),
      '#type' => !empty($vocab_field_options) ? 'select' : 'hidden',
      '#default_value' => $this->options['colors']['taxonomy_field'],
      '#description' => t("Select the taxonomy term field to use when setting stripe colors."),
      '#options' => $vocab_field_options,
      '#dependency' => array('edit-row-options-colors-legend' => array('taxonomy')),
      );
    if (empty($vocab_field_options)) {
      $form['colors']['taxonomy_field']['#options'] = array('' => '');
      $form['colors']['taxonomy_field']['#suffix'] = t('You must add a term field to this view to use taxonomy stripe values.');
    }

    $taxonomies = taxonomy_get_vocabularies();
    $options = array();
    foreach ($taxonomies as $vid => $vocab) {
      $options[$vid] = $vocab->name;
    }
    $vocabularies = $this->options['colors']['calendar_colors_vocabulary'];
    $form['colors']['calendar_colors_vocabulary'] = array(
      '#title' => t('Vocabulary Legend Types'),
      '#type' => 'checkboxes',
      '#default_value' => isset($vocabularies) ? $vocabularies : array(),
      '#multiple' => TRUE,
      '#options' => $options,
      '#description' => t('Select vocabularies to use for setting calendar legend colors by taxonomy term. This works best for vocabularies with only a limited number of possible terms.'),
      '#dependency' => array('edit-row-options-colors-legend' => array('taxonomy')),
      '#access' => !empty($vocab_field_options),
    );

    $vocabularies = (array) $this->options['colors']['calendar_colors_vocabulary'];
    $term_colors = $this->options['colors']['calendar_colors_taxonomy'];
    foreach ($vocabularies as $vid) {
      $vocab = taxonomy_get_tree($vid);
      foreach ($vocab as $tid => $term) {
        $form['colors']['calendar_colors_taxonomy'][$term->tid] = array(
          '#title' => t($term->name),
          '#type' => 'textfield',
          '#default_value' => isset($term_colors[$term->tid]) ? $term_colors[$term->tid] : '#ffffff',
          '#size' => 7,
          '#maxlength' => 7,
          '#access' => !empty($vocab_field_options),
          '#dependency' => array('edit-row-options-colors-legend' => array('taxonomy')),
          '#element_validate' => array('calendar_validate_hex_color'),
          '#prefix' => '<div class="calendar-colorpicker-wrapper">',
          '#suffix' => '<div class="calendar-colorpicker"></div></div>',
          '#attributes' => array('class' => array('edit-calendar-colorpicker')),
          '#attached' => array(
            // Add Farbtastic color picker.
            'library' => array(
              array('system', 'farbtastic'),
            ),
            // Add javascript to trigger the colorpicker.
            'js' => array(drupal_get_path('module', 'calendar') . '/js/calendar_colorpicker.js'),
          ),
        );
      }
    }
    if (module_exists('og')) {
      $colors_group = $this->options['colors']['calendar_colors_group'];
      $groups = og_get_all_group();
      foreach ($groups as $gid){
        $form['colors']['calendar_colors_group'][$gid] = array(
  	      '#title' => t(og_label($gid)),
  	      '#type' => 'textfield',
  	      '#default_value' => isset($colors_group[$gid]) ? $colors_group[$gid] : '#ffffff',
          '#dependency' => array('edit-row-options-colors-legend' => array('group')),
          '#element_validate' => array('calendar_validate_hex_color'),
          '#prefix' => '<div class="calendar-colorpicker-wrapper">',
          '#suffix' => '<div class="calendar-colorpicker"></div></div>',
          '#attributes' => array('class' => array('edit-calendar-colorpicker')),
          '#attached' => array(
            // Add Farbtastic color picker.
            'library' => array(
              array('system', 'farbtastic'),
            ),
            // Add javascript to trigger the colorpicker.
            'js' => array(drupal_get_path('module', 'calendar') . '/js/calendar_colorpicker.js'),
          ),
  	    );
  	  }  
    }  
  }

  function options_submit(&$form, &$form_state) {
    parent::options_submit($form, $form_state);
    if (!empty($form_state['values']['row_options']['calendar_date_link'])) {
      $path = $this->view->display_handler->get_option('path');
      variable_set('calendar_date_link_' . $form_state['values']['row_options']['calendar_date_link'], $path);
    }
  }

  function pre_render($values) {

    // @TODO When the date is coming in through a relationship, the nid
    // of the view is not the right node to use, then we need the related node.
    // Need to sort out how that should be handled.

    // Preload each node used in this view from the cache.
    // Provides all the node values relatively cheaply, and we don't
    // need to do it repeatedly for the same node if there are
    // multiple results for one node.
    $nids = array();
    foreach ($values as $row) {
      // Use the $nid as the key so we don't create more than one value per node.
      $nid = $row->{$this->field_alias};
      $nids[$nid] = $nid;
    }
    if (!empty($nids)) {
      $this->nodes = node_load_multiple($nids);
    }

    // Let the style know if a link to create a new date is required.
    $this->view->date_info->calendar_date_link = $this->options['calendar_date_link'];

    // Identify the date argument and fields that apply to this view.
    // Preload the Date Views field info for each field, keyed by the
    // field name, so we know how to retrieve field values from the cached node.
    $data = date_views_fields('node');
    $data = $data['name'];
    $date_fields = array();
    foreach ($this->view->argument as $handler) {
      if (date_views_handler_is_date($handler, 'argument')) {
        // If this is the complex Date argument, the date fields are stored in the handler options, 
        // otherwise we are using the simple date field argument handler.
        if ($handler->definition['handler'] != 'date_views_argument_handler') {
          $alias = $handler->table_alias . '.' . $handler->field;
          $info = $data[$alias];
          $field_name  = str_replace(array('_value2', '_value'), '', $info['real_field_name']);
          $date_fields[$field_name] = $info;
        }
        else {
          foreach ($handler->options['date_fields'] as $alias) {
            $info = $data[$alias];
            $field_name  = str_replace(array('_value2', '_value'), '', $info['real_field_name']);
            $date_fields[$field_name] = $info;
          }
        }
        $this->date_argument = $handler;
        $this->date_fields = $date_fields;
      }
    }
  }

  function render($row) {
    global $base_url;
    $date_info = $this->date_argument->view->date_info;

    $nid = $row->{$this->field_alias};
    if (!is_numeric($nid)) {
      return;
    }

    // Load the specified node:
    // We have to clone this or nodes on other views on this page,
    // like an Upcoming block on the same page as a calendar view, 
    // will end up acquiring the values we set here. 
    $node = clone($this->nodes[$nid]);
    if (empty($node)) {
      return;
    }

    // There could be more than one date field in a view 
    // so iterate through all of them to find the right values
    // for this view result.
    $rows = array();
    foreach ($this->date_fields as $field_name => $info) {

      $table_name  = $info['table_name'];
      $delta_field = $info['delta_field'];
      $tz_handling = $info['tz_handling'];
      $tz_field    = $info['timezone_field'];
      $rrule_field = $info['rrule_field'];
      $is_field    =  $info['is_field'];
     
      // Retrieve the field value that matched our query from the cached node.
      // Find the date and set it to the right timezone.  
   
      $item = $node->$field_name;
      $node->date_id = array();
      $item_start_date = NULL;
      $item_end_date   = NULL;

      $db_tz   = date_get_timezone_db($tz_handling, isset($item->$tz_field) ? $item->$tz_field : $date_info->display_timezone_name);
      $to_zone = date_get_timezone($tz_handling, isset($item->$tz_field) ? $item->$tz_field : $date_info->display_timezone_name);
      $granularity = 'second';
      $increment = 1;

      if ($is_field) {

        // @TODO Not sure if this is the correct way to retrieve the right language value, but I think so.
        $lang = $node->language;
        $delta = isset($row->$delta_field) ? $row->$delta_field : 0;
        $item = array_key_exists($lang, $item) ? $item[$lang][$delta] : $item['und'][$delta];

        // Set the date_id for the node, used to identify which field value to display for
        // fields that have multiple values. The theme expects it to be an array.
        $node->date_id = array('calendar.' . $node->nid . '.' . $field_name . '.' . $delta);
     
        if (!empty($item['value'])) {
          $item_start_date = new dateObject($item['value'], $db_tz);
          $item_end_date   = array_key_exists('value2', $item) ? new dateObject($item['value2'], $db_tz) : $item_start_date;
        }

        $cck_field = field_info_field($field_name);
        $instance = field_info_instance($this->view->base_table, $field_name, $node->type);
        $granularity = date_granularity_precision($cck_field['settings']['granularity']);
        $increment = $instance['widget']['settings']['increment'];

      }
      elseif (!$is_field && !empty($item)) {
        $item_start_date = new dateObject($item, $db_tz);
        $item_end_date   = $item_start_date;
        $node->date_id = array('calendar.' . $node->nid . '.' . $field_name . '.0');
      }
      
      // If we don't have date value, go no further.
      if (empty($item_start_date)) {
        return;
      }

      // Set the item date to the proper display timezone;      
      $item_start_date->setTimezone(new dateTimezone($to_zone));
      $item_end_date->setTimezone(new dateTimezone($to_zone));

      $event = new stdClass();
      $event->nid = $node->nid;
      $event->title = $node->title;
      $event->type = $node->type;
      $event->date_start = $item_start_date;
      $event->date_end = $item_end_date;
      $event->db_tz = $db_tz;
      $event->to_zone = $to_zone;
      $event->granularity = $granularity;
      $event->increment = $increment;
      $event->field = $is_field ? $item : NULL;
      $event->row = $row;
      $event->node = $node;

      // All calendar row plugins should provide a date_id that the theme can use.
      $event->date_id = $node->date_id[0];
      
      $nodes = $this->explode_values($event);
      foreach ($nodes as $node) {
        switch ($this->options['colors']['legend']) {
          case 'type':
            $this->calendar_node_type_stripe($node);
            break;
          case 'taxonomy':
            $this->calendar_node_taxonomy_stripe($node);
            break;
          case 'group':
            $this->calendar_node_group_stripe($node);
            break;
        }
        $rows[] = $node;
      }

    }
    return $rows;
  }

  function explode_values($event) {
    $rows = array();

    $date_info = $this->date_argument->view->date_info;    
    $item_start_date = $event->date_start;
    $item_end_date = $event->date_end;
    $to_zone = $event->to_zone;
    $db_tz = $event->db_tz;
    $granularity = $event->granularity;
    $increment = $event->increment;

    // Now that we have a 'node' for each view result, we need 
    // to remove anything outside the view date range,
    // and possibly create additional nodes so that we have a 'node' 
    // for each day that this item occupies in this view.
    $now = max($date_info->min_zone_string, $item_start_date->format(DATE_FORMAT_DATE));
    $to  = min($date_info->max_zone_string, $item_end_date->format(DATE_FORMAT_DATE));
    $next = new DateObject($now . ' 00:00:00', $date_info->display_timezone);
    if ($date_info->display_timezone_name != $to_zone) {
      // Make $start and $end (derived from $node) use the timezone $to_zone, just as the original dates do.
      date_timezone_set($next, timezone_open($to_zone));
    }
    if (empty($to) || $now > $to) {
      $to = $now;
    }
    // $now and $next are midnight (in display timezone) on the first day where node will occur.
    // $to is midnight on the last day where node will occur.
    // All three were limited by the min-max date range of the view.
    $pos = 0;
    while (!empty($now) && $now <= $to) {
      $node = clone($event);
      $node->url = url('node/' . $node->nid, array('absolute' => TRUE));

      // Get start and end of current day.
      $start = $next->format(DATE_FORMAT_DATETIME);
      date_modify($next, '+1 day');
      date_modify($next, '-1 second');
      $end = $next->format(DATE_FORMAT_DATETIME);

      // Get start and end of item, formatted the same way.
      $item_start = $item_start_date->format(DATE_FORMAT_DATETIME);
      $item_end = $item_end_date->format(DATE_FORMAT_DATETIME);

      // Get intersection of current day and the node value's duration (as strings in $to_zone timezone).
      $node->calendar_start = $item_start < $start ? $start : $item_start;
      $node->calendar_end = !empty($item_end) ? ($item_end > $end ? $end : $item_end) : $node->calendar_start;
      
      // Make date objects
      $node->calendar_start_date = date_create($node->calendar_start, timezone_open($to_zone));
      $node->calendar_end_date = date_create($node->calendar_end, timezone_open($to_zone));

      // Change string timezones into 
      // calendar_start and calendar_end are UTC dates as formatted strings
      $node->calendar_start = date_format($node->calendar_start_date, DATE_FORMAT_DATETIME);
      $node->calendar_end = date_format($node->calendar_end_date, DATE_FORMAT_DATETIME);
      $node->calendar_all_day = date_is_all_day($node->calendar_start, $node->calendar_end, $granularity, $increment);

      // Change string timezones into 
      // calendar_start and calendar_end are UTC dates as formatted strings
      $node->calendar_start = date_format($node->calendar_start_date, DATE_FORMAT_DATETIME);
      $node->calendar_end = date_format($node->calendar_end_date, DATE_FORMAT_DATETIME);

      unset($node->calendar_fields);
      if (isset($node) && (empty($node->calendar_start))) {
        // if no date for the node and no date in the item
        // there is no way to display it on the calendar
        unset($node);
      }
      else {
        $node->date_id .= '.' . $pos;
        
        $rows[] = $node;
        unset($node);
      }
      date_modify($next, '+1 second');
      $now = date_format($next, DATE_FORMAT_DATE);  
      $pos++;    

    }
    return $rows;
  }

  /**
   * Create a stripe base on node type.
   */
  function calendar_node_type_stripe(&$node) {
    $colors = isset($this->options['colors']['calendar_colors_type']) ? $this->options['colors']['calendar_colors_type'] : array();
    if (empty($colors)) {
      return;
    }
    if (empty($node->type)) {
      return;
    }
  
    $type_names = node_type_get_names();
    $type = $node->type;
    if (!(isset($node->stripe))) {
      $node->stripe = array();
      $node->stripe_label = array();
    }  
    if (array_key_exists($type, $type_names)) {
      $label = $type_names[$type];
    }
    if (array_key_exists($type, $colors)) {
      $stripe = $colors[$type];
    }
    else {
      $stripe = '';
    }
  
    $node->stripe[] = $stripe;
    $node->stripe_label[] = $label;
    $GLOBALS['calendar_stripe_labels'][][$type] = array('stripe' => $stripe, 'label' => $label);
    return $stripe;
  }
  
   /**
   * Create a stripe based on a taxonomy term.
   */
  
  function calendar_node_taxonomy_stripe(&$event) {
    $term_colors = isset($this->options['colors']['calendar_colors_taxonomy']) ? $this->options['colors']['calendar_colors_taxonomy'] : array();
    if (empty($term_colors)) {
      return;
    }
  
    $node = $event->node;
    $terms = array();
    if ($this->options['colors']['legend'] == 'taxonomy') {
      $term_field_name = $this->options['colors']['taxonomy_field'];
      $term_field = $node->$term_field_name;
      foreach ($term_field as $lang => $items) {
        if ($lang == $node->language) {
          foreach ($items as $item) {
            $terms[] = $item['tid'];
          }
        }
      }
    }  
  
    if (empty($terms)) {
      return;
    }
  
    if (!(isset($event->stripe))) {
      $event->stripe = array();
      $event->stripe_label = array();
    }
    if (count($terms)) {
      foreach ($terms as $tid) {
        $term_for_node = taxonomy_term_load($tid);
        if (!array_key_exists($term_for_node->tid, $term_colors)) {
          continue;
        }
        $stripe = $term_colors[$term_for_node->tid];
        $stripe_label = $term_for_node->name;
        $event->stripe[] = $stripe;
        $event->stripe_label[] = $stripe_label;
        $GLOBALS['calendar_stripe_labels'][][$term_for_node->tid] = array('stripe' => $stripe, 'label' => $stripe_label);
      }
    }
    else {
      $event->stripe[] = '';
      $event->stripe_label[] = '';
    } 

    return;
  }
  
  /**
   * Create a stripe based on group.
   */
  function calendar_node_group_stripe(&$node) {
    $colors_group = isset($this->options['colors']['calendar_colors_group']) ? $this->options['colors']['calendar_colors_group'] : array();
    if (empty($colors_group)) {
      return;
    }
    if (!function_exists('og_get_entity_groups')) {
      return;
    }
    $groups_for_node = og_get_entity_groups('node', $node);
    if(!(isset($node->stripe))){
      $node->stripe = array();
      $node->stripe_label = array();
    }
    if (count($groups_for_node)){
      foreach($groups_for_node as $gid => $group_name){
        if (!array_key_exists($gid, $colors_group)) {
          continue;
        }
        $stripe = $colors_group[$gid];
        $stripe_label = $group_name;
        $node->stripe[] = $stripe;
        $node->stripe_label[] = $stripe_label;
        $GLOBALS['calendar_stripe_labels'][][$gid] = array('stripe' => $stripe, 'label' => $stripe_label);
      }
    }
    else {
      $node->stripe[] = '';
      $node->stripe_label[] = '';
    } 
    return $stripe;
  }
}

