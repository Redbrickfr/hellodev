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
	$build = array('markup' => $this->t('Welcome'));

	return $build;
  }

 }