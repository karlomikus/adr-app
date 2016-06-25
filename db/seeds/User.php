<?php

use Phinx\Seed\AbstractSeed;

class User extends AbstractSeed
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
        $faker = Faker\Factory::create();

        $data = [
            [
                'email' => 'admin@admin.com',
                'password' => '12345',
                'name' => 'Karlo',
                'last_name' => 'Mikuš',
                'created_at' => date('Y-m-d H:i:s')
            ]
        ];

        $this->insert('users', $data);
    }
}
