<?php

namespace Drupal\Tests\chapter14\Unit\Plugin\migrate\process;

use Drupal\nber_migration\Plugin\migrate\process\SetSpider;
use Drupal\Tests\migrate\Unit\process\MigrateProcessTestCase;

/**
 * Tests the set_no_index process plugin.
 */
class SetNoIndexTest extends MigrateProcessTestCase {

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    $this->plugin = new SetNoIndex([], 'set_no_index', []);
    parent::setUp();
  }

  /**
   * Data provider for testPluginValue().
   *
   * @return array
   *   An array containing input values and expected output values.
   */
  public function valueProvider() {
    return [
      [1, ['robots' => 'noindex, nofollow, noarchive, nosnippet']],
      [0, []],
      [NULL, []],
    ];
  }

  /**
   * Test set_no_index plugin.
   *
   * @param $input
   *   The input values.
   *
   * @param $expected
   *   The expected output.
   *
   * @dataProvider valueProvider
   */
  public function testPluginValue($input, $expected) {
    $output = $this->plugin->transform($input, $this->migrateExecutable, $this->row, 'destinationproperty');
    $this->assertSame($output, $expected);
  }
}
