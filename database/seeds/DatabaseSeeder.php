<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PlansTableSeeder::class);
        $this->call(PlanFeaturesTableSeeder::class);
        $this->call(VouchersTableSeeder::class);
        $this->call(PlanHasVouchersTableSeeder::class);
        $this->call(SchedulesTableSeeder::class);
        $this->call(ScheduleDetailsTableSeeder::class);
        $this->call(PlanHasSchedulesTableSeeder::class);
        $this->call(PaymentsTableSeeder::class);
        $this->call(TransactionStatusesTableSeeder::class);
        $this->call(OrderStatusesTableSeeder::class);
    }
}
