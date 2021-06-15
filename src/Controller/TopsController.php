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
      $i=0;

      //１個目のcsvファイルの処理を開始

      $fp = fopen($_FILES['csvinput']['tmp_name'], 'r');
      $csv_arr = [];
      
      while (($csv_arr[] = fgetcsv($fp)) !== false){
    
      };
    $first_columns = array_column($csv_arr, '1'); //日付番号のカラム
    $second_columns = array_column($csv_arr, '2');//伝票No.のカラム 
    $third_columns = array_column($csv_arr, '14');//貸方金額のカラム
    $fouth_columns = array_column($csv_arr, '21');//借方金額のカラム

    $csv_parts= [$first_columns, $second_columns, $third_columns, $fouth_columns];
    // fclose($fp);

   //1個目のcsvファイルの処理が終了

   //2個目のファイルの処理開始
    $fp_another = fopen($_FILES['csvinput_ano']['tmp_name'], 'r');
    $csv_arr_another = [];
    while (($csv_arr_another[] = fgetcsv($fp_another)) !== false) {
    };

      $first_columns_ano = array_column($csv_arr_another, '1'); //日付番号のカラム
      $second_columns_ano = array_column($csv_arr_another, '2'); //伝票No.のカラム 
      $third_columns_ano = array_column($csv_arr_another, '14'); //貸方金額のカラム
      $fouth_columns_ano = array_column($csv_arr_another, '21'); //借方金額のカラム

      $csv_parts_another = [$first_columns_ano, $second_columns_ano, $third_columns_ano, $fouth_columns_ano];
      // fclose($fp_another);

    //2個目のファイルの処理終了

    //上記2つのファイル($_FILES['csvinput']; $_FILES['csvinput_ano'];)を合わせる処理

      if ($this->request->is('post')) {
      $result_first = array_merge($first_columns, $first_columns_ano);//日付番号のカラムの合計
      $result_second = array_merge($second_columns, $second_columns_ano);//伝票No.のカラムの合計
      $result_third = array_merge($third_columns, $third_columns_ano);//貸方金額のカラムの合計
      $result_fouth = array_merge($fouth_columns, $fouth_columns_ano);//借方金額のカラムの合計
      $results = [$result_first, $result_second, $result_third, $result_fouth];
     
      }
      
    }
  }
 
  
 


  
 

