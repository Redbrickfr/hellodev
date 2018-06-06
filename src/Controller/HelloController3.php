<?php
namespace Drupal\Hello\Controller;
use Drupal\Core\Controller\ControllerBase;
class HelloController3 extends ControllerBase {
  /**
   * 
   * @return  array
   */
  public function content() {
    
  return [
    '#markup'=> 'test'
  ];

  }
}
