<?php
/**
 * @file
 * feature_general.context.inc
 */

/**
 * Implementation of hook_context_default_contexts().
 */
function feature_general_context_default_contexts() {
  $export = array();

  $context = new stdClass;
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'general';
  $context->description = 'Site wide settings';
  $context->tag = 'general';
  $context->conditions = array(
    'sitewide' => array(
      'values' => array(
        1 => 1,
      ),
    ),
  );
  $context->reactions = array(
    'block' => array(
      'blocks' => array(
        'fb_social-Site fan box' => array(
          'module' => 'fb_social',
          'delta' => 'Site fan box',
          'region' => 'sidebar_first',
          'weight' => NULL,
        ),
      ),
    ),
  );
  $context->condition_mode = 0;

  // Translatables
  // Included for use with string extractors like potx.
  t('Site wide settings');
  t('general');
  $export['general'] = $context;

  return $export;
}
