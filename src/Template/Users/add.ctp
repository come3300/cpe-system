<?php

use Cake\Form\Form;

echo $this->Html->css('Add');

?>

<div class='login'>
    <div class="Login_header">
        <h3>CPE System</h3>
        <p class="header-title">新規登録ページ</p>
    </div>
    <div class="loginmenu">
        <h1>新規登録</h1>

        <?= $this->Flash->render() ?>
        <?= $this->Form->create($user) ?>
        <div class="loginplace">
            <?= $this->Form->control("email", ['class' => 'loginmail', "placeholder" => "Eメール", "label" => false]); ?>
            <?= $this->Form->control("username", ['class' => 'loginuser', "placeholder" => "ユーザーネーム", "label" => false]); ?>
            <?= $this->Form->control("password", ['class' => 'loginpass', "placeholder" => "パスワード", "label" => false]); ?>
            <?= $this->Form->control("role", ["placeholder" => "役割", "class" => "loginrole", "label" => false]); ?>
        </div>

        <div class="loginbutton">
            <?= $this->html->link(
                'ログイン画面へ',
                "http://192.168.10.10/users/login",
                ['class' => 'output']
            ); ?>
            <?= $this->Form->button(__('Submit'), ['class' => 'output']); ?>


            <?= $this->Form->end() ?>
        </div>
    </div>