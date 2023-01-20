<?php

namespace Drupal\mymodule;

use Drupal\Core\Config\Entity\ConfigEntityListBuilder;
use Drupal\Core\Entity\EntityInterface;

class MessageTypeListBuilder extends ConfigEntityListBuilder {

  public function buildHeader() {
    $header['label'] = $this->t('Label');
    return $header + parent::buildHeader();
  }

  public function buildRow(EntityInterface $entity) {
    $row['label'] = $entity->label();
    return $row + parent::buildRow($entity);
  }

}
