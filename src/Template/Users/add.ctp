<?php
echo $this->Html->css('Article');
?>

<div class='login'>
    <div class="Login_header">
        <p class="header-title">新規登録</p>
    </div>
    <div class="loginmenu">
        <h1>なっちゃんシステム</h1>
        <h3>新規登録</h3>

        <?= $this->Flash->render() ?>
        <?= $this->Form->create() ?>

        <div class="loginplace">
            <?= $this->Form->control("email", ['class' => 'loginmail',]); ?>
            <?= $this->Form->control("username", ['class' => 'loginmail']); ?>
            <?= $this->Form->control("password", ['class' => 'loginpass', 'autocomplete' => 'off']); ?>
        </div>

        <div class="loginbutton">
            <?= $this->html->link('ログイン画面へ', "http://192.168.10.10/users/login",
            ['class' => 'output']); ?>
            <?= $this->Form->button(__('Submit'), ['class' => 'output']); ?>

            <?= $this->Form->end() ?>
        </div>
    </div>