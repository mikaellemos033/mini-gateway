<?php

use Phinx\Migration\AbstractMigration;

class Corporations extends AbstractMigration
{
    public function up()
    {
        $t = $this->table('corporations');
        $t->addColumn('name', 'string')
          ->addColumn('alias', 'string')
          ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
          ->addColumn('updated_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP'])
          ->addColumn('deleted_at', 'datetime', ['null' => true])
          ->create();
    }

    public function down()
    {
        $this->dropTable('corporations');
    }
}
