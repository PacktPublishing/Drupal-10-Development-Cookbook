<?php

namespace Drupal\mymodule\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\user\UserInterface;

class HelloWorldController extends ControllerBase {

  /**
   * Returns markup for our custom page.
   *
   * @param \Drupal\user\UserInterface $user
   *   The user parameter.
   *
   * @returns array
   *   The render array.
   */
  public function page(UserInterface $user): array {
    return [
      '#markup' => sprintf('<p>Hello %s!</p>', $user->getEmail()),
    ];
  }

}
