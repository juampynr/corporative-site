<?php
/**
 * @file
 * feature_ckeditor.features.filter.inc
 */

/**
 * Implementation of hook_filter_default_formats().
 */
function feature_ckeditor_filter_default_formats() {
  $formats = array();

  // Exported format: Filtered HTML
  $formats['filtered_html'] = array(
    'format' => 'filtered_html',
    'name' => 'Filtered HTML',
    'cache' => '1',
    'status' => '1',
    'weight' => '-9',
    'filters' => array(
      'filter_url' => array(
        'weight' => '0',
        'status' => '1',
        'settings' => array(
          'filter_url_length' => '72',
        ),
      ),
      'filter_html' => array(
        'weight' => '1',
        'status' => '1',
        'settings' => array(
          'allowed_html' => '<a> <p> <span> <div> <h1> <h2> <h3> <h4> <h5> <h6> <img> <map> <area> <hr> <br> <br /> <ul> <ol> <li> <dl> <dt> <dd> <table> <tr> <td> <em> <b> <u> <i> <strong> <del> <ins> <sub> <sup> <quote> <blockquote> <pre> <address> <code> <cite> <embed> <object> <param> <strike> <caption> <tbody>',
          'filter_html_help' => 1,
          'filter_html_nofollow' => 0,
        ),
      ),
      'filter_htmlcorrector' => array(
        'weight' => '10',
        'status' => '1',
        'settings' => array(),
      ),
    ),
  );

  // Exported format: Full HTML
  $formats['full_html'] = array(
    'format' => 'full_html',
    'name' => 'Full HTML',
    'cache' => '1',
    'status' => '1',
    'weight' => '-10',
    'filters' => array(
      'filter_url' => array(
        'weight' => '0',
        'status' => '1',
        'settings' => array(
          'filter_url_length' => '72',
        ),
      ),
      'filter_htmlcorrector' => array(
        'weight' => '10',
        'status' => '1',
        'settings' => array(),
      ),
    ),
  );

  return $formats;
}
