<?php
/**
 * @file
 * Implementation of Date Repeat API calculations for the Date field.
 *
 * Consolidated here so the code isn't parsed if repeats aren't being used
 * or processed, and to make it easier to maintain.
 *
 * The current implementation adds a repeat form to the date field so the user
 * can select the repeat rules. That selection is built into an RRULE
 * which is stored in the zero position of the field values. During widget
 * validation, the rule is parsed to see what dates it will create,
 * and multiple values are added to the field, one for each repeat date.
 * That update only happens when the rule, the start date, or the end date
 * change, no need to waste processing cycles for other changes to the node
 * values.
 *
 * Lots of possible TODOs, the biggest one is figuring out the best
 * way to handle dates with no UNTIL date since we can't add an infinite
 * number of values to the field. For now, we require the UNTIL date.
 */

/**
 * Widget processing for date repeat form element.
 *
 * Create the RRULE as a top-level element rather than a delta level
 * element, we'll compute the repeat sequence in the widget validation
 * to create the element delta values.
 */
function _date_repeat_widget(&$element, $field, $instance, $item, $delta) {
  $element['rrule'] = array(
    '#type' => 'date_repeat_rrule',
    '#theme_wrappers' => array('date_repeat_rrule'),
    '#default_value' => isset($item['rrule']) ? $item['rrule'] : '',
    '#date_timezone' => $element['#date_timezone'],
    '#date_format'      => date_limit_format(date_input_format($element, $field, $instance), $field['settings']['granularity']),
    '#date_text_parts'  => (array) $instance['widget']['settings']['text_parts'],
    '#date_increment'   => $instance['widget']['settings']['increment'],
    '#date_year_range'  => $instance['widget']['settings']['year_range'],
    '#date_label_position' => $instance['widget']['settings']['label_position'],
    '#prev_value' => isset($item['value']) ? $item['value'] : '',
    '#prev_value2' => isset($item['value2']) ? $item['value2'] : '',
    '#prev_rrule' => isset($item['rrule']) ? $item['rrule'] : '',
    '#date_repeat_widget' => str_replace('_repeat', '', $instance['widget']['type']),
    '#date_repeat_collapsed' => $instance['widget']['settings']['repeat_collapsed'],
    '#date_flexible' => 0,
  );
  return $element;
}

/**
 * Validation for date repeat form element.
 *
 * Create multiple values from the RRULE results.
 * Lots more work needed here.
 */
function _date_repeat_widget_validate($element, &$form_state) {
  $field_name = $element['#field_name'];
  $delta = $element['#delta'];
  $langcode = $element['#language'];

  // If the widget has been hidden by #access, the RRULE will still be in its
  // original string form here. Nothing to process.
  if (date_hidden_element($element)) {

    // If this was a hidden repeating date, we lost all the repeating values in the widget processing.
    // Add them back here if that happened since we are skipping the re-creation of those values.
    if (!empty($form_state['storage']['date_items'][$field_name])) {
      array_pop($element['#parents']);
      form_set_value($element, $form_state['storage']['date_items'][$field_name][$langcode], $form_state);
    }
    return;
  }

  module_load_include('inc', 'date_repeat', 'date_repeat_form');
  $field_name = $element['#field_name'];
  $field = field_widget_field($element, $form_state);
  $instance = field_widget_instance($element, $form_state);

  // Here 'values' returns an array of input values, which includes the original RRULE, as a string.
  // and 'input' returns an array of the form elements created by the repeating date widget, with
  // RRULE values as an array of the selected elements and their chosen values.
  $item = drupal_array_get_nested_value($form_state['values'], $element['#parents'], $input_exists);
  $input = drupal_array_get_nested_value($form_state['input'], $element['#parents'], $input_exists);

  $rrule_values = date_repeat_merge($input['rrule'], $element['rrule']);

  // If no repeat information was set, treat this as a normal, non-repeating value.
  if ($rrule_values['FREQ'] == 'NONE') {
    $item['rrule'] = NULL;
  }

  // If no start date was set, clean up the form and return.
  if (empty($item['value'])) {
    form_set_value($element, array($item), $form_state);
    return;
  }

  // Require the UNTIL date for now.
  // The RRULE has already been created by this point, so go back
  // to the posted values to see if this was filled out.
  $error_field = implode('][', $element['#parents']) . '][rrule][UNTIL][datetime][date';
  if (!empty($item['rrule']) && empty($rrule_values['UNTIL']['datetime'])) {
    form_set_error($error_field, t('The UNTIL value is required for repeating dates.'));
  }
  if (form_get_errors()) {
    return;
  }

  // If the rule, the start date, or the end date have changed, re-calculate
  // the repeating dates, wipe out the previous values, and populate the
  // field with the new values.

  // TODO
  // Is it right to not do anything unless there are changes? Will that
  // confuse anyone? Commenting that out for now...
  $rrule = $item['rrule'];
  if (!empty($rrule)
    //&& ($rrule != $element['rrule']['#prev_rrule']
    //|| $item['value'] != $element['rrule']['#prev_value']
    //|| $item['value2'] != $element['rrule']['#prev_value2'])
    ) {

    // Avoid undefined index problems on dates that don't have all parts.
    $possible_items = array('value', 'value2', 'timezone', 'offset', 'offset2');
    foreach ($possible_items as $key) {
      if (empty($item[$key])) {
        $item[$key] = '';
      }
    }
    $value = date_repeat_build_dates($rrule, $rrule_values, $field, $item);
    // Unset the delta value of the parents.
    array_pop($element['#parents']);
    // Set the new delta values for this item to the array of values returned by the repeat rule.
    form_set_value($element, $value, $form_state);
  }
}

/**
 * Helper function to build repeating dates from a $node_field.
 *
 * Pass in either the RRULE or the $form_values array for the RRULE,
 * whichever is missing will be created when needed.
 */
function date_repeat_build_dates($rrule = NULL, $rrule_values = NULL, $field, $item) {
  include_once(DRUPAL_ROOT . '/' . drupal_get_path('module', 'date_api') . '/date_api_ical.inc');
  $field_name = $field['field_name'];

  if (empty($rrule)) {
    $rrule = date_api_ical_build_rrule($rrule_values);
  }
  elseif (empty($rrule_values)) {
    $rrule_values = date_ical_parse_rrule(NULL, $rrule);
  }

  // By the time we get here, the start and end dates have been
  // adjusted back to UTC, but we want localtime dates to do
  // things like '+1 Tuesday', so adjust back to localtime.
  $timezone = date_get_timezone($field['settings']['tz_handling'], $item['timezone']);
  $timezone_db = date_get_timezone_db($field['settings']['tz_handling']);
  $start = new DateObject($item['value'], $timezone_db, date_type_format($field['type']));
  $start->limitGranularity($field['settings']['granularity']);
  if ($timezone != $timezone_db) {
    date_timezone_set($start, timezone_open($timezone));
  }
  if (!empty($item['value2']) && $item['value2'] != $item['value']) {
    $end = new DateObject($item['value2'], date_get_timezone_db($field['settings']['tz_handling']), date_type_format($field['type']));
    $end->limitGranularity($field['settings']['granularity']);
    date_timezone_set($end, timezone_open($timezone));
  }
  else {
    $end = $start;
  }
  $duration = $start->difference($end);
  $start_datetime = date_format($start, DATE_FORMAT_DATETIME);

  if (!empty($rrule_values['UNTIL']['datetime'])) {
    $end = date_ical_date($rrule_values['UNTIL'], $timezone);
  }
  $end_datetime = date_format($end, DATE_FORMAT_DATETIME);

  // Split the RRULE into RRULE, EXDATE, and RDATE parts.
  $parts = date_repeat_split_rrule($rrule);
  $parsed_exceptions = (array) $parts[1];
  $exceptions = array();
  foreach ($parsed_exceptions as $exception) {
    $date = date_ical_date($exception, $timezone);
    $exceptions[] = date_format($date, 'Y-m-d');
  }

  $parsed_rdates = (array) $parts[2];
  $additions = array();
  foreach ($parsed_rdates as $rdate) {
    $date = date_ical_date($rdate, $timezone);
    $additions[] = date_format($date, 'Y-m-d');
  }

  $dates = date_repeat_calc($rrule, $start_datetime, $end_datetime, $exceptions, $timezone, $additions);
  $value = array();
  foreach ($dates as $delta => $date) {
    // date_repeat_calc always returns DATE_DATETIME dates, which is
    // not necessarily $field['type'] dates.
    // Convert returned dates back to db timezone before storing.
    $date_start = new DateObject($date, $timezone, DATE_FORMAT_DATETIME);
    $date_start->limitGranularity($field['settings']['granularity']);
    date_timezone_set($date_start, timezone_open($timezone_db));
    $date_end = clone($date_start);
    date_modify($date_end, '+' . $duration . ' seconds');
    $value[$delta] = array(
      'value' => date_format($date_start, date_type_format($field['type'])),
      'value2' => date_format($date_end, date_type_format($field['type'])),
      'offset' => date_offset_get($date_start),
      'offset2' => date_offset_get($date_end),
      'timezone' => $timezone,
      'rrule' => $rrule,
      );
  }
  return $value;
}
