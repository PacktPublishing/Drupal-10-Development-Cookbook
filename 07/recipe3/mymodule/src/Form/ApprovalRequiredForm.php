<?php

namespace Drupal\mymodule\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class ApprovalRequiredForm extends FormBase {

  public function getFormId() {
    return 'mymodule_approval_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['approval'] = [
      '#type' => 'checkbox',
      '#title' => 'I acknowledge',
      '#required' => TRUE,
    ];
    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => 'Submit',
      '#states' => [
        'disabled' => [
          ':input[name="approval"]' => ['checked' => FALSE],
        ],
      ],
    ];

    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {

  }

}
