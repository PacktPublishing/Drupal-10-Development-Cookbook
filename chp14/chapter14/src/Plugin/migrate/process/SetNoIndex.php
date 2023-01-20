<?php

namespace Drupal\chapter14\Plugin\migrate\process;

use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\Row;

/**
 * @MigrateProcessPlugin(
 *   id = "set_no_index",
 *   handle_multiples = FALSE
 * )
 */
class SetNoIndex extends ProcessPluginBase {

  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    return (bool) $value ? ['robots' => 'noindex, nofollow, noarchive, nosnippet'] : [];
  }

}