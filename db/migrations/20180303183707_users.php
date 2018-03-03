<?php

use Phinx\Migration\AbstractMigration;

class Users extends AbstractMigration
{
    public function up()
    {
        $t = $this->table('users');
        $t->addColumn('name', 'string')
          ->addColumn('document', 'string', ['length' => 15])
          ->addColumn('email', 'string')
          ->addColumn('password', 'string')          
          ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
          ->addColumn('updated_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP'])
          ->addColumn('deleted_at', 'datetime', ['null' => true])
          ->addIndex(['document', 'email'], ['unique' => true])
          ->create();
    }

    public function down()
    {
        $this->dropTable('users');
    }
}
