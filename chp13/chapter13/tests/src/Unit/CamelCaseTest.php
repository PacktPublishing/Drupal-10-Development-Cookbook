<?php

namespace Drupal\Tests\chapter13\Unit;

use Drupal\Tests\UnitTestCase;
use Drupal\chapter13\CamelCase;

/**
 * Class CamelCaseTest
 * @package Drupal\Tests\chapter13\Unit
 */
class CamelCaseTest extends UnitTestCase {

  /**
   * Data provider for testCamelCaseConversion().
   *
   * @return array
   *   An array containing input values and expected output values.
   */
  public function exampleStrings() {
    return [
      ['button_color', 'buttonColor'],
      ['snake_case_example', 'snakeCaseExample'],
      ['ALL_CAPS_LOCK', 'allCapsLock'],
      ['foo-bar', 'fooBar'],
      ['This is a basic string', 'thisIsABasicString'],
    ];
  }

  /**
   * Tests the ::convert method.
   *
   * @param $input
   *   The input values.
   *
   * @param bool $expected
   *   The expected output.
   *
   * @param bool $separator
   *   The string separator.
   *
   * @dataProvider exampleStrings()
   */
  public function testCamelCaseConversion($input, $expected) {
    $output = CamelCase::convert($input);
    $this->assertEquals($expected, $output);
  }

}
