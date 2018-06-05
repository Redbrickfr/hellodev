<?php
namespace Drupal\hello\Plugin\Block;
use Drupal\Core\Block\BlockBase;

/**
 * provide a block session
 *
 * @Block(
 * id = "session_block",
 * admin_label = @Translation("Session active")
 *)
 */
class SessionBlock extends BlockBase {

	public function build(){
		$number = \Drupal::database()->select('sessions')
		  ->countQuery()
		  ->execute()
		  ->fetchField();
		return [
			'#markup' => $this->t('Session number: %number',['%number'=>$number]),
			'#cache'  => [
			'#keys'   => ['session:sessions'],
			'max-age' => '10',
		],
	  ];
	}
}
       