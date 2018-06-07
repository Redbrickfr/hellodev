<?php
namespace Drupal\Hello\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Implement admin form
 */
class HelloAdminForm extends ConfigFormBase {

/**
 * {@inheritdoc}.
 */
    public function getFormId() {
        return 'admin_form';    
    }

  /**
 * {@inheritdoc}.
 */
    protected function getEditableConfigNames() {
        return ['hello.config'];
    }

/**
 * {@inheritdoc}.
 */   
    public function buildForm(array $form, FormStateInterface $form_state) {
        $color = $this->config('hello.config')->get('color');
        $form['color'] = [
        '#type' => 'select',
        '#title'=> $this->t('Select a block color'),
        '#options'=>[
          '' => $this->t('No color'),
          'blue-class' => $this->t('blue'),
          'green-class' => $this->t('green'),
          'red-class' => $this->t('pink'),
        ],
          '#default_value'=> $color,
  ];
        
        return parent::buildForm($form,$form_state);
    }
/**
 * {@inheritdoc}.
 */ 
    public function submitForm(array &$form, FormStateInterface $form_state) {
      $this->config('hello.config')
      ->set('color',$form_state->getValue('color'))
      ->save();
    }
}