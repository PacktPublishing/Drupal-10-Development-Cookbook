<?php

namespace Drupal\mymodule\EventSubscriber;

use Drupal\Core\Url;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class RequestSubscriber implements EventSubscriberInterface {

  /**
    * Redirects all anonymous users to the login page.
    *
    * @param \Symfony\Component\HttpKernel\Event\RequestEvent $event
    *    The event.
    */
  public function doAnonymousRedirect(RequestEvent $event) {
    // Make sure we are not on the user login route.
    if (\Drupal::routeMatch()->getRouteName() == 'user.login') {
      return;
    }
    // Check if the current user is logged in.
    if (\Drupal::currentUser()->isAnonymous()) {
      // If they are not logged in, create a redirect response.
      $url = Url::fromRoute('user.login')->toString();
      $redirect = new RedirectResponse($url);
      // Set the redirect response on the event, cancelling default response.
      $event->setResponse($redirect);
    }
  }

  /**
    * {@inheritdoc}
    */
  public static function getSubscribedEvents() {
    return [
      KernelEvents::REQUEST => ['doAnonymousRedirect', 28],
    ];
  }

}
