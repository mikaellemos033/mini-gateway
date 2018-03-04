<?php

use Phinx\Migration\AbstractMigration;

class PaymentCard extends AbstractMigration
{
    public function up()
    {
        $t = $this->table('payment_cards');
        $t->addColumn('payment_id', 'integer', ['signed' => true])
          ->addColumn('card_number', 'string')
          ->addColumn('code', 'integer', ['length' => 3])
          ->addColumn('due_date', 'string', ['length' => 7])
          ->addColumn('owner_name', 'string')
          ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
          ->addColumn('updated_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP'])
          ->addColumn('deleted_at', 'datetime', ['null' => true])
          ->addForeignKey('payment_id', 'payments', 'id', array('delete'=> 'CASCADE', 'update'=> 'NO_ACTION'))
          ->create();

    }

    public function down()
    {
        $this->dropTable('payment_cards');
    }
}
