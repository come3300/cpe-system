<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
  public function validationDefault(Validator $validator)
  {
    return $validator
      ->notEmpty('name', 'A username is required')
      ->notEmpty('password', 'A password is required')
      ->notEmpty('role', 'A role is required');
  }

  public function initialize(array $config)
  {
    $this->addBehavior('Timestamp');
    // Just add the belongsTo relation with CategoriesTable
   
  }
}
