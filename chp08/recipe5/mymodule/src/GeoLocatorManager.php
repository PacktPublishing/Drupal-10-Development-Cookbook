<?php

namespace Drupal\mymodule;

use Drupal\Core\Plugin\DefaultPluginManager;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;

class GeoLocatorManager extends DefaultPluginManager {

  /**
   * Constructs a new GeoLocatorManager object.
   *
   * @param \Traversable $namespaces
   *   Available namespaces.
   * @param \Drupal\Core\Cache\CacheBackendInterface $cache_backend
   *   The cache backend.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler.
   */
  public function __construct(
    \Traversable $namespaces,
    CacheBackendInterface $cache_backend,
    ModuleHandlerInterface
    $module_handler
  ) {
    parent::__construct(
      'Plugin/GeoLocator',
      $namespaces,
      $module_handler,
      'Drupal\mymodule\Plugin\GeoLocator\GeoLocatorInterface',
      'Drupal\mymodule\Annotation\GeoLocator'
    );
    $this->setCacheBackend($cache_backend, 'geolocator_plugins');
    $this->alterInfo('geolocator_info');
  }

}
