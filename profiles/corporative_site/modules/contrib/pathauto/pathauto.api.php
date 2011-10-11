<?php

/**
 * @file
 * Documentation for pathauto API.
 *
 * @see hook_token_info
 * @see hook_tokens
 */

function hook_path_alias_types() {
}

function hook_pathauto($op) {
}

function hook_pathauto_alias_alter(&$alias, array $context) {
}

/**
 * Alter the list of punctuation characters for Pathauto control.
 *
 * @param $punctuation
 *   An array of punctuation to be controlled by Pathauto during replacement
 *   keyed by punctuation name. Each punctuation record should be an array
 *   with the following key/value pairs:
 *   - value: The raw value of the punctuation mark.
 *   - name: The human-readable name of the punctuation mark. This must be
 *     translated using t() already.
 */
function hook_pathauto_punctuation_chars_alter(array &$punctuation) {
  // Add the trademark symbol.
  $punctuation['trademark'] = array('value' => '™', 'name' => t('Trademark symbol'));

  // Remove the dollar sign.
  unset($punctuation['dollar']);
}
