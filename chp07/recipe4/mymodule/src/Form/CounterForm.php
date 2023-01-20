<?php

namespace Drupal\mymodule\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class CounterForm extends FormBase {

  public function getFormId() {
    return 'mymodule_counter_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $count = $form_state->get('count') ?: 0;

    $form['count'] = [
      '#markup' => "<p>Total count: $count",
      '#prefix' => '<div id="counter">',
      '#suffix' => '</div>',
    ];
    $form['increment'] = [
      '#type' => 'submit',
      '#value' => 'Increment',
      '#ajax' => [
        'callback' => [$this, 'ajaxRefresh'],
        'wrapper' => 'counter',
      ],
    ];
    return $form;
  }

  public function ajaxRefresh(array $form, FormStateInterface $form_state) {
    return $form['count'];
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $count = $form_state->get('count') ?: 0;
    $form_state->set('count', ++$count);
    $form_state->setRebuild();
  }

}
