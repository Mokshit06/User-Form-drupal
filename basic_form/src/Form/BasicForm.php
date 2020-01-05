<?php

namespace Drupal\basic_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Implements a basic form.
 */
class BasicForm extends FormBase {

  /**
   * {@inheritDoc}
   */
  public function getFormId() {
    return 'basic_form';
  }

  /**
   * {@inheritDoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // Create text input for name.
    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Enter your name'),
      '#required' => TRUE,
    ];
    // Create date input for birthdate.
    $form['birthdate'] = [
      '#type' => 'date',
      '#title' => $this->t('Enter your birthdate'),
      '#required' => TRUE,
    ];
    // Create numeric input for age.
    $form['age'] = [
      '#type' => 'tel',
      '#title' => $this->t('Enter your age'),
      '#required' => TRUE,
    ];
    // Create selection input for gender.
    $form['gender'] = [
      '#type' => 'select',
      '#title' => $this->t('Choose your Gender'),
      '#options' => [
        '' => $this->t('Choose'),
        'Male' => $this->t('Male'),
        'Female' => $this->t('Female'),
        'Other' => $this->t('Other'),
      ],
      '#required' => TRUE,
    ];
    // Create submit button.
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * {@inheritDoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->messenger()->addStatus($this->t('Your name is @name', ['@name' => $form_state->getValue('name')]));
    $this->messenger()->addStatus($this->t('Your birthdate is @birth', ['@birth' => $form_state->getValue('birthdate')]));
    $this->messenger()->addStatus($this->t('Your age is @age', ['@age' => $form_state->getValue('age')]));
    $this->messenger()->addStatus($this->t('Your gender is @gender', ['@gender' => $form_state->getValue('gender')]));
  }

}
