<?php

use Phinx\Migration\AbstractMigration;

class PaymentTickets extends AbstractMigration
{
    public function up()
    {
        $t = $this->table('payment_tickets');
        $t->addColumn('payment_id', 'integer', ['signed' => true])
          ->addColumn('due_date', 'date')
          ->addColumn('number', 'string')
          ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
          ->addColumn('updated_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP'])
          ->addColumn('deleted_at', 'datetime', ['null' => true])
          ->addIndex(['payment_id'], ['unique' => true])
          ->addForeignKey('payment_id', 'payments', 'id', array('delete'=> 'CASCADE', 'update'=> 'NO_ACTION'))
          ->create();
    }

    public function down()
    {
        $this->dropTable('payment_tickets');
    }
}
