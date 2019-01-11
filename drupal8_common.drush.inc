<?php

/**
 * @file
 * Drush commands.
 */

use Drupal\Core\Config\StorageComparer;

/**
 * Implements hook_drush_command().
 */
function drupal8_common_drush_command() {
  $items = [];

  $items['check-config-changes'] = [
    'description' => 'Check if there are configuration changes',
  ];
  $items['check-entity-updates'] = [
    'description' => 'Check if there are entity updates',
  ];

  return $items;
}

/**
 * Check for configuration changes.
 *
 * If there are changes, it will exit with status 1, else 0.
 */
function drush_drupal8_common_check_config_changes() {
  $sync_storage = \Drupal::service('config.storage.sync');
  $active_storage = \Drupal::service('config.storage');
  $config_manager = \Drupal::service('config.manager');

  $storage_comparer = new StorageComparer($sync_storage, $active_storage, $config_manager);

  $source_list = $sync_storage->listAll();
  $change_list = $storage_comparer->createChangelist();
  if (empty($source_list) || !$change_list->hasChanges()) {
    drush_print('No configuration changes.');
    return;
  }

  // We have configuration changes.
  exit(1);
}

/**
 * Check for available entity updates.
 *
 * If there are changes, it will exit with status 1, else 0.
 */
function drush_drupal8_common_check_entity_updates() {
  $needsUpdates = \Drupal::entityDefinitionUpdateManager()->needsUpdates();
  if (!$needsUpdates) {
    drush_print('No entity updates required');
    return;
  }

  // We have entity updates available.
  exit(1);
}
