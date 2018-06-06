<?php
namespace Drupal\Hello\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\node\NodeInterface;
class HelloController3 extends ControllerBase {
  /**
   * 
   * @return  array
   */
public function content(NodeInterface $node = NULL) {
        $nid = $node->id();
       $database = \Drupal::database();
       $query = $database->select('hello_node_history', 'hnd')
           ->fields('hnd', ['uid', 'update_time'])
           ->condition('nid', $nid);
       $result = $query->execute();

       $rows = [];
       $uids = [];
       foreach($result as $record) {
           $rows[] = [
               $this->entityTypeManager()->getStorage('user')->load($record->uid)->toLink(),
               \Drupal::service('date.formatter')->format($record->update_time),
           ];
           //$uids[] = 'user:' . $record->uid;
       }

       $table = [
           '#theme'  => 'table',
           '#header' => [$this->t('Author'), $this->t('Update time')],
           '#rows'   => $rows,
       ];

      //On renvoi les render arrays.
       return [
        'table' => $table,
        '#cache'=> [
        'keys'  => ['hello:node_history:' . $node->id()],
        'tags'  => array_merge(['node' . $node->id()], $uids),
      ],
    ];
   }
}