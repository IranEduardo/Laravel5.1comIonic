<?php

use Illuminate\Database\Seeder;

use CodeDelivery\Models\Order;
use CodeDelivery\Models\OrderItem;


class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Order::class,30)->create()->each(function ($order) {
            $randomNumber =  rand(1,10);
            for ($i = 0; $i < $randomNumber; $i++) {
                $order->items()->save(factory(OrderItem::class)->make());
            };
        });
    }
}
