<?php

namespace Drupal\mymodule;

use Drupal\Core\Entity\Sql\SqlContentEntityStorage;

class MessageStorage extends SqlContentEntityStorage {

  public function loadMultipleByType(string $type): array {
    $message_ids = $this->getQuery()
      ->accessCheck(TRUE)
      ->condition('type', $type)
      ->execute();
    return $this->loadMultiple($message_ids);
  }

}
