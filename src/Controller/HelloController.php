<?php
namespace Drupal\Hello\Controller;
use Drupal\Core\Controller\ControllerBase;
class HelloController extends ControllerBase {
  /**
   * 
   * @return  array
   */
  public function content() {
    $messages = [];
    
    // Route message.
    $messages[] = $this->t(
      'You are on the %route_name page!',
      [
        '%route_name' => 'Liste pages',
      ]
    );
    
    // User name message.
    $user = $this->currentUser();
    
    if ($user->isAnonymous()) {
      $messages[] = $this->t('Your are not connected.');
    } else {
      $messages[] = $this->t(
        'Your user name is %username.',
        [ 
          '%username' => $user->getAccountName(), 
        ]
      );
    }
    
    return [
      '#markup' => implode(' ', $messages),
    ];
  }
}