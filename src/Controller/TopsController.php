<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class TopsController extends AppController
{

  public function main()
  {

  }

  public function add()
  {
    $article = $this->Articles->newEntity();
    $tmp_file_name = $_FILES["csv"]["tmp_name"];
    $data = array();
    if (is_uploaded_file($tmp_file_name)) {
      $csv_contents = fopen($tmp_file_name, "r");
      while (($csv_content = fgetcsv($csv_contents, 0, ",")) !== FALSE) {
        $data[] = mb_convert_encoding($csv_content, 'UTF-8', "auto");  // エンコード
      }
    }
    $article = $this->Articles->patchEntity($article, $data);
    if ($this->Articles->save($article)) {
      $connection->commit();
      $this->Flash->success(__('CSVファイルを追加しました'));
      return $this->redirect(['action' => 'index']);
    }
    $this->log(print_r($deposits->getErrors(), true), LOG_DEBUG);
    $this->Flash->error(__('CSVファイルを追加できませんでした'));
  }
  






}