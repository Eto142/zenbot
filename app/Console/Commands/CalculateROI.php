<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Investment;
use App\Models\Earning;
use App\Mail\earningEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class CalculateROI extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calculate:roi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculate and payout ROI for all users';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       
            // Retrieve the users who need their investment topped up
            $activeInvestments = DB::table('investments')
            ->where('status', '=', 'Active')
            ->get();

        foreach ($activeInvestments as $investment) {

            
        

           $dailyReturn = $investment->amount * $investment->plan_percentage;



                   // insert profit into earnings table
        DB::table('earnings')->insert([
            'user_id' => $investment->user_id,
            'capital' => $investment->amount,
            'return' => $dailyReturn,
            'description' => $investment->plan_name,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        $email = $investment->email;  
        $data= "Your ".$investment->plan_name." contract has generated ROI of $".$dailyReturn." which has been successfully credited into your account.";
            
            

            // Send an email confirmation
        Mail::to($email)->send(new earningEmail($data));

        
    }

        // Retrieve the users who have reached the end of their top-up period
        $inactiveInvestments = DB::table('investments')
            ->where('plan_end', '=', date('Y-m-d'))
            ->get();

        foreach ($inactiveInvestments as $user) {
            // Stop topping up the user's investment
            DB::table('investments')
                ->where('id', $user->id)
                ->update([
                    'status' => 'Expired',
                ]);

               
                $email = $user->email;  
                $data= "Capital release for ".$user->plan_name."that expired on".$user->plan_end."Thanks.";
            
            // Send an email confirmation
            //Mail::to($email)->send(new releaseEmail($data));
        }
    }


}






            

