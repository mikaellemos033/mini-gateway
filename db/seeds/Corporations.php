<?php

use Phinx\Seed\AbstractSeed;

class Corporations extends AbstractSeed
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
                'name' => 'Moip',
                'alias' => 'moip'
            ],
            [
                'name' => 'Pagseguro',
                'alias' => 'pagseguro'
            ],
            [
                'name' => 'Paypal',
                'alias' => 'paypal'
            ],
            [
                'name' => 'Stone',
                'alias' => 'stone'
            ],
            [
                'name' => 'Cielo',
                'alias' => 'cielo'
            ],
            [
                'name' => 'Pagarme',
                'alias' => 'pagarme'
            ],
        ];

        $this->execute('DELETE FROM corporations');
        $this->table('corporations')->insert($params)->save();
    }
}
