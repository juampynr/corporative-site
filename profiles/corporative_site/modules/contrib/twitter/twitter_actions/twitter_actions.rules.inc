<?php
/**
 * @file
 * Provide better intergration into the rules module
 */

/**
 * Implements hook_rules_action_info_alter().
 *
 * Actions of type system are not supported, so rules won't make use of it automatically. So
 * we have to provide some information about it to make it work.
 */
function twitter_actions_rules_action_info_alter(&$actions) {
  $actions['rules_core_twitter_actions_set_status_action'] = array(
    'label' => t('Post a message to Twitter'),
    // Make sure there is something passed for $object.
    'arguments' => array('object' => array(
        'type' => 'value',
        'default value' => NULL,
      )),
    'module' => 'Twitter',
    'eval input' => array('screen_name', 'password', 'message'),
    // Let the rules system for executing core style actions execute it.
    'base' => 'rules_core_action_execute',
    'action_name' => 'twitter_actions_set_status_action',
    'configurable' => TRUE,
  );
}

