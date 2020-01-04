<?php

namespace Drupal\basic_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class BasicForm extends FormBase {

    public function getFormId()
    {
        return 'basic_form';
    }

    public function buildForm(array $form, \Drupal\Core\Form\FormStateInterface $form_state)
    {
        $form['name'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Enter your name'),
            '#required' => TRUE,
        ];
        $form['birthdate'] = [
            '#type' => 'date',
            '#title' => $this->t('Enter your birthdate'),
            '#required' => TRUE,
        ];
        $form['age'] = [
            '#type' => 'tel',
            '#title' => $this->t('Enter your age'),
            '#required' => TRUE,
        ];
        $form['gender'] = [
            '#type' => 'select',
            '#title' => $this->t('Choose your Gender'),
            '#options' => array(
                '' => $this->t('Choose'),
                'Male' => $this->t('Male'),
                'Female' => $this->t('Female'),
                'Other' => $this->t('Other'),
            ),
            '#required' => TRUE,
        ];
        $form['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Submit'),
        ];

        return $form;
    }

    public function submitForm(array &$form,FormStateInterface $form_state)
    {
        $this->messenger()->addStatus($this->t('Your name is @name', ['@name'=>$form_state->getValue('name')]));
        $this->messenger()->addStatus($this->t('Your birthdate is @birth', ['@birth'=>$form_state->getValue('birthdate')]));
        $this->messenger()->addStatus($this->t('Your age is @age', ['@age'=>$form_state->getValue('age')]));
        $this->messenger()->addStatus($this->t('Your gender is @gender', ['@gender'=>$form_state->getValue('gender')]));
    }
}