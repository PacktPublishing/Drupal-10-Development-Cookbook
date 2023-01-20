<?php

namespace Drupal\mymodule\Plugin\GeoLocator;

use Drupal\Core\Plugin\PluginBase;
use Symfony\Component\HttpFoundation\Request;

/**
 * @GeoLocator(
 *   id = "request_query",
 *   label = "Request query"
 * )
 */
class RequestQuery extends PluginBase implements GeoLocatorInterface {

  public function label() {
    return $this->pluginDefinition['label'];
  }

  public function geolocate(Request $request): ?string {
    return $request->query->get('countryCode');
  }

}
