<?php
/**
 * @file
 * feature_general.features.inc
 */

/**
 * Implementation of hook_ctools_plugin_api().
 */
function feature_general_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "context" && $api == "context") {
    return array("version" => "3");
  }
  list($module, $api) = func_get_args();
  if ($module == "fb_social" && $api == "fb_social") {
    return array("version" => "1");
  }
}
