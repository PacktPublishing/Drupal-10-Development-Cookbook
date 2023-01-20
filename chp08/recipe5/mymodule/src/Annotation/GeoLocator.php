<?php

namespace Drupal\mymodule\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * @Annotation
 */
class GeoLocator extends Plugin
{
  /**
   * The human-readable name.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $label;

}
