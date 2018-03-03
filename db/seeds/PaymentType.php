<?php

use Phinx\Seed\AbstractSeed;

class PaymentType extends AbstractSeed
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
                'name'  => 'Cartão de Crédito',
                'alias' => 'credit_card'
            ],
            [
                'name'  => 'Boleto',
                'alias' => 'ticket'
            ]
        ];

        $this->execute('DELETE FROM payment_types');
        $this->table('payment_types')->insert($params)->save();
    }
}
