<?php

declare(strict_types = 1);

namespace Drupal\chapter13\Plugin\Field\FieldFormatter;

use Drupal\chapter13\CamelCase;
use Drupal\Core\Field\FieldItemInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\Plugin\Field\FieldFormatter\StringFormatter;

/**
 * Plugin implementation of the 'camel_case' formatter.
 *
 * @FieldFormatter(
 *   id = "camel_case",
 *   label = @Translation("Camel case"),
 *   field_types = {
 *     "string"
 *   }
 * )
 */
class CamelCaseFormatter extends StringFormatter {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) : array {
    $elements = [];

    foreach ($items as $delta => $item) {
      $view_value = $this->viewValue($item);
      $elements[$delta] = $view_value;
    }

    return $elements;
  }

  /**
   * {@inheritdoc}
   */
  protected function viewValue(FieldItemInterface $item) {
    return [
      '#type' => 'inline_template',
      '#template' => '{{ value|nl2br }}',
      '#context' => ['value' => CamelCase::convert($item->value)],
    ];
  }

}
