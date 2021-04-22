<?php

namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

class HogeCsvForm extends Form
{
  protected function _buildSchema(Schema $schema)
  {
    return $schema->addField('csv', ['type' => 'file']);
  }

  protected function _buildValidator(Validator $validator)
  {
    $validator->provider('upload', \Josegonzalez\Upload\Validation\DefaultValidation::class);
    $validator->add('csv', 'fileFileUpload', [
      'rule' => ['isFileUpload'],
      'message' => 'アップロードに失敗しました。',
      'provider' => 'upload'
    ])->add('csv', 'fileBelowMaxSize', [
      'rule' => ['isBelowMaxSize', 10240000],
      'message' => 'ファイルサイズが大きすぎます。',
      'provider' => 'upload'
    ])->add('csv', 'fileType', [
      'rule' => ['mimeType', ['text/plain']],
      'message' => 'ファイル形式が違います。'
    ]);
  }

  protected function _execute(array $data)
  {
    return true;
  }
}
