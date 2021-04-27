<?php

namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

class User extends Entity
{

  // 主キーフィールド "id" を除く、すべてのフィールドを一括代入可能にします。
  protected $_accessible = [
    'username' => true,
    'email' => true,
    'password' => true,
    'role' =>true,
    'created' =>true,
    'modified' =>true
  ];

  protected $_hidden = [
    'password'
  ];

  // ...

  protected function _setPassword($password)
  {
    if (strlen($password) > 0) {
      return (new DefaultPasswordHasher)->hash($password);
    }
  }

  // ...
}
