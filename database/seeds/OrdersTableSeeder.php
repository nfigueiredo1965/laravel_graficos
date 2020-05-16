<?php

use Carbon\Carbon;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder

{
  

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        for ($year=(date('Y') - 5); $year <= date('Y'); $year++) { 
            for ($month=1; $month <= 12; $month++) { 
                // $data = "{$year}-{$month}-01";
                $data = Carbon::createFromFormat('Y-m-d H', "{$year}-{$month}-01 22");

                $this->saveOrder($data);
                $this->saveOrder($data);
                $this->saveOrder($data);
                $this->saveOrder($data);
                $this->saveOrder($data);
                $this->saveOrder($data);
            }
        }
    }

    public function saveOrder($data)
    {
        Order::create([
            'user_id'           => 2,
            'total'             => rand(0, 10) * 12.2,
            'identify'          => uniqid(date('YmdHis')),
            'core'              => uniqid(date('YmdHis')),
            'status'            => 1,
            'payment_method'    => 2,
            'date'              => $data
        ]);
    }
}
