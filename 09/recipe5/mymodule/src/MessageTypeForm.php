<?php

namespace Drupal\mymodule;

use Drupal\Core\Entity\BundleEntityFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\mymodule\Entity\MessageType;

class MessageTypeForm extends BundleEntityFormBase {

  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    /** @var \Drupal\mymodule\Entity\MessageType $entity */
    $entity = $this->entity;

    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#required' => TRUE,
      '#default_value' => $entity->label,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $entity->id(),
      '#machine_name' => [
        'exists' => [MessageType::class, 'load'],
      ],
    ];

    return $this->protectBundleIdElement($form);
  }

  public function save(array $form, FormStateInterface $form_state) {
    $result = parent::save($form, $form_state);

    if ($result === SAVED_NEW) {
      $this->messenger()->addMessage('The messafe type has been created.');
    }
    else {
      $this->messenger()->addMessage('The message type has been updated.');
    }

    $form_state->setRedirectUrl($this->entity->toUrl('collection'));

    return $result;
  }

}
