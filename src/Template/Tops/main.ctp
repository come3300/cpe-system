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
  </div>
</div>
<?php

?>



  <table class="maintable">
    <tr>
      <th>日付</th>
      <th>伝票No.</th>
      <th>借方勘定科目</th>
      <th>借方税区分</th>
      <th>借方金額</th>
      <th>貸方勘定科目</th>
      <th>貸方税区分</th>
      <th>貸方金額</th>
      <th>摘要</th>
      <th>差分表示</th>
      <th>CHECK</th>

    </tr>

    <?php


    if (is_null($slipNo)) {

      echo '差分はありませんでした';

      exit;
    } ?>


    <?php foreach ($dupli_treat as $dupli_val) { ?>

      <tr>
        <td><?= $dupli_val['日付'] ?></td> 
        <td><?= $dupli_val['伝票No'] ?></td>
        <td><?= $dupli_val['借方勘定科目']  ?></td>
        <td><?= $dupli_val['借方税区分'] ?></td>
        <td><?= $dupli_val['借方金額'] ?></td>
        <td><?= $dupli_val['貸方勘定科目'] ?></td>
        <td><?= $dupli_val['貸方税区分']  ?></td>
        <td><?= $dupli_val['貸方金額'] ?></td>
        <td><?= $dupli_val['摘要'] ?></td>
        <td>
          <input type="checkbox" name="cb3" value='check' <?= in_array($dupli_val['伝票No'], $slipNo, true) ? 'checked' : '' ?>>
        </td>

        <?= $this->Form->create("csvfile", ["type" => "file", "name" => "csv_export"]) ?>
        <td>
          <input type="checkbox" name=dupli_val[] value='<?= $dupli_val['伝票No'] ?>'>
        </td>
      </tr>
    <?php } ?>



    <table>
      <?php

      $i = 0;

      //ファイルをエクスポートする時のリクエスト処理
      if (!is_null($dupli_treat)) {


        for ($i = 0; $i < count($dupli_treat); $i++) {

          if ($dupli_treat[$i] === null) {

            unset($dupli_treat[$i]);
            continue;
          }



      ?>

          <input type='hidden' name='date_column[]' value='<?= $dupli_treat[$i]['日付'] ?>'>

          <input type='hidden' name='No_column[]' value='<?= $dupli_treat[$i]['伝票No'] ?>'>

          <input type='hidden' name='borrow_account[]' value='<?= $dupli_treat[$i]['借方勘定科目'] ?>'>

          <input type='hidden' name='borrow_tax[]' value='<?= $dupli_treat[$i]['借方税区分'] ?> '>

          <input type='hidden' name='borrow_column[]' value='<?= $dupli_treat[$i]['借方金額'] ?>'>

          <input type='hidden' name='lend_account[]' value='<?= $dupli_treat[$i]['貸方勘定科目'] ?>'>

          <input type='hidden' name='lend_tax[]' value='<?= $dupli_treat[$i]['貸方税区分'] ?>'>

          <input type='hidden' name='lend_column[]' value='<?= $dupli_treat[$i]['貸方金額'] ?>'>

          <input type='hidden' name='description[]' value='<?= $dupli_treat[$i]['摘要'] ?>'>


        <?php  } ?>
    </table>
    <?= $this->Form->submit('ファイルにする', ['class' => 'export']); ?>
    <?= $this->Form->end(); ?>
  <?php } ?>


</div>
</table> 
</div>


