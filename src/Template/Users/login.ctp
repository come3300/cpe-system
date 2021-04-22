<?php
echo $this->Html->css('Article');
?>

<div class='login'>
    <div class="Login_header">
        <p class="header-title">ログインページ</p>
    </div>
    <div class="loginmenu">
        <h1>なっちゃんシステム</h1>
        <h3>LOGIN MENU</h3>

        <?= $this->Flash->render() ?>
        <?= $this->Form->create() ?>

        <div class="loginplace">
            <?= $this->Form->control("email", ['class' => 'loginmail']); ?>
            <?= $this->Form->control("password", ['class' => 'loginpass']); ?>
        </div>

        <div class="loginbutton">
            <?= $this->html->link(
                "新規登録",
                "http://192.168.10.10/users/add",
                ['class' => 'newlogin']
            ); ?>
            <?= $this->Form->submit(__('Login'), ['class' => 'output']); ?>
            <?= $this->Form->end() ?>
        </div>
    </div>