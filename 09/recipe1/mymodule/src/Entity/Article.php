<?php

namespace Drupal\mymodule\Entity;

use Drupal\node\Entity\Node;

class Article extends Node {

  public function getTags(): array {
    /** @var \Drupal\Core\Field\EntityReferenceFieldItemListInterface $field_tags */
    $field_tags = $this->get('field_tags');
    return $field_tags->referencedEntities();
  }

}
