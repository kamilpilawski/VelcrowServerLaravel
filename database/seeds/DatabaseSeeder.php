<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Kamil',
            'email' => 'Kamil@gmail.com',
            'password' => bcrypt('Kamil'),
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('market')->insert([
            'name' => 'Drewno',
            'price' => 10,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('market')->insert([
            'name' => 'Kruszce',
            'price' => 15,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('market')->insert([
            'name' => 'Robotnicy',
            'price' => 10,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('market')->insert([
            'name' => 'Armia',
            'price' => 15,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('market')->insert([
            'name' => 'Złoto',
            'price' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
    }
}
