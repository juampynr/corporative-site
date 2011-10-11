<?php

/**
 * Twitter API functions
 */

/**
 * Connect to the API using the 'proper' version (Oauth vs. standard)
 */
function twitter_connect($account) {
  module_load_include('lib.php', 'twitter');
  $auth = $account->get_auth();
  if (_twitter_use_oauth() && $auth['oauth_token'] && $auth['oauth_token_secret']) {
    module_load_include('lib.php', 'oauth_common');
    return new TwitterOAuth(variable_get('twitter_consumer_key', ''), variable_get('twitter_consumer_secret', ''), $auth['oauth_token'], $auth['oauth_token_secret']);
  }
  else if ($auth['password']) {
    return new Twitter($account->screen_name, $auth['password']);
  }
  else {
    return new Twitter;
  }
}

/**
 * Saves a TwitterUser object to {twitter_account}
 */
function twitter_account_save($twitter_user, $save_auth = FALSE, $account = NULL) {
  $values = (array) $twitter_user;
  $values['twitter_uid'] = $values['id'];
  // bool => int for DB storage
  foreach (array('protected', 'verified', 'profile_background_tile') as $k) {
    if (isset($values[$k])) {
      $values[$k] = (int) $values[$k];
    }
  }

  if ($save_auth) {
    $values += $twitter_user->get_auth();
    if (empty($account)) {
      global $user;
      $account = $user;
    }
    $values['uid'] = $account->uid;
  }
  $schema = drupal_get_schema('twitter_account');
  foreach ($values as $k => $v) {
    if (!isset($schema['fields'][$k])) {
      unset($values[$k]);
    }
  }

  db_merge('twitter_account')
    ->key(array('twitter_uid' => $values['twitter_uid']))
    ->fields($values)
    ->execute();
}

/**
 * Load a Twitter account from {twitter_account}.
 *
 * @param $id
 *   Twitter UID
 *
 * @return
 *   TwitterUser object
 *
 */
function twitter_account_load($id) {
  module_load_include('lib.php', 'twitter');
  if ( $values = db_query("SELECT * FROM {twitter_account} WHERE twitter_uid = :twitter_uid", array(':twitter_uid' => $id))->fetchAssoc() ) {
    $values['id'] = $values['twitter_uid'];
    $account = new TwitterUser($values);
    $account->set_auth($values);
    $account->uid = $values['uid'];
    $account->import = $values['import'];
    $account->is_global = $values['is_global'];
    return $account;
  }
}

/**
 * Saves a TwitterStatus object to {twitter}
 */
function twitter_status_save($status) {
  $status = array(
    'twitter_id' => $status->id,
    'screen_name' => $status->user->screen_name,
    'created_time' => strtotime($status->created_at),
    'text' => $status->text,
    'source' => $status->source,
    'in_reply_to_status_id' => ($status->in_reply_to_status_id > 0) ? (string) $status->in_reply_to_status_id : NULL,
    'in_reply_to_user_id' => (int) $status->in_reply_to_user_id,
    'in_reply_to_screen_name' => $status->in_reply_to_screen_name,
    'truncated' => (int) $status->truncated,
  );
  db_merge('twitter')
    ->key(array('twitter_id' => $status['twitter_id']))
    ->fields($status)
    ->execute();
}

/**
 * Post a message to twitter
 */
function twitter_set_status($twitter_account, $status) {
  module_load_include('lib.php', 'twitter');

  $twitter = twitter_connect($twitter_account);
  $twitter->status_update($status);
}

/**
 * Fetches a user's timeline
 */
function twitter_fetch_user_timeline($id) {
  $account = twitter_account_load($id);

  $since = db_query("SELECT MAX(twitter_id) FROM {twitter} WHERE screen_name = :screen_name", array(':screen_name' => $account->screen_name))->fetchField();

  $twitter = twitter_connect($account);

  $params = array();
  if ($since) {
    $params['since_id'] = $since;
  }

  $statuses = $twitter->user_timeline($account->id, $params, $account->protected);
  foreach ($statuses as $status) {
    twitter_status_save($status);
  }

  if (count($statuses) > 0) {
    twitter_account_save($statuses[0]->user);
  }

  db_update('twitter_account')
    ->fields(array(
      'last_refresh' => REQUEST_TIME,
    ))
    ->condition('twitter_uid', $account->id)
    ->execute();
}

/**
 * Delete a user from {twitter_account}.
 *
 * @param $twitter_uid
 *   An integer with the Twitter UID.
 *
 * @param $screen_name
 *   Optional string with the user name.
 */
function twitter_account_delete($twitter_uid, $screen_name = NULL) {
  $query = db_delete('twitter_account');
  $query->condition('twitter_uid', $twitter_uid);
  if (!empty($screen_name)) {
    $query->condition('screen_name', $screen_name);
  }
  $query->execute();
}
