<?php

use Illuminate\Database\Seeder;

class BillingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = App\Visit::count();
        if ($count > 0) {
            for ($i = 0; $i < 25; $i++) {
                $visit = rand(1, $count);
                // if (App\BillingName::count() > 0) {
                //     $billing_name = App\BillingName::findOrFail(rand(1, App\BillingName::count()))->billing_name;
                // }
                DB::table('billings')->insert([
                    'user_id' => 1,
                    'visit_id' => $visit,
                    'billing_name' => 'Billing Name ' . $i,
                    'amount' => rand(500, 500000),
                    // 'discount' => null,
                    // 'total' => null,
                    'is_paid' => rand(0, 1),
                    'created_at' => now(),
                ]);
            }
        }
    }
}
