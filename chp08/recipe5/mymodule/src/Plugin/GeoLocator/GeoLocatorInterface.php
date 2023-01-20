<?php

namespace Drupal\mymodule\Plugin\GeoLocator;

use Symfony\Component\HttpFoundation\Request;

interface GeoLocatorInterface {

  /**
   * Get the plugin's label.
   *
   * @return string
   *   The geolocator label
   */
  public function label();

  /**
   * Performs geolocation on an address.
   *
   * @param Request $request
   *   The request.
   *
   * @return string|NULL
   *   The geolocated country code, or NULL if not found.
   */
  public function geolocate(Request $request): ?string;
}
