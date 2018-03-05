<?php

use Phinx\Migration\AbstractMigration;

class PaymentStatus extends AbstractMigration
{
    public function up()
    {
        $t = $this->table('payment_status');
        $t->addColumn('name', 'string')
          ->addColumn('alias', 'string')
          ->addIndex(['alias'], ['unique' => true])
          ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
          ->addColumn('updated_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP'])
          ->addColumn('deleted_at', 'datetime', ['null' => true])
          ->create();
    }

    public function down()
    {
        $this->dropTable('payment_status');
    }
}
