<?php
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
      <?= $this->Form->file('csv', ['accept' => '.csv',"class" => "importbutton"]); ?>
      <?= $this->Form->file('インポートをする', ['accept' => '.csv', "class" => "importbutton"]); ?>
      <?= $this->Form->button('更新する', ['class' => 'output',]); ?>
    </div>

    　<div class="exports">
      　　 <?= $this->Form->button('ファイルにする', ['class' => 'export']); ?>
      </div>
  </div>

   <div　class="bookkeep-table">

    
   </div>
</div>