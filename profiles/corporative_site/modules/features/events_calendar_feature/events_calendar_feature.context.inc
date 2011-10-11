<?php
/**
 * @file
 * events_calendar_feature.context.inc
 */

/**
 * Implementation of hook_context_default_contexts().
 */
function events_calendar_feature_context_default_contexts() {
  $export = array();

  $context = new stdClass;
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'Events';
  $context->description = 'Settings for event listings';
  $context->tag = 'event';
  $context->conditions = array(
    'views' => array(
      'values' => array(
        'events' => 'events',
      ),
    ),
  );
  $context->reactions = array(
    'block' => array(
      'blocks' => array(
        'views-events_calendar-block_1' => array(
          'module' => 'views',
          'delta' => 'events_calendar-block_1',
          'region' => 'sidebar_first',
          'weight' => '-10',
        ),
      ),
    ),
  );
  $context->condition_mode = 0;

  // Translatables
  // Included for use with string extractors like potx.
  t('Settings for event listings');
  t('event');
  $export['Events'] = $context;

  return $export;
}
