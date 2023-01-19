<?php

namespace Drupal\Tests\chapter13\Kernel;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\Entity\EntityViewDisplay;
use Drupal\field\Entity\FieldConfig;
use Drupal\field\Entity\FieldStorageConfig;
use Drupal\KernelTests\KernelTestBase;
use Drupal\Tests\node\Traits\ContentTypeCreationTrait;
use Drupal\Tests\node\Traits\NodeCreationTrait;

/**
 * Tests the formatting of string fields using the Camel Case field formatter.
 *
 * @package Drupal\Tests\chapter13\Kernel
 */
class CamelCaseFormatterTest extends KernelTestBase {

  use NodeCreationTrait,
    ContentTypeCreationTrait;

  protected $strictConfigSchema = FALSE;

  /**
   * Modules to enable.
   *
   * @var array
   */
  public static $modules = [
    'field',
    'text',
    'node',
    'system',
    'filter',
    'user',
    'chapter13',
  ];

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();

    // Install required module schema and configs.
    $this->installEntitySchema('node');
    $this->installEntitySchema('user');
    $this->installConfig(['field', 'node', 'filter', 'system']);
    $this->installSchema('node', ['node_access']);

    // Create a vanilla content type for testing.
    $this->createContentType(
      [
        'type' => 'page'
      ]
    );

    // Create and store the field_chapter13_test field.
    FieldStorageConfig::create([
      'field_name' => 'field_chapter13_test',
      'entity_type' => 'node',
      'type' => 'string',
      'cardinality' => 1,
      'locked' => FALSE,
      'indexes' => [],
      'settings' => [
        'max_length' => 255,
        'case_sensitive' => FALSE,
        'is_ascii' => FALSE,
      ],
    ])->save();

    FieldConfig::create([
      'field_name' => 'field_chapter13_test',
      'field_type' => 'string',
      'entity_type' => 'node',
      'label' => 'chapter13 Camel Case Field',
      'bundle' => 'page',
      'description' => '',
      'required' => FALSE,
      'settings' => [
        'link_to_entity' => FALSE
      ],
    ])->save();

    // Set the entity display for testing to use our camel_case formatter.
    $entity_display = EntityViewDisplay::load('node.page.default');
    $entity_display->setComponent('field_chapter13_test',
    [
      'type' => 'camel_case',
      'region' => 'content',
      'settings' => [],
      'label' => 'hidden',
      'third_party_settings' => []
    ]);
    $entity_display->save();
  }

  /**
   * Tests that the field formatter camel_case formats the value
   * as expected.
   */
  public function testFieldIsFormatted() {
    $node = $this->createNode(
      [
        'type' => 'page',
        'field_chapter13_test' => 'A user entered string'
      ]
    );

    $build = $node->field_chapter13_test->view('default');
    $this->assertSame('aUserEnteredString', $build[0]['#context']['value']);
  }

}
