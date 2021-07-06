<?php

use PHP_CodeSniffer\Reports\Csv;

echo $this->Html->css('Top');
?>

<div class='login'>
  <div class="Login_header">
    <p class="header-title">CPE System</p>
    <a href="<?php echo $this->Url->build([
                'controller' => 'Users',
                'action' => 'login',
              ]); ?>" class=“output”>ログイン画面へ</a>

  </div>
  <div class="operations">
    <div class="imports">
      <?= $this->Form->create("csvfile", ["type" => "file"]) ?>
      <?= $this->Form->file('csv', ['accept' => '.csv', "class" => "importbutton", 'name' => 'csvinput'],); ?>
      <?= $this->Form->file('csv', ['accept' => '.csv', "class" => "importbutton", 'name' => 'csvinput_ex'],); ?>
      <?= $this->Form->submit('更新する', ['class' => 'reload', "name" => "csv_reload"]); ?>
      <?= $this->Form->end(); ?>
    </div>
    <?= $this->Form->create("csvfile", ["type" => "file"]) ?>
    <?= $this->Form->submit('ファイルにする', ['class' => 'export', "name" => "csv_change"]); ?>
    <?= $this->Form->end(); ?>
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
    <?php foreach ($cccc as $ccc) { ?>
      <tr>
        <td><?= $ccc['日付'] ?></td>
        <td><?= $ccc['伝票No'] ?></td>
        <td><?= $ccc['借方金額']  ?></td>
        <td><?= $ccc['貸方金額'] ?></td>
        <td><input type="checkbox" name="cb3" value='check' <?= in_array($ccc['伝票No'], $denpyouNo, true) ? 'checked' : '' ?>></td>
      </tr>

    <?php } ?>
</div>
</table>　
</div>
</div>