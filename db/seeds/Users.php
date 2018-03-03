<?php

use Phinx\Seed\AbstractSeed;

class Users extends AbstractSeed
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
                'name'     => 'tester1',
                'email'    => 'tester1@teste.com',
                'document' => '000.000.000-00',
                'password' => md5('123456')
            ],
            [
                'name'     => 'tester2',
                'email'    => 'tester2@teste.com',
                'document' => '222.222.222-22',
                'password' => md5('123456')
            ],
            [
                'name'     => 'tester3',
                'email'    => 'tester3@teste.com',
                'document' => '333.333.333-33',
                'password' => md5('123456')
            ]
        ];

        $this->execute('DELETE FROM users');
        $this->table('users')->insert($params)->save();
    }
}
