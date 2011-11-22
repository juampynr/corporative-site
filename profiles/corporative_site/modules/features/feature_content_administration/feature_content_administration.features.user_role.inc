<?php
/**
 * @file
 * feature_content_administration.features.user_role.inc
 */

/**
 * Implementation of hook_user_default_roles().
 */
function feature_content_administration_user_default_roles() {
  $roles = array();

  // Exported role: content manager
  $roles['content manager'] = array(
    'name' => 'content manager',
    'weight' => '3',
  );

  return $roles;
}
