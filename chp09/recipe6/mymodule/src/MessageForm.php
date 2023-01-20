<?php

namespace Drupal\mymodule;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

class MessageForm extends ContentEntityForm {

  public function save(array $form, FormStateInterface $form_state) {
    $result = parent::save($form, $form_state);

    if ($result === SAVED_NEW) {
      $this->messenger()->addMessage('The message has been created.');
    }
    else {
      $this->messenger()->addMessage('The message has been updated.');
    }

    $form_state->setRedirectUrl($this->entity->toUrl('collection'));

    return $result;
  }

}
