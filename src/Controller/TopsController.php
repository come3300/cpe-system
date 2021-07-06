<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use \SplFileObject;

use function Psy\debug;

class TopsController extends AppController
{


  public function main()
  {  

      //１個目のcsvファイルの処理を開始

      $fp = fopen($_FILES['csvinput']['tmp_name'], 'r');
      $csv_arr = [];
      
      while (($csv_arr[] = fgetcsv($fp)) !== false)
      {
      $date_columns = array_column($csv_arr, '1'); //日付番号のカラム
      $date_value  = array_values($date_columns); //日付番号の値

      $number_columns = array_column($csv_arr, '2'); //伝票No.のカラム
      $number_value = array_values($number_columns); //伝票No.の値

      $lend_columns = array_column($csv_arr, '14'); //貸方金額のカラム
      $lend_value  = array_values($lend_columns); //貸方金額の値

      $borrow_columns = array_column($csv_arr, '21'); //借方金額のカラム
      $borrow_value  = array_values($borrow_columns); //借方金額の値
    
      };


    $csv_parts = [$date_columns, $number_columns, $lend_columns, $borrow_columns];
    $csv_values = [$date_value, $number_value, $lend_value, $borrow_value];

    // fclose($fp);

   //1個目のcsvファイルの処理が終了

   //2個目のファイルの処理開始
    $fp_ex = fopen($_FILES['csvinput_ano']['tmp_name'], 'r');
    $csv_arr_another = [];
    while (($csv_arr_ex[] = fgetcsv($fp_ex)) !== false) 
    {
      $date_columns_ex = array_column($csv_arr_ex, '1'); //日付番号のカラム
      $date_value_ex  = array_values($date_columns_ex); //日付番号の値

      $number_columns_ex = array_column($csv_arr_ex, '2'); //伝票No.のカラム 
      $number_value_ex   = array_values($number_columns_ex); //伝票No.の値


      $lend_columns_ex = array_column($csv_arr_ex, '14'); //貸方金額のカラム
      $lend_value_ex   = array_values($lend_columns_ex); //貸方金額の値


      $borrow_columns_ex = array_column($csv_arr_ex, '21'); //借方金額のカラム
      $borrow_value_ex   = array_values($borrow_columns_ex); //借方金額の値
    };

    $csv_values_ex     = [$date_value_ex, $number_value_ex, $lend_value_ex, $borrow_value_ex];

    $csv_parts_another = [$date_columns_ex, $number_columns_ex, $lend_columns_ex, $borrow_columns_ex];

      // fclose($fp_another);

    //2個目のファイルの処理終了

    //上記2つのファイル($_FILES['csvinput']; $_FILES['csvinput_ano'];)を合わせる処理

      if ($this->request->is('post')) 
      {
      $result_date = array_merge($date_columns, $date_columns_ex); //日付番号のカラムの合計
      $result_number = array_merge($number_columns, $number_columns_ex); //伝票No.のカラムの合計
      $result_lend = array_merge($lend_columns, $lend_columns_ex); //貸方金額のカラムの合計
      $result_borrow = array_merge($borrow_columns, $borrow_columns_ex); //借方金額のカラムの合計

      $results = [$result_date, $result_number, $result_lend, $result_borrow];

      }
      
    }
  }
 
  
 


  
 

