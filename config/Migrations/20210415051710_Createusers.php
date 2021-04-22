<?php

use Migrations\AbstractMigration;

class Createusers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('users')
            ->addColumn('username', 'string', [
                'null' => false,
            ])
            ->addColumn('email', 'string', [
                'null' => false,
            ])
            ->addColumn('password', 'string', [
                'null' => false,
            ])
            ->addColumn('role', 'integer', [
                'null' => false,
            ])

            ->addColumn('created', 'datetime', [
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'null' => false,
            ]);
        $table->create();
    }
}
