<?php
/**
 * @file
 * feature_ckeditor.features.user_permission.inc
 */

/**
 * Implementation of hook_user_default_permissions().
 */
function feature_ckeditor_user_default_permissions() {
  $permissions = array();

  // Exported permission: use text format filtered_html
  $permissions['use text format filtered_html'] = array(
    'name' => 'use text format filtered_html',
    'roles' => array(
      0 => 'administrator',
      1 => 'anonymous user',
      2 => 'authenticated user',
    ),
    'module' => 'filter',
  );

  // Exported permission: use text format full_html
  $permissions['use text format full_html'] = array(
    'name' => 'use text format full_html',
    'roles' => array(
      0 => 'administrator',
      1 => 'authenticated user',
    ),
    'module' => 'filter',
  );

  return $permissions;
}
