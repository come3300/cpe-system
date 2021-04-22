<?php

namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

class User extends Entity
{

  // 主キーフィールド "id" を除く、すべてのフィールドを一括代入可能にします。
  protected $_accessible = [
    '*' => true,
    'id' => false
  ];

  protected $_hidden = [
    'password'
  ];

  // ...

  protected function __setPassword($value)
  {
    if (strlen($value)) {
      $hasher = new DefaultPasswordHasher();

      return $hasher->hash($value);
    }
  }

  protected function _setPassword($password)
  {
    if (strlen($password) > 0) {
      return (new DefaultPasswordHasher)->hash($password);
    }
  }

  // ...
}