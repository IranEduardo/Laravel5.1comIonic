<?php

use Illuminate\Database\Seeder;
use CodeDelivery\Models\Cupom;

class CupomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Cupom::class, 20)->create();
    }
}
