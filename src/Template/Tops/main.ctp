<?php

use PHP_CodeSniffer\Reports\Csv;


echo $this->Html->css('Top');
?>

<div class='login'>
  <div class="Login_header">
    <p class="header-title">CPE System</p>
    <?= $this->html->link(
      'ログイン画面へ',
      "http://192.168.10.10/users/login",
      ['class' => 'button']
    ); ?>
  </div>

  <div class="operations">
    <div class="imports">
      <?= $this->Form->create("csvfile", ["type" => "file"]) ?>
      <?= $this->Form->file('csv', ['accept' => '.csv', "class" => "importbutton",'name' => 'csvinput'],); ?>
      <?= $this->Form->file('csv', [ 'accept' => '.csv', "class" => "importbutton",'name' => 'csvinput_ano'],); ?>
      <?= $this->Form->submit('更新する', ['class' => 'reload',]); ?>
      <?= $this->Form->end(); ?>
     
    </div>

    <div class="exports">
      <?= $this->Form->button('ファイルにする', ['class' => 'export']); ?>
    </div>
  </div>

  <div　class="bookkeep-table">
    <table class="maintable">
      <tr>
        <th>日付</th>
        <th>伝票番号</th>
        <th>借方</th>
        <th>貸方</th>
      </tr>
    </table>
    　　
  </div>
</div>