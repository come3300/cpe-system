<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use \SplFileObject;
use Cake\Routing\Router;
use Cake\View\ViewBuilder;

use function Psy\debug;

class TopsController extends AppController
{


  public function main()
  {
    

    if (isset($this->request->getData()['csv_reload'])) {
      //１個目のcsvファイルの処理を開始

      $fp = fopen($_FILES['csvinput']['tmp_name'], 'r');
      $csv_arr = [];

      while (($csv_arr[] = fgetcsv($fp)) !== false) {
        $date_columns = array_column($csv_arr, '1'); //日付番号のカラム

        $number_columns = array_column($csv_arr, '2'); //伝票No.のカラム

        $lend_columns = array_column($csv_arr, '14'); //貸方金額のカラム

        $borrow_columns = array_column($csv_arr, '21'); //借方金額のカラム

      };

      //1個目のcsvファイルの処理が終了　


      //2個目のファイルの処理開始
      $fp_ex = fopen($_FILES['csvinput_ex']['tmp_name'], 'r');
      $csv_arr_ex = [];
      while (($csv_arr_ex[] = fgetcsv($fp_ex)) !== false) {
        $date_columns_ex = array_column($csv_arr_ex, '1'); //日付番号のカラム

        $number_columns_ex = array_column($csv_arr_ex, '2'); //伝票No.のカラム 

        $lend_columns_ex = array_column($csv_arr_ex, '14'); //貸方金額のカラム

        $borrow_columns_ex = array_column($csv_arr_ex, '21'); //借方金額のカラム
      };

      //2個目のcsvファイルの処理が終了　




      // 2つの配列のkey名を変換する配列を用意

      $array_aaa =
        [
          '日付' => '',
          '伝票No' =>  '',
          '貸方金額' => '',
          '借方金額' => ''
        ];

      $array_bbb =
        [
          '日付' => '',
          '伝票No' =>  '',
          '貸方金額' => '',
          '借方金額' => ''

        ];

      // １個目のcsvファイルをforeachで展開&keyの書き換え

      foreach (array_map(null, $date_columns, $number_columns, $lend_columns, $borrow_columns) as
        [$date_val, $number_val, $lend_val, $borrow_val]) {
        $array_aaa  =
          [
            '日付' => $date_val,
            '伝票No' =>  $number_val,
            '貸方金額' => $lend_val,
            '借方金額' => $borrow_val,
          ];
        $array_aaaa[] = $array_aaa; //{}外で配列を渡す時 
      }
      array_splice($array_aaaa, 0, 8);


      // 2個目のcsvファイルをforeachで展開&keyの書き換え

      foreach (array_map(null, $date_columns_ex, $number_columns_ex, $lend_columns_ex, $borrow_columns_ex) as
        [$date_value_ex, $number_value_ex, $lend_value_ex, $borrow_value_ex]) {
        $array_bbb  =
          [
            '日付' => $date_value_ex,
            '伝票No' =>  $number_value_ex,
            '貸方金額' => $lend_value_ex,
            '借方金額' => $borrow_value_ex,
          ];
        $array_bbbb[] = $array_bbb; //{}外で配列を渡す時  
      }
      array_splice($array_bbbb, 0, 8);


      //1個目のcsvファイルのvalueを文字列に変換
      foreach ($array_aaaa as $csv_imp) {
        $fdfd[] = implode('/', $csv_imp);
      }

      //2個目のcsvファイルのvalueを文字列に変換
      foreach ($array_bbbb as $csv_imp_ex) {
        $ffff[] = implode('/', $csv_imp_ex);
      }

      $ccc = array_merge($array_aaaa, $array_bbbb); //2つのcsvファイルを合わせた合計

      $cccc = array_unique($ccc, SORT_REGULAR); //重複削除




      // 差分を表示
      foreach ($cccc as $k => $v) {
        if (!in_array($v, $array_aaaa)) //差分　最初のcsvファイル
        {
          $answer[] = $v;
        }
      }

      foreach ($cccc as $ke => $va) {
        if (!in_array($va, $array_bbbb)) //差分　2つ目のcsvファイル
        {
          $answer_ex[] = $va;
        }
      }

      // var_dump(array_column($answer, '伝票No'));

      if (isset($answer)) {
        $denpyouNo = array_column($answer, '伝票No');
      }
      $this->set(compact('cccc', 'denpyouNo'));

      
       if (isset($this->request->getData()['cccc']) ) {
      $_serialize = 'cccc';
      $this->response = $this->response->withDownload('my-file.csv');
      $this->viewBuilder()->setclassName('CsvView.Csv');
      $this->set(compact('cccc', '_serialize'));
    }
    }

    // ファイルにするボタンでcsvファイルに変換してファイルを受け取る
  }

 
}
