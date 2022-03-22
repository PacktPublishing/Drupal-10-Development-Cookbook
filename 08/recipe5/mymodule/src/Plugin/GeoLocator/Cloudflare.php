<?php

namespace Drupal\mymodule\Plugin\GeoLocator;

use Drupal\Core\Plugin\PluginBase;
use Symfony\Component\HttpFoundation\Request;

/**
 * @GeoLocator(
 *   id = "cloudflare",
 *   label = "Cloudflare"
 * )
 */
class Cloudflare extends PluginBase implements GeoLocatorInterface {

  public function label() {
    return $this->pluginDefinition['label'];
  }

  public function geolocate(Request $request): ?string {
    return $request->headers->get('CF-IPCountry');
  }

}
