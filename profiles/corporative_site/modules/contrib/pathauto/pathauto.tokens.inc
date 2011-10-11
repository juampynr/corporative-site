<?php

/**
 * Implements hook_token_info().
 */
function pathauto_token_info() {
  $info['tokens']['array']['pathauto'] = array(
    'name' => t('Fake path'),
    'description' => t(''),
  );

  return $info;
}

/**
 * Implements hook_tokens().
 */
function pathauto_tokens($type, $tokens, array $data = array(), array $options = array()) {
  $replacements = array();
  $sanitize = !empty($options['sanitize']);

  // Array tokens.
  if ($type == 'array' && !empty($data['array']) && is_array($data['array'])) {
    $array = $data['array'];

    foreach ($tokens as $name => $original) {
      switch ($name) {
        case 'pathauto':
          module_load_include('inc', 'pathauto');
          $values = array();
          foreach ($array as $index => $value) {
            $values[$index] = token_render_array_value($value, $options);
            $values[$index] = pathauto_cleanstring($values[$index]);
          }
          $replacements[$original] = implode('/', $values);
          break;
      }
    }
  }

  return $replacements;
}
