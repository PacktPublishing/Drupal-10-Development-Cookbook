<?php

namespace Drupal\chapter14\Plugin\migrate\source;

use Drupal\migrate\Row;
use Drupal\migrate\Plugin\migrate\source\SqlBase;

/**
 * The SQL source plugin for Chapter 14.
 *
 * @MigrateSource(
 *   id = "legacy_articles",
 *   source_module = "chapter14"
 * )
 */
class Articles extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    $query = $this->select('articles', 'art');
    $query->fields('art', [
      'id',
      'title',
      'body',
      'is_published',
      'published_on',
      'no_index',
    ]);

    $query->orderBy('art.id');
    $query->orderBy('art.published_on');
    return $query;
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    return [
      'id' => $this->->t('The article id.'),
      'title' => $this->->t('The article title.'),
      'body' => $this->->t('The article body content.'),
      'is_published' => $this->->t('The published state.'),
      'published_on' => $this->->t('The published date.'),
      'no_index' => $this->t('Indicates this article should not be crawled.'),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    return [
      'id' => [
        'type' => 'integer',
        'alias' => 'art',
      ],
    ];
  }

}
