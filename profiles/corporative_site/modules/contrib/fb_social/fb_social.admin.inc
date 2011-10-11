<?php



/**
 * Settings form for global fb_social custimazation
 */
function fb_social_admin_settings_form($form, &$form_state) {
  $languages = language_list();

  $form = array();
  $form['fb_social_appid'] = array(
    '#title' => t('Facebook application id'),
    '#type' => 'textfield',
    '#description' => t('<p> Register your application on Facebook to get a Facebook App Id: !url.</p>
      <p>Go on your facebook app page (Applications > Developer > My Applications)
      click "Edit Settings". Then click "Connect". Make sure that the "Connect
      URL" matches your domain exactly.</p>', array(
      '!url' => l('register here', 'http://developers.facebook.com/setup/'),
    )),
    '#default_value' => variable_get('fb_social_appid', ''),
  );

  /*
   $form['fb_social_secret'] = array(
   '#title' => t('Facebook application secret ky'),
   '#type' => 'textfield',
   '#description' => t('Facebook application secret key'),
   '#default_value' => variable_get('fb_social_secret', '')
   );
   */

  $form['fb_social_locale'] = array(
    '#title' => t('Default facebook application locale'),
    '#type' => 'select',
    '#default_value' => variable_get('fb_social_locale', 'en_US'),
    '#description' => t('Your facebook application locale'),
    '#options' => _get_facebook_locale(),
  );

  $form['fb_social_urls'] = array(
    '#type' => 'fieldset',
    '#title' => t('Submitted urls mode'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );

  $form['fb_social_urls']['fb_social_urls_mode'] = array(
    '#type' => 'radios',
    '#title' => t('urls mode'),
    '#default_value' => variable_get('fb_social_urls_mode', 0),
    '#options' => array(t('aliased'), t('Unaliased')),
    '#description' => t('The url version of your post you want to be shown in fb. Aliased - http://example.com/mypage, Unaliased - http://example.com/node/34'),
  );

  $form['fb_social_urls']['fb_social_base_url'] = array(
    '#type' => 'textfield',
    '#title' => t('Base URL'),
    '#default_value' => variable_get('fb_social_base_url', ''),
    '#description' => t('Specify a base URL for all links presented to Facebook. This URL replaces the actual URL currently shown in the browser. This setting is useful for sites running on multiple domains but want to recognize Facebook likes cross-domain. Please include http:// or https:// in this setting. Leave empty for default behaviour.'),
  );

  $form['fb_social_urls']['fb_social_url_strip_lang'] = array(
    '#type' => 'checkbox',
    '#title' => t('Strip language'),
    '#default_value' => variable_get('fb_social_url_strip_lang', 0),
    '#description' => t('Strip the language tag from the URL sent to Facebook. This has two implications: First, for Facebook users that click on the link, the usual language determination is used. Second all comments, likes, etc. made in the different language versions are counted and shown on all pages, even in different languages.'),
  );

  $form['fb_social_languages'] = array(
    '#type' => 'fieldset',
    '#title' => t('Languages mapping'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );

  $form['fb_social_languages']['fb_social_locale_auto'] = array(
    '#title' => t('Auto translate plugin'),
    '#type' => 'checkbox',
    '#default_value' => variable_get('fb_social_locale_auto', 0),
    '#description' => t('Check to automatically detect current node\'s language based on the settings below. Uncheck this if you want to force the node to use the default facebook locale set earlier'),
  );

  foreach ($languages as $language) {
    $form['fb_social_languages']['fb_social_language_' . $language->language] = array(
      '#type' => 'select',
      '#title' => 'Mapping for ' . $language->name . ' (' . $language->language . ')',
      '#description' => t('Select the equivalent language code in the facebook locale'),
      '#default_value' => variable_get('fb_social_language_' . $language->language, 'en_US'),
      '#options' => _get_facebook_locale(),
    );
  }

  $form = system_settings_form($form);
  return $form;
}

function _get_facebook_locale() {
  $fb_locale = array();
  $cache = cache_get('fb_social');
  if (empty($cache->data)) {
    $result = drupal_http_request("http://www.facebook.com/translations/FacebookLocales.xml");
    $xml = simplexml_load_string($result->data);
    foreach ( $xml->locale as $line ) {
      $representation = ( array ) $line->codes->code->standard->representation;
      $name = ( array ) $line->englishName;
      $key = $representation[0];
      $value = $name[0];
      $fb_locale[$key] = $value;
    }
    cache_set('fb_social', serialize($fb_locale), 'cache');
  }
  else {
    $fb_locale = unserialize($cache->data);
  }
  return $fb_locale;
}
