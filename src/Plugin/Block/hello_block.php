<?php
namespace Drupal\hello\Plugin\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Cache\Cache;

/**
 * provide block a hello
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
  '#markup' => $this->t('Welcome %name %id. It is %time.',[
  	'%name' => \Drupal::CurrentUser()->getAccountName(),
  	'%id' => \Drupal::CurrentUser()->getAccount()->id(),
  	'%time' => \Drupal::service('date.formatter')
  	->format(\Drupal::service('datetime.time')->getCurrentTime(), 'custom', 'd F Y H:i:s'),
  ]),

  '#cache' => [
	  'keys'    => ['hello:block'],
	  'contexts'=> ['user'],
	  'max-age' => '100',
  ],
];

	return $build;
  }

 }