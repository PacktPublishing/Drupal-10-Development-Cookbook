<?php

namespace Drupal\mymodule\Entity;

use Drupal\node\Entity\Node;

class Recipe extends Node {

  public function getTags(): array {
    /** @var \Drupal\Core\Field\EntityReferenceFieldItemListInterface $field_tags */
    $field_tags = $this->get('field_tags');
    return $field_tags->referencedEntities();
  }

  public function getPrepTime(): int {
    return (int) $this->get('field_preparation_time')->value;
  }

  public function getCookTime(): int {
    return (int) $this->get('field_cooking_time')->value;
  }

}
