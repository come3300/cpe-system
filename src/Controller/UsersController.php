<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class UsersController extends AppController
{

  public function beforeFilter(Event $event)
  {
    parent::beforeFilter($event);
    $this->Auth->allow('add');
  }

  public function index()
  {
    $this->set('users', $this->Users->find('all'));
  }

  public function view($id)
  {
    $user = $this->Users->get($id);
    $this->set(compact('user'));
  }

  public function initialize()
  {
    $this->loadComponent('Flash');
    $this->loadComponent('Auth', [
      'loginRedirect' => [
        'controller' => 'tops',
        'action' => 'main'
      ],

      'logoutRedirect' => [
        'controller' => 'pages',
        'action' => 'display',
        'home'
      ]
    ]);
  }



  public function add()
  {
    $user = $this->Users->newEntity();
    if ($this->request->is('post')) {
      // 3.4.0 より前は $this->request->data() が使われました。
      $user = $this->Users->patchEntity($user, $this->request->getData());
      if ($this->Users->save($user)) {
        $this->Flash->success(__('The user has been saved.'));
        return $this->redirect(['action' => 'add']);
      }
      $this->Flash->error(__('エラー表示'));
    }
    $this->set('user', $user);
  }
  public function login()
  {
    if ($this->request->is('post')) {
      $user = $this->Auth->identify();
      if ($user) {
        $this->Auth->setUser($user);
        return $this->redirect($this->Auth->redirectUrl());
      }
      $this->Flash->error(__('idまたはパスワードが違います'));
    }
  }

  public function logout()
  {
    return $this->redirect($this->Auth->logout());
  }
}
