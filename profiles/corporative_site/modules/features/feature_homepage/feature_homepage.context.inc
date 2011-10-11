<?php
/**
 * @file
 * feature_homepage.context.inc
 */

/**
 * Implementation of hook_context_default_contexts().
 */
function feature_homepage_context_default_contexts() {
  $export = array();

  $context = new stdClass;
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'homepage';
  $context->description = 'Homepage settings';
  $context->tag = 'home';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        '<front>' => '<front>',
      ),
    ),
  );
  $context->reactions = array(
    'block' => array(
      'blocks' => array(
        'welcomeblock-welcome' => array(
          'module' => 'welcomeblock',
          'delta' => 'welcome',
          'region' => 'content',
          'weight' => '-10',
        ),
      ),
    ),
  );
  $context->condition_mode = 0;

  // Translatables
  // Included for use with string extractors like potx.
  t('Homepage settings');
  t('home');
  $export['homepage'] = $context;

  return $export;
}
