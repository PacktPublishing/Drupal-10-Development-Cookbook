<?php

namespace Drupal\mymodule\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class CompanyForm extends FormBase {

  public function getFormId() {
    return 'company_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $company_settings = $this->config('mymodule.company_settings');
    $form['company_name'] = [
      '#type' => 'textfield',
      '#title' => 'Company name',
      '#default_value' => $company_settings->get('company_name'),
    ];
    $form['company_telephone'] = [
      '#type' => 'tel',
      '#title' => 'Company telephone',
      '#default_value' => $company_settings->get('company_telephone'),
    ];
    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => 'Submit',
    ];
    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->configFactory()->getEditable('mymodule.company_settings');
    $config->set('company_name', $form_state->getValue('company_name'));
    $config->set('company_telephone', $form_state->getValue('company_telephone'));
    $config->save();
    $this->messenger()->addStatus('Updated company information');
  }

}
