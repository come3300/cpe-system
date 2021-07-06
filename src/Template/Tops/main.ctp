<?php

use PHP_CodeSniffer\Reports\Csv;

echo $this->Html->css('Top');
?>

<div class='login'>
  <div class="Login_header">
    <p class="header-title">CPE System</p>
    <a href="<?php echo $this->Url->build
              ([
                'controller' => 'Users',
                'action' => 'login',
              ]); ?>" class=“output”>ログイン画面へ</a>

  </div>

  <div class="operations">
    <div class="imports">
      <?= $this->Form->create("csvfile", ["type" => "file"]) ?>
      <?= $this->Form->file('csv', ['accept' => '.csv', "class" => "importbutton", 'name' => 'csvinput'],); ?>
      <?= $this->Form->file('csv', ['accept' => '.csv', "class" => "importbutton", 'name' => 'csvinput_ex'],); ?>
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
        <th>CHECK</th>
      </tr>

        　<--下記からcsvをまとめた配列のtable -->
        <?php
        foreach (array_map(null, $result_date, $result_number, $result_lend, $result_borrow) as
          [$date_value, $number_value, $lend_value, $borrow_value]) 
            { ?>
          <tr>
            <td><?= $date_value; ?> </td>
            <td><?= $number_value; ?></td>
            <td><?= $lend_value; ?></td>
            <td><?= $borrow_value; ?></td>
            <td><input type="checkbox" name="cb3" <?= rand(0, 100) < 50 ? 'checked' : '' ?>></td>
            
          </tr>
        <?php } ?>

    </table>
  </div>
</div>