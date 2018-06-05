<?php
namespace Drupal\hello\Plugin\Block;
use Drupal\Core\Block\BlockBase;

/**
 * provide a block session
 *
 * @Block(
 * id = "ListArticles",
 * admin_label = @Translation("Session active")
 *)
 */
class ListArticles extends BlockBase {

	public function build(){
		
		return [
			
		],
	  ];
	}
}
       