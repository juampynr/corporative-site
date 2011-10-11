<?php
// $Id: site_map.theme.inc,v 1.5.2.3 2011/01/05 18:44:35 frjo Exp $

/**
 * @file
 * site_map.theme.inc
 *
 * Site map theme functions.
 */

/**
 * Returns HTML for a site map feed icon legend.
 */
function theme_site_map_rss_legend() {
  $output .= '<p><strong>' . t('Legend:') . '</strong><br />';
  $output .= '<span class="rss">' . theme('site_map_feed_icon', array('type' => 'node')) . '</span> ' . t('Link to a content RSS feed');
  $output .= '<br /><span class="rss">' . theme('site_map_feed_icon', array('type' => 'comment')) . '</span> ' . t('Link to a comment RSS feed');
  $output .= '</p>';

  return $output;
}

/**
 * Returns HTML for a themed site map box.
 *
 * @param $variables
 *   An associative array containing:
 *   - title: The subject of the box.
 *   - content: The content of the box.
 *   - class:  Optional extra class for the box.
 */
function theme_site_map_box($variables) {
  $output = '';
  if (($variables['title'] || $variables['content'])) {
    $class = $variables['class'] ? 'site-map-box ' . $variables['class'] : 'site-map-box';
    $output .= '<div class="' . $variables['class'] . '">';
    if ($variables['title']) {
      $output .= '<h2 class="title">' . $variables['title'] . '</h2>';
    }
    if ($variables['content']) {
      $output .= '<div class="content">' . $variables['content'] . '</div>';
    }
    $output .= '</div>';
  }

  return $output;
}

/**
 * Returns HTML for a feed icon with link.
 *
 * @param $variables
 *   An associative array containing:
 *   - url: The url of the feed.
 *   - type: The type of feed icon.
 */
function theme_site_map_feed_icon($variables) {
  $output = '';

  switch ($variables['type']) {
    case 'node':
      $output = theme('image', array(
        'path' => drupal_get_path('module', 'site_map') . '/feed-small.png',
        'title' => t('Syndicate content'),
        'alt' => t('Syndicate content'),
        )
      );
      break;

    case 'comment':
      $output = theme('image', array(
        'path' => drupal_get_path('module', 'site_map') . '/feed-small-comment.png',
        'title' => t('Syndicate comments'),
        'alt' => t('Syndicate comments'),
        )
      );
      break;
  }

  if (!empty($variables['url'])) {
    $output = l($output, $variables['url'], array('attributes' => array('class' => 'feed-link'), 'html' => TRUE));
  }

  return $output;
}

/**
 * This is a clone of the core template_preprocess_menu_tree() function with the exception of
 * the site_map specific class name used in the UL that also allow themers to
 * override the function only for the site map page.
 *
 * Preprocesses the rendered tree for theme_site_map_menu_tree().
 */
function template_preprocess_site_map_menu_tree(&$variables) {
  $variables['tree'] = $variables['tree']['#children'];
}

/**
 * This is a clone of the core theme_menu_tree() function with the exception of
 * the site_map specific class name used in the UL that also allow themers to
 * override the function only for the site map page.
 *
 * Returns HTML for a wrapper for a menu sub-tree.
 *
 * @param $variables
 *   An associative array containing:
 *   - tree: An HTML string containing the tree's items.
 *
 * @see template_preprocess_menu_tree()
 * @ingroup themeable
 */
function theme_site_map_menu_tree($variables) {
  return '<ul class="site-map-menu">' . $variables['tree'] . '</ul>';
}

/**
 * This is a one by one clone of the core theme_menu_item() function that allows
 * custom theming of the site map page items.
 *
 * Returns HTML for a menu link and submenu.
 *
 * @param $variables
 *   An associative array containing:
 *   - element: Structured array data for a menu link.
 *
 * @ingroup themeable
 */
function theme_site_map_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';

  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

/**
 * Process variables for site-map.tpl.php.
 *
 * @see site-map.tpl.php
 */
function template_preprocess_site_map(&$variables) {
  $message = variable_get('site_map_message', array());
  if (!empty($message)) {
    $variables['message'] = check_markup($message['value'], $message['format']);
  }

  if ((variable_get('site_map_show_rss_links', 1) != 0) && module_exists('commentrss') && variable_get('commentrss_site', COMMENTRSS_SITE_FRONT_PAGE)) {
    $variables['rss_legend'] = theme('site_map_rss_legend');
  }

  if (variable_get('site_map_show_front', 1)) {
    $variables['front_page'] = _site_map_front_page();
  }

  if (variable_get('site_map_show_blogs', 1)) {
    $variables['blogs'] = _site_map_blogs();
  }

  // Compile the books trees.
  $variables['books'] = _site_map_books();

  // Compile the menu trees.
  $variables['menus'] = _site_map_menus();

  if (variable_get('site_map_show_faq', 0)) {
    $variables['faq'] = _site_map_faq();
  }

  // Compile the vocabulary trees.
  $variables['taxonomys'] = _site_map_taxonomys();

  // Invoke all custom modules and get themed HTML to be integrated into the site map.
  $additional = module_invoke_all('site_map');
  foreach ($additional as $themed_site_map_code) {
    $variables['additional'] .= $themed_site_map_code;
  }
}
