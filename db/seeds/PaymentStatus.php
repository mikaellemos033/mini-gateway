<?php

use Phinx\Seed\AbstractSeed;

class PaymentStatus extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $params = [
            [
                'name'  => 'Pendente',
                'alias' => 'pending'
            ],
            [
                'name'  => 'Pago',
                'alias' => 'paid'
            ],
            [
                'name'  => 'Cancelado',
                'alias' => 'canceled'
            ]
        ];

        $this->execute('DELETE FROM payment_status');
        $this->table('payment_status')->insert($params)->save();
    }
}
