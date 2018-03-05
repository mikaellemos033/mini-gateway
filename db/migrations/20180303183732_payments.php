<?php

use Phinx\Migration\AbstractMigration;

class Payments extends AbstractMigration
{
    public function up()
    {
        $t = $this->table('payments');
        $t->addColumn('payment_type_id', 'integer', ['signed' => true])
          ->addColumn('payment_status_id', 'integer', ['signed' => true])
          ->addColumn('corporation_id', 'integer', ['signed' => true])
          ->addColumn('user_id', 'integer', ['signed' => true])
          ->addColumn('amount', 'float')   
          ->addColumn('description', 'text', ['signed' => true])       
          ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
          ->addColumn('updated_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP'])
          ->addColumn('deleted_at', 'datetime', ['null' => true])
          ->addForeignKey('payment_status_id', 'payment_status', 'id', array('delete'=> 'CASCADE', 'update'=> 'NO_ACTION'))
          ->addForeignKey('payment_type_id', 'payment_types', 'id', array('delete'=> 'CASCADE', 'update'=> 'NO_ACTION'))
          ->addForeignKey('corporation_id', 'corporations', 'id', array('delete'=> 'CASCADE', 'update'=> 'NO_ACTION'))
          ->addForeignKey('user_id', 'users', 'id', array('delete'=> 'CASCADE', 'update'=> 'NO_ACTION'))
          ->create();
    }

    public function down()
    {
        $this->dropTable('payments');
    }
}
