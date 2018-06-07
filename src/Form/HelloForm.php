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
	
	$form['first_value'] = [
		'#type' => 'textfield',
		'#required'=> true,
		'#title'=> $this->t('FIrst number'),
	];

	$form['operation'] = [
		'#type' => 'radios',
		'#required'=> true,
		'#title'=> $this->t('Operation'),
		'#default_value' => 2,
		'#options'=>[
			1 => $this->t('Ajouter'),
			2 => $this->t('Soustraire'),
			3 => $this->t('Multiply'),
			4 => $this->t('Diviser'),
		],
	];

	$form['second_value'] = [
		'#type' => 'textfield',
		'#required'=> true,
		'#title'=> $this->t('Second number'),
	];

	$form['submit'] = [
		'#type' => 'submit',
		'#value'=> $this->t('calculate'),
	];

	return $form;
}

public function validateForm(array &$form, FormStateInterface $form_state) {
		$first_value = $form_state->getValue('first_value');
		if (!is_numeric($first_value)) {
			$form_state->setErrorByName('first_value', $this->t('Value 1 must be numeric'));
		}

		$second_value = $form_state->getValue('second_value');
		if (!is_numeric($second_value)) {
			$form_state->setErrorByName('second_value', $this->t('Value 2 must be numeric too !'));
		}
}

/**
 * {@inheritdoc}.
 */
public function submitForm(array &$form, FormStateInterface $form_state) {
	drupal_set_message($form_state->getValue('first_value') + $form_state->getValue('second_value'));
		}
}