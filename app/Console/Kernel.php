<?php

namespace App\Console;

use App\Models\RRP;
use App\Models\RRPBilling;
use App\Models\RRPType;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        $schedule->call(function() {

            $Tenants = Tenant::where([
                'Payment_Day' => Carbon::now()->format("d")
            ])
            ->get();

            foreach ($Tenants as $tenant) {
                $RRP_Type = RRPType::where([
                    'RRP_Type_ID' => $tenant->RRP_Type_ID
                ])
                ->first();

                $RRP = RRP::where([
                    'RRP_ID' => $RRP_Type->RRP_ID
                ])
                ->first();

                $User = User::where([
                    'User_List_ID' => $tenant->User_ID
                ])
                ->first();

                $Payment_Breakdown = [
                    "Miscellaneous" => json_decode($RRP_Type->Miscellaneous),
                    "Basic_Rent" => $RRP_Type->Basic_Rent
                ];


                RRPBilling::create([
                    'ID' => "Invoice#".Carbon::now()->timestamp,
                    'Tenant_ID' => $tenant->User_ID,
                    'RRP_ID' => $tenant->RRP_ID,
                    'Status' => 'Unpaid',
                    'Amount_Paid' => 0,
                    'Payment_Breakdown' => json_encode($Payment_Breakdown),
                    'Email' => $User->Email,
                    'Fullname' => $User->Firstname && $User->Lastname ? $User->Firstname." ".$User->Lastname : null,
                    'RRP_Name' => $RRP->RRP_Name
                ]);
            }
            

        })
        ->daily();
        // ->everyMinute();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
