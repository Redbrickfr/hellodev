<?php
namespace Drupal\Hello\Controller;
use Drupal\Core\Controller\ControllerBase;
class HelloController2 extends ControllerBase {
  /**
   * 
   * @return  array
   */
  public function content($nodetype = NULL) {
    $query = $this->entityTypeManager()->getStorage('node')->getQuery();

    //Si on a un argument dans url, on ne cible que les noeuds correspondants
    if ($nodetype) {
      $query->condition('type', $nodetype);
    }
    //on construit une requête paginée
    $nids = $query->pager('3')->execute();

    //Charge les noeuds correspondants
    $nodes = $this->entityTypeManager()->getStorage('node')->loadMultiple($nids);

    //Construit un tableau de liens
    $items = [];
    foreach ($nodes as $node) {
      $items[] = $node->toLink();
    }
    $list = [
      '#theme' => 'item_list',
      '#items' => $items, 
      '#title' => $this->t(''),
    ];
    
    $pager = ['#type' => 'pager'];

  return [
    'page_top' => $pager,
    'list' => $list,
    'pager' => $pager,
    '#cache' => [
      'keys'  => ['hello:node_list'],
      'tags' => ['node_list'],
    ],
  ];

  }
}
