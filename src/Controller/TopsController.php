<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Filesystem\File;
use Cake\Filesystem\Folder;
use \SplFileObject;
use Cake\Routing\Router;
use Cake\Utility\Hash;
use Cake\View\ViewBuilder;
use PhpParser\Node\Stmt\Foreach_;

use function Psy\debug;

class TopsController extends AppController
{

  public function delete_array()
  {

    $delete_array = [

      '日付' => '',
      '伝票No' => '',
      '借方勘定科目' => '',
      '借方税区分' => '',
      '貸方勘定科目' => '',
      '貸方税区分' => '',
      '摘要' => ''

    ];

    return $delete_array;
  }

  public function main()
  {

    if (isset($this->request->getData()['csv_reload'])) {

      $file = $_FILES['csvinput'];
      $file_ex = $_FILES['csvinput_ex'];

      $csvObj = new SplFileObject($file['tmp_name']);
      $csvObj->setFlags(SplFileObject::READ_CSV);

      $csvObj_ex = new SplFileObject($file_ex['tmp_name']);
      $csvObj_ex->setFlags(SplFileObject::READ_CSV);

      $array_changed = [
        '日付' => '',
        '伝票No' => '',
        '借方勘定科目' => '',
        '借方税区分' => '',
        '借方金額' => '',
        '貸方勘定科目' => '',
        '貸方税区分' => '',
        '貸方金額' => '',
        '摘要' => '',
      ];

      foreach ($csvObj as $expen_key => $expen_value) {
        $once_changed = [
          '日付' => $expen_value[1],
          '伝票No' => $expen_value[2],
          '借方勘定科目' => $expen_value[9],
          '借方税区分' => $expen_value[12],
          '借方金額' => $expen_value[14],
          '貸方勘定科目' => $expen_value[16],
          '貸方税区分' => $expen_value[19],
          '貸方金額' => $expen_value[21],
          '摘要' => $expen_value[23],
        ];
        $previus_tre[] = $once_changed;
      }

      foreach ($csvObj_ex as $expen_key => $expen_value) {
        $second_changed = [
          '日付' => $expen_value[1],
          '伝票No' => $expen_value[2],
          '借方勘定科目' => $expen_value[9],
          '借方税区分' => $expen_value[12],
          '借方金額' => $expen_value[14],
          '貸方勘定科目' => $expen_value[16],
          '貸方税区分' => $expen_value[19],
          '貸方金額' => $expen_value[21],
          '摘要' => $expen_value[23],
        ];
        $current_tre[] = $second_changed;
      }

      $expenses_match = array_merge($previus_tre, $current_tre); //2つのcsvファイルを合わせた合計

      $dupli_treat = array_unique($expenses_match, SORT_REGULAR); //重複削除 

      array_splice($dupli_treat, 0, 8); //余分な最初の行を削除する

      $delete_array = $this->delete_array(); //削除対象の配列の関数を呼び出しする

      for ($i = 0; $i < count($dupli_treat); $i++) {

        if (Hash::contains($dupli_treat[$i], $delete_array)) {

          unset($dupli_treat[$i]);
          continue;
        }
      }



      foreach ($dupli_treat as $key_once => $val_once) {

        if (!in_array($val_once, $previus_tre)) //差分 最初のcsvファイル
        {
          $answer[] = $val_once;
        }
      }


      /* foreach ($dupli_treat as $key_second => $val_second) {
        if (!in_array($val_second, $current_tre)) //差分 2つ目のcsvファイル
        {
          $answer_ex[] = $val_second;
        }
      } */

      //1つ目の配列の差分だけを抽出した配列
      if (!is_null($answer)) {

        $slipNo = array_column($answer, '伝票No');
      }

      /* 2つ目の配列の差分だけを抽出した配列
        if(isset($answer)){
        $slipNo_2= array_column($answer_ex, '伝票No');
      } */

      $this->set(compact('dupli_treat', 'slipNo'));
    }




    if (isset($this->request->getData()['date_column'])) {

      $dates = $this->request->getData()['date_column'];
      $number =  $this->request->getData()['No_column'];
      $borrow_account = $this->request->getData()['borrow_account'];
      $borrow_tax = $this->request->getData()['borrow_tax'];
      $borrow_column = $this->request->getData()['borrow_column'];
      $lend_account = $this->request->getData()['lend_account'];
      $lend_tax = $this->request->getData()['lend_tax'];
      $lend_column =   $this->request->getData()['lend_column'];
      $description = $this->request->getData()['description'];
      $dupli_val = $this->request->getData()['dupli_val'];


      $array = [];
      $diff_deletes = [
        '日付' => ''
      ];




      // 差分の伝票Noを展開
      foreach ($dupli_val as $diff_key => $diff_No) {

        $diff_deletes = [

          '日付' => $diff_No

        ];

        $diff_val[] = $diff_deletes;
      }


      //日付を展開
      foreach ($dates as  $d) {

        $array_date[] = $d;
      }


      //伝票Noを展開
      foreach ($number as  $n) {

        $array_number[] = $n;
      }


      //借方勘定科目を展開
      foreach ($borrow_account as  $k) {

        $borrow_values[] = $k;
      }


      //借方税区分を展開

      foreach ($borrow_tax as  $tax) {

        $borrow_taxes[] = $tax;
      }


      //借方金額を展開
      foreach ($borrow_column as  $borrow_val) {

        $borrow_arrays[] = $borrow_val;
      }


      //貸方勘定科目を展開 
      foreach ($lend_account as  $lend_val) {

        $lend_values[] = $lend_val;
      }


      // 貸方税区分を展開
      foreach ($lend_tax as  $tax_lends) {

        $lend_taxes[] = $tax_lends;
      }


      //貸方金額を展開
      foreach ($lend_column as  $lend_vals) {

        $lend_columns[] = $lend_vals;
      }


      //摘要を展開  
      foreach ($description as  $description_val) {

        $descriptions[] = $description_val;
      }

      for ($i = 0; $i < count($dates); $i++) {

        $array[$i] = [

          '日付' => $array_date[$i],
          '伝票No' =>  $array_number[$i],
          '借方勘定科目' => $borrow_values[$i],
          '借方税区分' => $borrow_taxes[$i],
          '借方金額' => $borrow_arrays[$i],
          '貸方勘定科目' => $lend_values[$i],
          '貸方税区分' => $lend_taxes[$i],
          '貸方金額' => $lend_columns[$i],
          '摘要' => $descriptions[$i]
        ];

        $array_result[] = $array[$i];
      }



      for ($i = 0; $i < count($array_result); $i++) {
        for ($j = 0; $j < count($diff_val); $j++) {
          if ($array_result[$i]['伝票No'] === $diff_val[$j]['日付']) {

            unset($array_result[$i]);
          }
        }
        // if (Hash::contains($array_result[$i], $diff_val)) {

        //   unset($array_result[$i]);
        //   continue;
        // }
      }

      $_serialize = 'array_result';

      $_header = array('日付', '伝票No', '借方勘定科目', '借方税区分', '借方金額', '貸方勘定科目', '貸方税区分', '貸方金額', '概要');
      $this->response = $this->response->withDownload('my-file.csv');
      $this->viewBuilder()->setclassName('CsvView.Csv');
      $this->set(compact('array_result', '_header', '_serialize'));
    }
  }
}


