<!DOCTYPE html>
<html>
<?php
echo $this->Html->css('Article');
?>
<div>
  <div class="Login_header">
    <p class="header-title">ログインページ</p>
  </div>

  <div class="loginmenu">
    <h1>なっちゃんシステム</h1>
    <h3>LOGIN MENU</h3>

    <div class="loginplace">
      <input class="loginmail" placeholder="メールアドレス" type="email" />
      <input class="loginpass" placeholder="パスワード" type="password" />
    </div>

    <div class="loginbutton">
      <button @click="auth">ログイン</button>
      <button @click="auth">新規登録</button>
    </div>


  </div>

</div>

</html>