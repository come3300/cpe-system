<?php

use PhpParser\Node\Stmt\Label;
use Cake\Routing\Router;

echo $this->Html->css('Login');
?>

<div class='login'>
    <div class="Login_header">
        <h3>CPE System</h3>
    </div>

    <div class="loginmenu">
        <h1>LOGIN MENU</h1>


        <?= $this->Flash->render() ?>
        <?= $this->Form->create(null, ['type' => "post"]) ?>

        <div class="loginplace">
            <?= $this->Form->control("email", ['class' => 'loginmail', "placeholder" => "Eメール", "label" => false]); ?>
            <?= $this->Form->control("password", ['class' => 'loginpass', "placeholder" => "パスワード", "label" => false]); ?>
            <div class="loginbutton">
                <a href="<?php echo $this->Url->build
                ([
                'controller' => 'Users',
                'action' => 'add',
                 ]); ?>" 
                 class=“output”>新規登録</a>

                <?= $this->Form->submit(__('Login'), ['class' => 'output']); ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>