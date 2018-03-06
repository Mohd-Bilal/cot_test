<?php

namespace Drupal\test\Controller;

use Drupal\Core\Controller\ControllerBase;

class testController extends ControllerBase {
  /**
   * Display test data
   * 
   * @return array
   */

   public function test() {
     $select = $this -> load();
     foreach($select as $entry){
      $rows[] = array_map('Drupal\Component\Utility\SafeMarkup::checkPlain', (array) $entry);
    }

     return $array = array(
       '#type' => 'table',
       '#header' => [t('uid'),t('uuid'),t('langcode')],
       '#rows' => $rows,
       '#empty' => t('No entries available')
    
     );
    //  return $array = array(
    //    '#type' => 'markup',
    //    '#markup' => $rows

    //  );
    }
   public function load(){
    $database = \Drupal::database(); 
    $query = $database->query("SELECT * FROM users");
    $result = $query->fetchAll();
    return $result;
   } 
}





