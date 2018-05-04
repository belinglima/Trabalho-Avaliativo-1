<?php

use Illuminate\Database\Seeder;

class ParticipantesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('participantes')->insert([
            'raca' => 'Iogurte',
            'proprietario' => 'Batavo',
            'peso' => 12,
            'valor' => 3.90
        ]);

        DB::table('participantes')->insert([
            'raca' => 'Suco de Uva',
            'proprietario' => 'Elege',
            'peso' => 30,
            'valor' => 2.50
        ]);
        
        DB::table('participantes')->insert([
            'raca' => 'Margarina',
            'proprietario' => 'Becel',
            'peso' => 8,
            'valor' => 5.30
        ]);
    }
}
