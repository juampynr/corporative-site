<?php

/**
 * @file
 * Theme functions for the Calendar module.
 */
/**
 * Implements hook_preprocess_date_views_pager().
 *
 * Creates a calendar_links array which is stored in the session and used
 * in calendar_menu_local_tasks_alter() to display the links as action items and dynamic tabs.
 * The links can be altered or deleted using hook_calendar_links_alter().
 *
 */
function calendar_preprocess_date_views_pager(&$vars) {
  $view = $vars['plugin']->view;
  if ($view->plugin_name != 'calendar_style') {
    return;
  }
  $options = $view->style_options;
  
  // If we're not on a view with a path (a page), no links are needed.
  $current_path = !empty($view->display_handler->options['path']) ? $view->display_handler->options['path'] : '';
  if (empty($current_path)) {
    return;
  }

  // Find all the displays in this view that use the calendar style and have a path and create links to each.
  $calendar_links[$current_path] = array();
  $base = array('attributes' => array('rel' => 'nofollow'));
  foreach($view->display as $id => $display) {
    // Check for !empty() in case the view is not fully formed or has displays that are marked to be deleted.
    if (!empty($display->deleted) || empty($display->display_options['style_plugin'])) {
      continue;
    }
    if ($display->display_options['style_plugin'] == 'calendar_style' && !empty($display->display_options['path'])) {
      $path = $display->display_options['path'];
      $title = $display->display_title;
      $type = !empty($display->display_options['style_options']['calendar_type']) ? $display->display_options['style_options']['calendar_type'] : 'month';

      // Make sure the links to other calendar displays use the right path for that display.
      // Get rid of pager links when swapping between displays to force the base argument 
      // to be structured correctly for the type of display. This means you can't use
      // these links in a block or panel.
      $href = str_replace($current_path, $path, date_pager_url($view, $type, NULL, TRUE, FALSE));
      $part_path = substr($href,strlen(base_path()));

      // Once we have a path for the links to other displays, add it to our links array.
      $calendar_links[$current_path]['tabs'][$type] = array('title' => $title, 'path' => $part_path);
      $calendar_links[$current_path]['types'][] = $type;
    }
  }

  // If an 'Add new ... link is provided, add it here.
  if (!empty($view->date_info->calendar_date_link) && !empty($view->date_info->url)
  && (user_access("administer nodes") || user_access('create '. $view->date_info->calendar_date_link .' content'))) {
    $name = node_type_get_name($view->date_info->calendar_date_link);
    $href = 'node/add/' . str_replace('_', '-', $view->date_info->calendar_date_link);
    $calendar_links[$current_path]['actions'][] = array('title' => t('Add @name', array('@name' => $name)), 'path' => $href);
  }

  // Pass this through drupal_alter() so it can be adjusted in custom code or in the theme.
  drupal_alter('calendar_links', $calendar_links);

  // Add the value to the session so it can be used to create the tabs.
  $_SESSION['calendar_links'][$current_path] = $calendar_links[$current_path];

}

/**
 * Preprocess an RSS feed
 */
function template_preprocess_calendar_style(&$vars) {
  global $base_url;
  global $language;

}

/**
 * Display a month view.
 */
function template_preprocess_calendar_month(&$vars) {
  $view = $vars['view'];
  $rows = $vars['rows'];
  if (empty($rows)) {
    $rows = array();
    $day_names = array();
  } 
  elseif (sizeof($rows) > 1) {
    $day_names = array_shift($rows);
  }
  else {
    $day_names = $rows;
    $rows = array();
  }

  $month_rows = $rows;
  foreach ($rows as $weekno => $row) {
    foreach ($row as $day => $data) {
      $cell = $data['data'];

      // If this cell is already rendered, like the weekno column,
      // move to the next item.
      if (!is_array($cell)) {
        $month_rows[$weekno][$day]['data'] = $cell;
        continue;
      }
      $data = $cell['datebox'];
      if ($cell['empty']) {
        $data .= $cell['empty'];
      }
      else {
        $data .= implode($cell['all_day']);
        foreach ($cell['items'] as $hour => $item) {
          $data .= implode($item);
        }
        $data .= $cell['link'];
      }
      if ($view->date_info->mini) {
        $month_rows[$weekno][$day]['data'] = $data;
      }
      else {
        $month_rows[$weekno][$day]['data'] = '<div class="inner">' . $data . '</div>';
      }
    }
  }

  $vars['rows'] = $month_rows;
  $vars['day_names'] = $day_names;

  $vars['display_type'] = $view->date_info->granularity;
  $vars['min_date_formatted'] = date_format($view->date_info->min_date, DATE_FORMAT_DATETIME);
  $vars['max_date_formatted'] = date_format($view->date_info->max_date, DATE_FORMAT_DATETIME);
}

/**
 * Display a mini month view.
 */
function template_preprocess_calendar_mini(&$vars) {
  // Add in all the $vars added by the main calendar preprocessor.
  template_preprocess_calendar_month($vars);

  $view = $vars['view'];

  // Make sure that the calendar title links go to the month view, 
  // not the year view (if this is embedded in a year display).
  $view->override_path =  calendar_granularity_path($view, 'month');  
    
  $view->date_info->show_title = !empty($view->date_info->show_title) ? $view->date_info->show_title : FALSE;
  $vars['show_title'] = $view->date_info->show_title;
  $vars['view'] = $view;
}

/**
 * Display a year view.
 */
function template_preprocess_calendar_year(&$vars) {

  // Construct a calendar for each month, adjusting the $view passed 
  // to the theme so it will produce the right results.  
  $view = clone($vars['view']);
  $year = date_format($view->date_info->min_date, 'Y');
  $view->date_info->style_with_weekno = FALSE;
  $rows = $vars['rows'];
  $months = array();
  foreach ($rows as $month => $month_rows) {
    $view->date_info->month = $month;
    $view->date_info->granularity = 'month';
    $view->date_info->mini = TRUE;
    $view->date_info->hide_nav = TRUE;
    $view->date_info->show_title = TRUE;
    $view->date_info->url = date_pager_url($view, NULL, date_pad($year, 4) . '-' . date_pad($month));
    $view->date_info->min_date = new DateObject($view->date_info->year . '-' . date_pad($month) . '-01 00:00:00', date_default_timezone());
    $view->date_info->max_date = clone($view->date_info->min_date);
    date_modify($view->date_info->max_date, '+1 month');
    date_modify($view->date_info->max_date, '-1 second');
    $variables = array(
      'view' => $view, 
      'options' => $vars['options'], 
      'rows' => $month_rows,
    );
    $months[$month] = theme('calendar_mini', $variables);
  }
  $vars['months'] = $months;
  $vars['view']->date_info->hide_nav = FALSE;
  $vars['view']->date_info->granularity = 'year';
  $vars['mini'] = $view->date_info->mini;

}

/**
 * Display a day overlap view.
 */
function template_preprocess_calendar_day_overlap(&$vars) {
  template_preprocess_calendar_day($vars);
}

/**
 * Display a day view.
 */
function template_preprocess_calendar_day(&$vars) {
  $vars['view']->style_with_weekno = FALSE;
  $view = $vars['view'];
  $rows = $vars['rows'];

  $item_count = 0;
  $by_hour_count = 0;
  $grouping_field = !empty($view->date_info->style_groupby_field) ? ($view->date_info->style_groupby_field - 1) : NULL;
  $display_overlap = !empty($view->date_info->style_theme_style) && !empty($view->date_info->style_groupby_times);

  // Add optional css
  if ($display_overlap) {
    $overlapped_items = array();
    drupal_add_css(drupal_get_path('module', 'calendar')  .'/css/calendar-overlap.css');
    if (empty($view->live_preview)) {
      drupal_add_js(drupal_get_path('module', 'calendar') . '/js/calendar_overlap.js');
    }
  }

  // If we're not grouping by time, move all items into the 'all day' array.
  if (empty($view->date_info->style_groupby_times)) {
    // Items are already grouped into times, so we need to process each time-group.
    foreach ($rows['items'] as $time => $items) {
      foreach ($items as $item) {
        $rows['all_day'][] = $item;
      }
    }
    $rows['items'] = array();
  }

  $columns = array();

  // Move all_day items into the right columns and render them.
  $grouped_items = array();
  foreach ($rows['all_day'] as $item) {
    if (!empty($item->rendered_fields[$grouping_field])) {
      $column = $item->rendered_fields[$grouping_field];        
      unset($item->rendered_fields[$grouping_field]); // Remove the grouping field from the results.
      if (!in_array($column, $columns)) {
        $columns[] = $column;
      }
    }
    else {
      $column = t('Items');
    }
    $grouped_items[$column][] = theme('calendar_item', array('view' => $view, 'rendered_fields' => $item->rendered_fields, 'item' => $item));
    $item_count++;
  }
  $vars['rows']['all_day'] = $grouped_items;

  // Moved timed items into the right columns and render them.
  $start_times = $view->date_info->style_groupby_times;
  $show_empty_times = $view->date_info->style_show_empty_times; 
  $end_start_time = '23:59:59';
  $start_time = array_shift($start_times);
  $next_start_time = count($start_times) ? array_shift($start_times) : $end_start_time;

  $grouped_items = array();
  foreach ($rows['items'] as &$items) {
    foreach ($items as &$item) {
      $time = date_format($item->calendar_start_date, 'H:i:s');
      if (!empty($item->rendered_fields[$grouping_field])) {
        $column = $item->rendered_fields[$grouping_field];
        unset($item->rendered_fields[$grouping_field]); // Remove the grouping field from the results.
        if (!in_array($column, $columns)) {
          $columns[] = $column;
        }
      }
      else {
        $column = t('Items');
      }
      // Find the next time slot and fill it. Populate the skipped
      // slots if the option to show empty times was chosen.
      while ($time >= $next_start_time && $time < $end_start_time) {
        if ((!empty($show_empty_times) || $display_overlap) && !array_key_exists($start_time, $grouped_items)) {
          $grouped_items[$start_time]['values'] = array();        
        }
        $start_time = $next_start_time;
        $next_start_time = count($start_times) ? array_shift($start_times) : $end_start_time;
      }
      $grouped_items[$start_time]['values'][$column][] = $item;
      if ($display_overlap) {
        $time_end = date_format($item->calendar_end_date, 'H:i:s');
        $item->time_start = $time;
        $item->time_end = $time_end; 
        _calc_indents($overlapped_items, $time, $time_end, $item);
      }
      $item_count++;
      $by_hour_count++;
    }
  }

  // Finish out the day's time values if we want to see empty times.
  if (!empty($show_empty_times) || $display_overlap) {
    while ($start_time < $end_start_time && (!empty($start_time) || $display_overlap)) {
      if (empty($start_time)) {
        $start_times = $view->date_info->style_groupby_times;
        $start_time = array_shift($start_times);
        $next_start_time = array_shift($start_times);
      }
      if (!array_key_exists($start_time, $grouped_items)) {
        $grouped_items[$start_time]['values'] = array();        
      }
      $start_time = $next_start_time;
      $next_start_time = count($start_times) ? array_shift($start_times) : $end_start_time;
    }
  }

  // Do the headers last, once we know what the actual values are.
  $i = 0;
  $start_times = array_keys($grouped_items);
  foreach ($start_times as $start_time) {
    $next_start_time = array_key_exists($i + 1, $start_times) ? $start_times[$i + 1] : '23:59:59';
    $variables = array(
      'start_time' => $start_time, 
      'next_start_time' => $next_start_time, 
      'curday_date' => $rows['date'],
    );
    $heading = theme('calendar_time_row_heading', $variables);
    $grouped_items[$start_time]['hour'] = $heading['hour'];
    $grouped_items[$start_time]['ampm'] = $heading['ampm']; 
    foreach ($grouped_items[$start_time]['values'] as $column => &$items) {
      foreach ($items as $index => &$item) {
        if ($display_overlap) {
          $offset = round(date_format($item->calendar_start_date, 'i') / 15);
          $end = new DateObject('1970-01-01 ' . $item->time_end);
          $start = new DateObject('1970-01-01 ' . $item->time_start);
          $duration = $end->difference($start);
          $duration = round($duration / (15 * 60));
          $item->class = 'd_'. $duration . ' o_'. $offset . ' i_' . $item->indent . ' md_' . min($item->max_depth, 5);
        }
        $grouped_items[$start_time]['values'][$column][$index] = theme('calendar_item', array('view' => $view, 'rendered_fields' => $item->rendered_fields, 'item' => $item));
      } 
    }
    $i++;      
  }
  ksort($grouped_items);
  $vars['rows']['items'] = $grouped_items;

  if (empty($columns)) {
    $columns = array(t('Items'));
  }
  $vars['columns'] = $columns;

  $vars['agenda_hour_class'] = 'calendar-agenda-hour';
  $first_column_width = 10;

  if (empty($view->date_info->style_groupby_times)) {
    $vars['agenda_hour_class'] .= ' calendar-agenda-no-hours';
    $first_column_width = 1;
  }

  $vars['first_column_width'] = $first_column_width;
  if (count($columns)) {
    $vars['column_width'] = round((100 - $first_column_width)/count($columns));
  }
  else {
    $vars['column_width'] = (100 - $first_column_width);
  }
  $vars['item_count'] = $item_count;
  $vars['by_hour_count'] = $by_hour_count;
  $vars['start_times'] = $view->date_info->style_groupby_times;
  return;
}

/**
 * Display a week overlap view.
 */
function template_preprocess_calendar_week_overlap(&$vars) {
  template_preprocess_calendar_week($vars);
}

/**
 * Display a week view.
 */
function template_preprocess_calendar_week(&$vars) {
  $vars['view']->style_with_weekno = FALSE;

  $view = $vars['view'];
  $rows = $vars['rows'];
  $item_count = 0;
  $by_hour_count = 0;
  $start_time = NULL;
  $columns = array();

  if (sizeof($rows) > 1) {
    $day_names = array_shift($rows);
  }
  else {
    $day_names = $rows;
    $rows = array();
  }

  // Moved timed items into the right columns and render them.
  $show_empty_times = $view->date_info->style_show_empty_times; 
  $end_start_time = '23:59:59';

  $grouped_items = array();

  // pass the multiday buckets
  $vars['all_day'] = $rows['multiday_buckets'];

  // Remove the count for singleday
  $vars['multiday_rows'] = max(0, $rows['total_rows'] - 1); 
  $display_overlap = ($view->date_info->style_multiday_theme == '1' && $view->date_info->style_theme_style == '1');
  $vars['display_overlap'] = $display_overlap;

  // Add optional css
  if ($display_overlap) {
    drupal_add_css(drupal_get_path('module', 'calendar')  .'/css/calendar-overlap.css');
    if (empty($view->live_preview)) {
      drupal_add_js(drupal_get_path('module', 'calendar') . '/js/calendar_overlap.js');
    }
    $overlapped_items = array( array(), array(), array(), array(), array(), array(), array());

    // Locate the first item
    $first_time = '23:59:59';
    $first_time_index = -1;
    for ($i = 0; $i < 7; $i++) {
      if (count($rows['singleday_buckets'][$i]) > 0) {
        $time_slot = reset($rows['singleday_buckets'][$i]);
        $time = date_format($time_slot[0]['item']->date_start, 'H:i:s');
        if ($time < $first_time) {
          $first_time = $time;
          $first_time_index = $i;
        }
      } 
    }
    if ($first_time_index > -1) {
      $rows['singleday_buckets'][$first_time_index][$first_time][0]['is_first'] = TRUE;
    }
  }

  // If we're not grouping by time, move all items into the 'all day' array.
  if (empty($view->date_info->style_groupby_times)) {
    $add_row = FALSE;
    foreach ($vars['all_day'] as $index => &$day ) {
      foreach ($rows['singleday_buckets'][$index] as $item) {
        foreach ($item as $event) {
          $day[] = $event;
          $add_row = TRUE;
        }
      }
    }
    if ( $add_row ) {
      $vars['multiday_rows']++; 
    }
  } 
  else {
    foreach ($rows['singleday_buckets'] as $wday => $singleday_row) {
      $columns[] = $wday;
      foreach ($singleday_row as &$row) {
        $start_times = $view->date_info->style_groupby_times;
        $start_time = array_shift($start_times);
        $next_start_time = count($start_times) ? array_shift($start_times) : $end_start_time;
        foreach ($row as &$item) {
          $time = date_format($item['item']->date_start, 'H:i:s');
          if ($item['item']->calendar_all_day || ($item['item']->date_start == $item['item']->date_end)) {
            $vars['all_day'][$item['wday']][] = $item;
            if ($vars['multiday_rows'] == 0) {
              $vars['multiday_rows']++;
            }
          } 
          else {
            // Find the next time slot and fill it. Populate the skipped
            // slots if the option to show empty times was chosen.
            while ($time >= $next_start_time && $time < $end_start_time) {
              if (($show_empty_times || $display_overlap) && !array_key_exists($start_time, $grouped_items)) {
                $grouped_items[$start_time]['values'][$wday] = array();   
              }
              $start_time = $next_start_time;
              $next_start_time = count($start_times) ? array_shift($start_times) : $end_start_time;
            }
            $grouped_items[$start_time]['values'][$wday][] = &$item; 
            if ($display_overlap) {
              $date_end = date_format($item['item']->date_end, 'H:i:s');
              _calc_indents($overlapped_items[$wday], $time, $date_end, $item);
            }
            $item_count++; 
            $by_hour_count++;
          }
        }
      }
      // Finish out the day's time values if we want to see empty times.
      if ($show_empty_times || $display_overlap) {
        while ($start_time < $end_start_time && ($start_time != NULL || $display_overlap)) {
          if ($start_time == NULL) {
            $start_times = $view->date_info->style_groupby_times;
            $start_time = array_shift($start_times);
            $next_start_time = array_shift($start_times);
          }
          if (!array_key_exists($start_time, $grouped_items)) {
            $grouped_items[$start_time]['values'][$wday] = array();        
          }
          $start_time = $next_start_time;
          $next_start_time = count($start_times) ? array_shift($start_times) : $end_start_time;
        }
      }
      ksort($grouped_items);
    }
  }

  // Do the headers last, once we know what the actual values are.
  $i = 0;
  $start_times = array_keys($grouped_items);
  foreach ($start_times as $start_time) {
    $next_start_time = array_key_exists($i + 1, $start_times) ? $start_times[$i + 1] : '23:59:59';
    $variables = array(
      'start_time' => $start_time, 
      'next_start_time' => $next_start_time, 
      'curday_date' => (isset($row['data'])) ? $row['data']['date'] : NULL,
    );
    $heading = theme('calendar_time_row_heading', $variables);
    $grouped_items[$start_time]['hour'] = $heading['hour'];
    $grouped_items[$start_time]['ampm'] = $heading['ampm'];
    $grouped_items[$start_time]['time'] = $start_time;
    if ($display_overlap) {
      foreach ($grouped_items[$start_time]['values'] as $wday => &$items) {
        foreach ($items as &$item) {
          if ($display_overlap) {
            $offset = round(date_format($item['item']->date_start, 'i') / 15);
            $duration = $item['item']->date_end->format('U') - $item['item']->date_start->format('U');
            $duration = round($duration / (15 * 60));
            $item['class'] = 'd_'. $duration . ' o_'. $offset . ' i_' . $item['indent'] . ' md_' . min($item['max_depth'], 5);
          }
        } 
      }
    }
  }

  $vars['items'] = $grouped_items;  

  $vars['day_names'] = $day_names;
  $vars['columns'] = $columns;
  $vars['start_times'] = $view->date_info->style_groupby_times;
  $vars['first_time'] = !empty($first_time) ? $first_time : '';

  $vars['agenda_hour_class'] = 'calendar-agenda-hour';
  $first_column_width = 10;

  if (empty($view->date_info->style_groupby_times)) {
    $vars['agenda_hour_class'] .= ' calendar-agenda-no-hours';
    $first_column_width = 1;
  }
  $vars['item_count'] = $item_count;
  $vars['by_hour_count'] = $by_hour_count;
  return;
}

/**
 * Create the calendar date box.
 */
function template_preprocess_calendar_datebox(&$vars) {
  $date = $vars['date'];
  $view = $vars['view'];
  $vars['day'] = intval(substr($date, 8, 2));
  $force_view_url = !empty($view->date_info->block) ? TRUE : FALSE;
  $month_path = calendar_granularity_path($view, 'month');
  $year_path = calendar_granularity_path($view, 'year');
  $day_path = calendar_granularity_path($view, 'day');
  $vars['url'] = str_replace(array($month_path, $year_path), $day_path, date_pager_url($view, NULL, $date, $force_view_url));
  $vars['link'] = !empty($day_path) ? l($vars['day'], $vars['url']) : $vars['day'];
  $vars['granularity'] = $view->date_info->granularity;
  $vars['mini'] = !empty($view->date_info->mini);
  if ($vars['mini']) {
    if (!empty($vars['selected'])) {
      $vars['class'] = 'mini-day-on';
    }
    else {
      $vars['class'] = 'mini-day-off';
    }
  }
  else {
    $vars['class'] = 'day';
  }
}

/**
 * Format an calendar month node for display.
 */
function template_preprocess_calendar_month_multiple_node(&$vars) {
  $view = $vars['view'];
  $curday = $vars['curday'];

  // get the year month and date
  $parts = explode('-', substr($curday, 0, 10));
  $year = $parts[0];
  $month = intval($parts[1]);
  $day = intval($parts[2]);

  // create the link to the day
  $vars['link'] = date_pager_url($view, NULL, date_pad($year, 4) .'-'. date_pad($month) .'-'. date_pad($day));
}

/**
 * Format an calendar week node for display.
 */
function template_preprocess_calendar_week_multiple_node(&$vars) {
  $view = $vars['view'];
  $curday = $vars['curday'];

  // get the year month and date
  $parts = explode('-', substr($curday, 0, 10));
  $year = $parts[0];
  $month = intval($parts[1]);
  $day = intval($parts[2]);

  // create the link to the day
  $vars['link'] = date_pager_url($view, NULL, date_pad($year, 4) .'-'. date_pad($month) .'-'. date_pad($day));
}

/**
 * Theme function for rendering views fields as a calendar 'item'.
 *
 * $vars['rendered_fields'] = An array of the rendered display of each field in the View.
 * $vars['item'] = The source data for this item.
 * $vars['view'] = The view that this item is displayed on.
 * 
 * @TODO We need some options about how to combine rendered fields.
 * Fields rendered in multiday containers need to be inline.
 */
function template_preprocess_calendar_item(&$vars) {
 
}

/**
 * Format the time row headings in the week and day view.
 */ 
function theme_calendar_time_row_heading($vars) {
  $start_time = $vars['start_time'];
  $next_start_time = $vars['next_start_time'];
  $curday_date = $vars['curday_date'];
  static $format_hour, $format_ampm;
  if (empty($format_hour)) {
    $format = variable_get('date_format_short', 'm/d/Y - H:i');
    $format_hour = str_replace(array('a', 'A'), '', date_limit_format($format, array('hour', 'minute')));
    $format_ampm = strstr($format, 'a') ? 'a' : (strstr($format, 'A') ? 'A' : '');
  }
  if ($start_time == '00:00:00' && $next_start_time == '23:59:59') {
    $hour = t('All times');
  }
  elseif ($start_time == '00:00:00') {
    $date = date_create($curday_date .' '. $next_start_time);
    $hour = t('Before @time', array('@time' => date_format($date, $format_hour)));
  }
  else {
    $date = date_create($curday_date .' '. $start_time);
    $hour = date_format($date, $format_hour);
  }
  if (!empty($date)) {
    $ampm = date_format($date, $format_ampm);
  }
  else {
    $ampm = '';
  }
  return array('hour' => $hour, 'ampm' => $ampm);
}

/**
 * Format a node stripe legend
 */
function theme_calendar_stripe_legend() {
  if (empty($GLOBALS['calendar_stripes'])) {
    return '';
  }
  $header = array(
      array('class' => 'calendar-legend', 'data' => t('Item')),
      array('class' => 'calendar-legend', 'data' => t('Key'))
      );
  $rows = array();
  $output = '';    
  foreach ((array) $GLOBALS['calendar_stripes'] as $label => $stripe) {
    if ($stripe) {
      $rows[] = array($label, '<div style="background-color:'. $stripe .';color:'. $stripe .'" class="stripe" title="Key: '. $label .'">&nbsp;</div>');
    }
  }
  if (!empty($rows)) {
    $variables = array(
      'header' => $header, 
      'rows' => $rows, 
      'attributes' => array('class' => array('mini', 'calendar-legend')),
    );
    $output .= theme('table', $variables);
    $output = '<div class="calendar legend">' . $output . '</div>';
  }
  return $output;
}

/**
 * Format item stripes
 */
function theme_calendar_stripe_stripe($vars) {
  $item = $vars['item'];
  if (empty($item->stripe) || (!count($item->stripe))) {
    return;
  }
  $output = '';
  if (is_array($item->stripe_label)) {
    foreach ($item->stripe_label as $k => $stripe_label) {
      if (!empty($item->stripe[$k]) && !empty($stripe_label)) {
        $GLOBALS['calendar_stripes'][$stripe_label] = $item->stripe[$k];
        $output .= '<div style="background-color:' . $item->stripe[$k] . ';color:' . $item->stripe[$k] . '" class="stripe" title="Key: ' . $item->stripe_label[$k] . '">&nbsp;</div>' . "\n";
      }
    }
  }
  return $output;
}

/**
 * Format an empty day on a calendar
 *
 * @param day
 *   The day to display.
 */
function theme_calendar_empty_day($vars) {
  $curday = $vars['curday'];
  $view = $vars['view'];

  if ($view->date_info->calendar_type != 'day') {
    return '<div class="calendar-empty">&nbsp;</div>' . "\n";
  }
  else {
    return '<div class="calendar-dayview-empty">' . t('Empty day') . '</div>';
  }
}

/**
 * Indent items based off a nested tree structure of overlapping items
 *
 * @param array $overlapped_items
 *   Tree of overlapped items
 * @param date $start
 *   Start time of the event
 * @param date $end
 *   End tiem of the event
 * @param array $item
 *   The event to add to the tree
 * @param int $depth
 *   Current depth of the tree
 * @return rc
 *   Returns an array with the max depth of the branch and whether an overlap occurred
 */
function _calc_indents(&$overlapped_items, $start, $end, &$item, $depth = 0) {

  // Are there any items at this depth?
  if (!empty($overlapped_items)) {

    // Iterate for each item as this depth and see if we overlap
    foreach ($overlapped_items as $index => &$entry) { 

      // We search depth-first, so if there are children for this item, recurse into
      // each child tree looking for an overlap
      if (!empty($entry['children'])) {
        $rc = _calc_indents($entry['children'], $start, $end, $item, $depth + 1);

        // Was there an overlap in the child tree?
        if ($rc['overlap']) {
          if (is_object($entry['item'])) {
            $entry['item']->indent = _calc_indent($entry['depth'], $rc['max_depth']);
            $entry['item']->max_depth = $rc['max_depth'];
          }
          else {
            $entry['item']['indent'] = _calc_indent($entry['depth'], $rc['max_depth']);
            $entry['item']['max_depth'] = $rc['max_depth'];
          }

          // There was an overlap, pop out of this depth
          return $rc;
        }
      }

      // No, child overlap, so check if we overlap this item
      if ($start >= $entry['start'] && $start <= $entry['end']) {

        // We overlap, create an overlapping entry
        $entry['children'][] = array('item' => &$item, 'depth' => $depth + 1, 'start' => $start, 'end' => $end, 'children' => array());
        if (is_object($entry['item'])) {
          $max_depth = max($entry['item']->max_depth, $depth + 1);
          $entry['item']->indent = _calc_indent($depth, $max_depth);
          $entry['item']->max_depth = $max_depth;
        }
        else {
          $max_depth = max($entry['item']['max_depth'], $depth + 1);
          $entry['item']['indent'] = _calc_indent($depth, $max_depth);
          $entry['item']['max_depth'] = $max_depth;
        }
        if (is_object($item)) {
          $item->indent = _calc_indent($depth + 1, $max_depth);
          $item->max_depth = $max_depth;
        }
        else {
          $item['indent'] = _calc_indent($depth + 1, $max_depth);
          $item['max_depth'] = $max_depth;
        }

        // We overlap, so pop out of this depth
        return array('overlap' => TRUE, 'max_depth' => $max_depth);
      }
    }

    // If there are items at this depth, but no overlap, then return no overlap and pop
    // out of this depth
    if ($depth > 0) {
      return array('overlap' => FALSE, 'max_depth' => 0);
    }
   }

  // No overlap at any depth, reset the array of overlaps
  if ($depth == 0) {
   reset($overlapped_items);
   $overlapped_items[0] = array('item' => &$item, 'depth' => $depth, 'start' => $start, 'end' => $end, 'children' => array());
  }
  else {
    $overlapped_items[] = array('item' => &$item, 'depth' => $depth, 'start' => $start, 'end' => $end, 'children' => array());
  }

  if (is_object($item)) {
    $item->indent = _calc_indent($depth, $depth);
    $item->max_depth = $depth;
  }
  else {
    $item['indent'] = _calc_indent($depth, $depth);
    $item['max_depth'] = $depth;
  }
  return array('overlap' => FALSE, 'max_depth' => $depth);
}

/**
 * Calculates the indent based of the current depth and the depth of this branch in the tree
 *
 * @param int $cur_depth
 * @param int $depth
 * @return number
 */
function _calc_indent( $cur_depth, $depth ) {
  return round(10 * $cur_depth / ($depth + 1));
}

/** @} End of addtogroup themeable */
