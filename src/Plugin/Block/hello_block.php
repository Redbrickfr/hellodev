<?php
namespace Drupal\hello\Plugin\Block;
use Drupal\Core\Block\BlockBase;

/**
 * problockvide a hello
 *
 * @Block(
 * id = "hello_block",
 * admin_label = @Translation("Hello!")
 *)
 */
class hello_block extends BlockBase {

/** Implement Drupal\Core\Block\BlockBase::build ()**/

public function build(){
	$build = [
  '#markup' => $this->t('Welcome %name. It is %time.',[
  	'%name' => \Drupal::CurrentUser()->getAccountName(),
  	'%time' => \Drupal::service('date.formatter')
  	->format(\Drupal::service('datetime.time')->getCurrentTime(), 'custom', 'H:i s/s'),
  ]),
];

	return $build;
  }

 }