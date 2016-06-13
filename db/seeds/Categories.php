<?php

use Phinx\Seed\AbstractSeed;

class Categories extends AbstractSeed
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

        $data = [];
        for ($i = 0; $i < 20; $i++) {
            $data[] = [
                'name' => ucfirst($faker->text(50))
            ];
        }

        $this->insert('categories', $data);
    }
}
