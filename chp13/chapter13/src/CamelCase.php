<?php

declare(strict_types=1);

namespace Drupal\chapter13;

/**
 * Class CamelCase
 * @package Drupal\chapter13
 */
class CamelCase {

  /**
   * Convert snake_case to camelCase.
   *
   * @param string $input
   * @return string
   */
  public static function convert(string $input): string {
    $input = strtolower($input);
    $input = preg_replace('/[, -]/', '_', $input);
    return str_replace('_', '', lcfirst(ucwords($input, '_')));
  }

}
