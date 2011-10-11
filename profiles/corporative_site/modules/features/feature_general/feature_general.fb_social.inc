<?php
/**
 * @file
 * feature_general.fb_social.inc
 */

/**
 * Implementation of hook_fb_social_default_presets().
 */
function feature_general_fb_social_default_presets() {
  $export = array();

  $fb_social_preset = new stdClass;
  $fb_social_preset->disabled = FALSE; /* Edit this to true to make a default fb_social_preset disabled initially */
  $fb_social_preset->api_version = 1;
  $fb_social_preset->name = 'Site fan box';
  $fb_social_preset->description = '';
  $fb_social_preset->plugin_type = 'likebox';
  $fb_social_preset->settings = array(
    'block' => 1,
  );
  $fb_social_preset->fb_attrs = array(
    'href' => 'http://www.facebook.com/platform',
    'width' => '180',
    'height' => '',
    'colorscheme' => 'light',
    'show_faces' => 1,
    'border_color' => '',
    'stream' => 0,
    'header' => 0,
  );
  $export['Site fan box'] = $fb_social_preset;

  return $export;
}
