<?php

use Cake\Auth\DefaultPasswordHasher;
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $password = (new DefaultPasswordHasher())->hash('suke3300');
        $now = date('Y-m-d');
        $data = [
            [
                'username' => 'ユーザー１',
                'email' => 'test@example.com',
                'password' => $password,
                'role' => 1,
                'created' => $now,
                'modified' => $now
            ]
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}