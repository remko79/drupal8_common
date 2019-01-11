# Drupal 8 - Common module

This modules adds basic common functionality to Drupal 8.

## Features

### Drush commands
* `check-config-changes`: this will exit with status code 1 when configuration changes exist.  
Useful during deploy process to check for configuration changes to avoid unnecessary cache rebuilds.
* `check-entity-updates`: this will exit with status code 1 when entity updates exist.  
Useful during deploy process to check for configuration changes to avoid unnecessary cache rebuilds.

### Events
Events are dispatched so you can subscribe to them instead of using hooks:
* \rklein79\drupal8_common\Event\FormEvent
  - **FORM_ALTER:** dispatched from hook_form_alter()
  - **NODE_FORM_ALTER:** dispatched from hook_node_form_alter()
* \rklein79\drupal8_common\Event\NodeEvent
  - **NODE_INSERT:** dispatched from hook_node_insert()
  - **NODE_UPDATE:** dispatched from hook_node_update()
  - **NODE_DELETE:** dispatched from hook_node_delete()
* \rklein79\drupal8_common\Event\TermEvent
  - **TERM_INSERT:** dispatched from hook_term_insert()
  - **TERM_UPDATE:** dispatched from hook_term_update()
  - **TERM_DELETE:** dispatched from hook_term_delete()
