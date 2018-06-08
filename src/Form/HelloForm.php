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

		// Récupère et stocke la valeur de mon champ 'operation'.
		$operation = $form_state->getValue('operation');

		// Ajoute un message d'erreur lorsque l'opération est une division ( = 4 ) et que le deuxième nombre  ('second_value') est égal à 0.
		if ($operation == 4 && $second_value == 0){
			// Ajoute un message d'erreur sur le champ 'second_value'.
			$form_state->setErrorByName('second_value', $this->t('cannot divide by 0'));
		}
}

/**
 * {@inheritdoc}.
 */
public function submitForm(array &$form, FormStateInterface $form_state) {
	$first_value = $form_state->getValue('first_value');
	$second_value = $form_state->getValue('second_value');
	$operation = $form_state->getValue('operation');

	switch ($operation){
		case 1:
			// 
			$result = $first_value+$second_value;
			break;
	}

	// Affiche le résultat dans un message.
	drupal_set_message($form_state->getValue('first_value') + $form_state->getValue('second_value'));
		}
}