<?php

namespace Drupal\mymodule;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;

class MessageListBuilder extends EntityListBuilder {

  public function buildHeader() {
    $header['title'] = $this->t('Title');
    return $header + parent::buildHeader();
  }

  public function buildRow(EntityInterface $entity) {
    $row['title'] = $entity->toLink();
    return $row + parent::buildRow($entity);
  }

}
