<?php
namespace Drupal\hello\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Implement an hello form.
 */

class HelloForm extends FormBase {
/**
 * {@inheritdoc}.
 */
public function getFormId() {
	return 'hello_form';
}

/**
 * {@inheritdoc}.
 */
public function buildForm(array $form, FormStateInterface $form_state) {
	return $form;
}

/**
 * {@inheritdoc}.
 */
public function submitForm(array &$form, FormStateInterface $form_state) {
}

}