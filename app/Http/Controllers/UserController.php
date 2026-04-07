<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Kyc;
use App\Models\Plan;
use App\Models\User;
use App\Models\Profit;
use GuzzleHttp\Client;
use App\Models\Deposit;
use App\Models\Earning;
use App\Models\Traders;
use App\Models\Refferal;
use App\Mail\supportEmail;
use App\Models\Investment;
use App\Models\Withdrawal;
use App\Models\Debitprofit;
use App\Models\verifyToken;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Mail\VerificationEmail;
use App\Mail\Plan1;
use App\Mail\welcomeEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{




    public function redirect()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == '0') {
               
                   

                    $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
                    $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
                    $data['credit_investment'] = Investment::where('user_id', Auth::user()->id)->where('status', 'Expired')->sum('amount');
                    // $data['debit_investment'] = Investment::where('user_id', Auth::user()->id)->where('status', 'Active')->sum('amount');
                    $data['user_balance'] =  $data['credit'] + $data['credit_investment'] - $data['debit'];
                  
                    $data['deposit'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
                    $data['withdrawal'] = Withdrawal::where('user_id', Auth::user()->id)->sum('amount');
                   $data['earning'] = Earning::where('user_id', Auth::user()->id)->sum('capital');
                   $data['addprofit'] = Profit::where('user_id', Auth::user()->id)->sum('amount');
                   $data['debitprofit'] = Debitprofit::where('user_id', Auth::user()->id)->sum('amount');
                   $data['profit'] = $data['addprofit'] + $data['earning'] - $data['debitprofit'];
                    // $data['plan'] = Plan::where('user_id',Auth::user()->id)->sum('amount');
                    $data['referral'] = Refferal::where('user_id', Auth::user()->id)->sum('amount');
                     $data['investment'] = Investment::where('user_id', Auth::user()->id)->sum('amount');
                    
                    $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['investment'];
                    return view('dashboard.home', $data);
                }


             else {
                $result    = DB::table('users')->where('usertype', '0')->get();
                return view('manager.home', compact('result'));
            }
        } else {
            return redirect()->back();
        }
    }





    public function dashboard()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == '0') {


                    // $client = new Client();
                    // $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
                    // $data = json_decode($response->getBody(), true);
                    // $price = $data['bpi']['USD']['rate_float'];

                    $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
                    $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
                     $data['credit_investment'] = Investment::where('user_id', Auth::user()->id)->where('status', 'Expired')->sum('amount');
                    // $data['debit_investment'] = Investment::where('user_id', Auth::user()->id)->where('status', 'Active')->sum('amount');
                    $data['user_balance'] =  $data['credit'] + $data['credit_investment'] - $data['debit'] ;
                    // $data['btc_balance'] = $data['user_balance'] / $price;


                    $data['deposit'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
                    $data['withdrawal'] = Withdrawal::where('user_id', Auth::user()->id)->sum('amount');
                    $data['earning'] = Earning::where('user_id', Auth::user()->id)->sum('capital');
                   $data['addprofit'] = Profit::where('user_id', Auth::user()->id)->sum('amount');
                   $data['debitprofit'] = Debitprofit::where('user_id', Auth::user()->id)->sum('amount');
                   $data['profit'] = $data['addprofit'] + $data['earning'] - $data['debitprofit'];
                    // $data['plan'] = Plan::where('user_id',Auth::user()->id)->sum('amount');
                    $data['referral'] = Refferal::where('user_id', Auth::user()->id)->sum('amount');
                    $data['investment'] = Investment::where('user_id', Auth::user()->id)->sum('amount');
                    $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['investment'];
                    return view('dashboard.home', $data);
                
            } else {
                $result    = DB::table('users')->where('usertype', '0')->get();
                return view('manager.home', compact('result'));
            }
        } else {
            return redirect()->back();
        }
    }
    public function userDeposit()
    {
        // $client = new Client();
        // $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        // $data = json_decode($response->getBody(), true);
        // $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
         $data['credit_investment'] = Investment::where('user_id', Auth::user()->id)->where('status', 'Expired')->sum('amount');
        // $data['debit_investment'] = Investment::where('user_id', Auth::user()->id)->where('status', 'Active')->sum('amount');
        $data['user_balance'] =  $data['credit'] + $data['credit_investment'] - $data['debit'] ;
        
        // $data['btc_balance'] = $data['user_balance'] / $price;
        $data['payment'] = DB::table('users')->where('id', '4')->get();
        return view('auth.passwords.reload', $data);
    }


    public function Forex()
    {

        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['credit_investment'] = Investment::where('user_id', Auth::user()->id)->where('status', 'Expired')->sum('amount');
        // $data['debit_investment'] = Investment::where('user_id', Auth::user()->id)->where('status', 'Active')->sum('amount');
        $data['user_balance'] =  $data['credit'] + $data['credit_investment'] - $data['debit'];
      
        $data['btc_balance'] = $data['user_balance'] / $price;
        return view('dashboard.forex', $data);
    }

    public function Binary()
    {

        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        $data['btc_balance'] = $data['user_balance'] / $price;
        return view('dashboard.binary', $data);
    }

    public function Stocks()
    {

        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        $data['btc_balance'] = $data['user_balance'] / $price;

        return view('dashboard.stocks', $data);
    }

    public function Crypto()
    {

        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        $data['btc_balance'] = $data['user_balance'] / $price;
        return view('dashboard.crypto', $data);
    }
    public function Wallet()
    {

        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];


        $response2 = $client->get('https://api.coingecko.com/api/v3/simple/price', [
            'query' => [
                'ids' => 'ethereum',
                'vs_currencies' => 'usd',
            ],
        ]);
        // Decode the JSON response
        $data2 = json_decode($response2->getBody(), true);
        $price2 = $data2['ethereum']['usd'];








        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        $data['btc_balance'] = $data['user_balance'] / $price;
        $data['eth_balance'] = $data['user_balance'] / $price2;

        return view('dashboard.wallet', $data);
    }

    public function Copy()
    {
        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        $data['btc_balance'] = $data['user_balance'] / $price;
        $data['traders']  = Traders::get();
        return view('dashboard.copy', $data);
    }

    public function Crypto_buy()
    {

        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        $data['btc_balance'] = $data['user_balance'] / $price;
        return view('dashboard.crypto_buy', $data);
    }

    public function Bot()
    {

        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        $data['btc_balance'] = $data['user_balance'] / $price;
        return view('dashboard.bot', $data);
    }

    public function Profile()
    {

        // $client = new Client();
        // $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        // $data = json_decode($response->getBody(), true);
        // $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        // $data['btc_balance'] = $data['user_balance'] / $price;
        return view('dashboard.profile', $data);
    }

    public function Photo()
    {

        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        $data['btc_balance'] = $data['user_balance'] / $price;
        return view('dashboard.photo', $data);
    }

    public function supportTicket()
    {

        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        $data['btc_balance'] = $data['user_balance'] / $price;
        return view('dashboard.support', $data);
    }

    public function Bonus()
    {

        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['user_balance'] =  $data['credit'] - $data['debit'];
        $data['btc_balance'] = $data['user_balance'] / $price;
        return view('dashboard.bonus', $data);
    }






    public function accounthistory()
    {

        // $client = new Client();
        // $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        // $data = json_decode($response->getBody(), true);
        // $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
       $data['credit_investment'] = Investment::where('user_id', Auth::user()->id)->where('status', 'Expired')->sum('amount');
        // $data['debit_investment'] = Investment::where('user_id', Auth::user()->id)->where('status', 'Active')->sum('amount');
        $data['user_balance'] =  $data['credit'] + $data['credit_investment'] - $data['debit'];
        // $data['btc_balance'] = $data['user_balance'] / $price;
        $data['deposit'] =  Deposit::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        $data['withdrawal'] =  Withdrawal::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        $data['earning'] =  Earning::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();

        return view('dashboard.accounthistory', $data);
    }


    public function tradingHistory()
    {

        // $data['profit'] =  Earning::where('user_id',Auth::user()->id)->where('type', 'ROI')->orderBy('id','desc')->get();

        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['credit_investment'] = Investment::where('user_id', Auth::user()->id)->where('status', 'Expired')->sum('amount');
        // $data['debit_investment'] = Investment::where('user_id', Auth::user()->id)->where('status', 'Active')->sum('amount');
        $data['user_balance'] =  $data['credit'] + $data['credit_investment'] - $data['debit'];
        $data['btc_balance'] = $data['user_balance'] / $price;
        return view('dashboard.tradinghistory', $data);
    }
    public function Earning()
    {

        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
       $data['credit_investment'] = Investment::where('user_id', Auth::user()->id)->where('status', 'Expired')->sum('amount');
        // $data['debit_investment'] = Investment::where('user_id', Auth::user()->id)->where('status', 'Active')->sum('amount');
        $data['user_balance'] =  $data['credit'] + $data['credit_investment'] - $data['debit'];
        $data['btc_balance'] = $data['user_balance'] / $price;

        return view('dashboard.earnings', $data);
    }
    public function buyplan()
    {

        return view('dashboard.buy-plan');
    }

    public function  investmentHistory() {

     $data['investment'] = Investment::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
    return view('dashboard.investmentHistory', $data);
    }


    public function referUser()
    {

        // $client = new Client();
        // $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        // $data = json_decode($response->getBody(), true);
        // $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
       $data['credit_investment'] = Investment::where('user_id', Auth::user()->id)->where('status', 'Expired')->sum('amount');
        // $data['debit_investment'] = Investment::where('user_id', Auth::user()->id)->where('status', 'Active')->sum('amount');
        $data['user_balance'] =  $data['credit'] + $data['credit_investment'] - $data['debit'];
        $data['referral'] = Refferal::where('user_id', Auth::user()->id)->sum('amount');
        // $data['btc_balance'] = $data['user_balance'] / $price;
        return view('dashboard.referuser', $data);
    }

    public function Settings()
    {

        // $client = new Client();
        // $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        // $data = json_decode($response->getBody(), true);
        // $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['credit_investment'] = Investment::where('user_id', Auth::user()->id)->where('status', 'Expired')->sum('amount');
        // $data['debit_investment'] = Investment::where('user_id', Auth::user()->id)->where('status', 'Active')->sum('amount');
        $data['user_balance'] =  $data['credit'] + $data['credit_investment'] - $data['debit'] ;
        // $data['btc_balance'] = $data['user_balance'] / $price;
        return view('dashboard.settings', $data);
    }


    public function accountSettings()
    {

        // $client = new Client();
        // $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        // $data = json_decode($response->getBody(), true);
        // $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
       $data['credit_investment'] = Investment::where('user_id', Auth::user()->id)->where('status', 'Expired')->sum('amount');
        // $data['debit_investment'] = Investment::where('user_id', Auth::user()->id)->where('status', 'Active')->sum('amount');
        $data['user_balance'] =  $data['credit'] + $data['credit_investment'] - $data['debit'];
        // $data['btc_balance'] = $data['user_balance'] / $price;
        return view('dashboard.account-settings', $data);
    }
    public function verifyAccount()
    {

        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
       $data['credit_investment'] = Investment::where('user_id', Auth::user()->id)->where('status', 'Expired')->sum('amount');
        // $data['debit_investment'] = Investment::where('user_id', Auth::user()->id)->where('status', 'Active')->sum('amount');
        $data['user_balance'] =  $data['credit'] + $data['credit_investment'] - $data['debit'];
        $data['btc_balance'] = $data['user_balance'] / $price;
        $data['kycStatus'] = Kyc::where('user_id', Auth::user()->id)->get();
        $data['kyc'] = Kyc::where('user_id', Auth::user()->id)->get();
        return view('dashboard.verify-account', $data)->with('status', 'Documents updated successfully, please wait for approval');
    }


    public function withdrawals()
    {

        // $client = new Client();
        // $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        // $data = json_decode($response->getBody(), true);
        // $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
       $data['credit_investment'] = Investment::where('user_id', Auth::user()->id)->where('status', 'Expired')->sum('amount');
        // $data['debit_investment'] = Investment::where('user_id', Auth::user()->id)->where('status', 'Active')->sum('amount');
        $data['user_balance'] =  $data['credit'] + $data['credit_investment'] - $data['debit'] ;
        // $data['btc_balance'] = $data['user_balance'] / $price;
        return view('dashboard.withdrawals', $data);
    }
    public function withdrawFunds()
    {
        $client = new Client();
        $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        $data = json_decode($response->getBody(), true);
        $price = $data['bpi']['USD']['rate_float'];

        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['credit_investment'] = Investment::where('user_id', Auth::user()->id)->where('status', 'Expired')->sum('amount');
        // $data['debit_investment'] = Investment::where('user_id', Auth::user()->id)->where('status', 'Active')->sum('amount');
        $data['user_balance'] =  $data['credit'] + $data['credit_investment'] - $data['debit'] ;
        $data['btc_balance'] = $data['user_balance'] / $price;

        return view('dashboard.withdraw-funds', $data);
    }
    public function registerPage()
    {

        return view('user.register');
    }
    public function loginPage()
    {

        return view('user.login');
    }

    public function getDeposit(Request $request)
    {

        // $client = new Client();
        // $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
        // $data = json_decode($response->getBody(), true);
        // $price = $data['bpi']['USD']['rate_float'];


        // $response2 = $client->get('https://api.coingecko.com/api/v3/simple/price', [
        //     'query' => [
        //         'ids' => 'ethereum',
        //         'vs_currencies' => 'usd',
        //     ],
        // ]);
        // // Decode the JSON response
        // $data2 = json_decode($response2->getBody(), true);
        // $price2 = $data2['ethereum']['usd'];


        $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
        $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
        $data['credit_investment'] = Investment::where('user_id', Auth::user()->id)->where('status', 'Expired')->sum('amount');
        // $data['debit_investment'] = Investment::where('user_id', Auth::user()->id)->where('status', 'Active')->sum('amount');
        $data['user_balance'] =  $data['credit'] + $data['credit_investment'] - $data['debit'];
        // $data['btc_balance'] = $data['user_balance'] / $price;
        $amount = $request->input('amount');
        $data['amount'] = $amount;
        // $data['btc_amount'] = $data['amount']  / $price;
        // $data['eth_amount'] = $data['amount']  / $price2;
        $item = $request->input('item');
        $data['item'] = $item;
        $data['payment'] = DB::table('users')->where('id', '4')->get();

        if ($item == 'Bank') {
            return view('dashboard.bank', $data);
        } else {
            return view('dashboard.payment', $data);
        }
    }



public function makeDeposit(Request $request)
{
    $request->validate([
        'amount' => 'required|numeric|min:1',
        'paymethd_method' => 'required|string',
        'image' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048', // 2MB max
    ]);

    $transaction_id = rand(76503737, 12344994);

    $deposit = new Deposit;
    $deposit->transaction_id = $transaction_id;
    $deposit->user_id = Auth::id();
    $deposit->amount = $request->amount;
    $deposit->payment_method = $request->paymethd_method;

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $filename = Str::random(40) . '.' . $ext;

        $destination = base_path('private/deposits');
        if (!File::exists($destination)) {
            File::makeDirectory($destination, 0755, true);
        }

        $file->move($destination, $filename);
        $deposit->image = $filename;
    }

    $deposit->save();

    $transaction = new Transaction;
    $transaction->user_id = Auth::id();
    $transaction->transaction_id = $transaction_id;
    $transaction->transaction_type = "Credit";
    $transaction->transaction = "credit";
    $transaction->credit = $request->amount;
    $transaction->debit = 0;
    $transaction->status = 0;
    $transaction->save();

    return redirect('deposit')->with('status', 'Deposits will be pending until there are sufficient confirmations on the blockchain!');
}


    public function activateBot(Request $request)
    {

        // $validate->validate($request,[
        //     'subject' => 'required',
        //     'message' => 'required'
        // ]);
        $transaction_id = rand(76503737, 12344994);
        $deposit = new Deposit;
        $deposit->transaction_id = $transaction_id;
        $deposit->user_id = Auth::user()->id;
        $deposit->amount = $request['amount'];
        $deposit->payment_method = $request['paymethd_method'];
        $deposit->save();


        $transaction = new Transaction;
        $transaction->user_id = Auth::user()->id;
        $transaction->transaction_id = $transaction_id;
        $transaction->transaction_type = "Debit";
        $transaction->transaction = "debit";
        $transaction->credit = "0";
        $transaction->debit = $request['amount'];
        $transaction->status = 1;
        $transaction->save();


        return redirect('deposit')->with('status', 'Deposits will be pending until there are sufficent confirmations on the blockchain!');
    }





    public function getWithdrawal(Request $request)
    {

        $data['deposit'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['withdrawal'] = Withdrawal::where('user_id', Auth::user()->id)->sum('amount');
        $data['addprofit'] = Profit::where('user_id', Auth::user()->id)->sum('amount');
        $data['debitprofit'] = Debitprofit::where('user_id', Auth::user()->id)->sum('amount');
        $data['profit'] = $data['addprofit'] - $data['debitprofit'];
        $data['earning'] = Earning::where('user_id', Auth::user()->id)->sum('capital');
        $data['plan'] = Plan::where('user_id', Auth::user()->id)->sum('amount');
        $data['referral'] = Refferal::where('user_id', Auth::user()->id)->sum('amount');
        $data['investment'] = Investment::where('user_id', Auth::user()->id)->sum('amount');
        $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['investment'] - $data['plan'];
        
        
                    $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
                    $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
                  $data['credit_investment'] = Investment::where('user_id', Auth::user()->id)->where('status', 'Expired')->sum('amount');
        // $data['debit_investment'] = Investment::where('user_id', Auth::user()->id)->where('status', 'Active')->sum('amount');
        $data['user_balance'] =  $data['credit'] + $data['credit_investment'] - $data['debit'];

        $plan_amount = $request->input('amount');

        if ($data['user_balance'] <= '0') {
            return back()->with('status', 'Your Balance Is Insufficient');
        }

        if ($data['user_balance'] <= $plan_amount) {
            return back()->with('status', 'Your Balance Is Insufficient');
        }
        $method = $request->input('method');
        $data['method'] = $method;

        if ($method == 'Bank') {
            return view('dashboard.withdraw-bank', $data);
        } else {
            return view('dashboard.withdraw-funds', $data);
        }
    }


  
public function uploadKyc(Request $request)
{
    $request->validate([
        'card' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
        'pass' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
    ]);

    $kyc = Auth::user();
    $kyc->kyc_status = 0;

    $destinationPath = storage_path('app/private/kyc'); // More secure than public uploads

    if (!File::exists($destinationPath)) {
        File::makeDirectory($destinationPath, 0755, true);
    }

    // ID Card
    $fileIdCard = $request->file('card');
    $filenameIdCard = Str::random(40) . '.' . $fileIdCard->getClientOriginalExtension();
    $fileIdCard->move($destinationPath, $filenameIdCard);

    // Passport
    $filePassport = $request->file('pass');
    $filenamePassport = Str::random(40) . '.' . $filePassport->getClientOriginalExtension();
    $filePassport->move($destinationPath, $filenamePassport);

    // Save to user
    $kyc->id_card = $filenameIdCard;
    $kyc->passport = $filenamePassport;
    $kyc->save();

    return redirect('verify-account')->with('status', 'Documents uploaded successfully. Please wait for approval.');
}




    // public function uploadProfile(Request $request)
    // {

    //     $request->validate([
    //         'photo' =>'string',

    //     ]);
    //     $ppp = Auth::user();

    //     $file_photo= $request->file('photo');

    //     $ext_photo = $file_photo->getClientOriginalExtension();

    //     $filename_photo = time().'.'.$ext_photo;

    //     $file_photo->move('uploads/photo/',$filename_photo);

    //     $ppp->photo =  $filename_photo;



    //     $ppp->update();
    //     return back()->with('status','Profile Updated');
    // }




   
public function uploadProfile(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048', // 2MB max
    ]);

    $user = Auth::user();

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('user/uploads/id');

        // Create directory if not exists
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }

        $file->move($destinationPath, $filename);
        $user->photo = $filename;
    }

    $user->update();

    return redirect('photo')->with('status', 'Profile Picture Updated!');
}






    public function updatePassword(Request $request)
    {
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        #Match The Old Password
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully!");
    }



    public function profileUpdate(Request $request)
    {
        //validation rules

        $request->validate([
            'name' => 'string',
            'phone' => 'string',
            'dob' => 'string',
            'address' => 'string'

        ]);
        $user = Auth::user();
        $user->name = $request['name'];
        $user->phone = $request['phone'];
        $user->dob = $request['dob'];
        $user->address = $request['address'];


        $user->update();
        return back()->with('status', 'Profile Updated');
    }




    public function profileUpdateUserWallet(Request $request)
    {
        //validation rules

        $request->validate([
            'btc_address' => 'string',
            'eth_address' => 'string',
            'usdt_address' => 'string',
           

        ]);
        $user = Auth::user();
        $user->	btc_address = $request['btc_address'];
        $user->eth_address = $request['eth_address'];
        $user->usdt_address = $request['usdt_address'];


        $user->update();
        return back()->with('status', 'Crypto Withdrawal details Updated');
    }





    public function bankUserUpdate(Request $request)
    {
        
        $request->validate([
            'bank_name' => 'string',
            'account_name' => 'string',
            'account_no' => 'string',
            'swiftcode' => 'string'

        ]);
        $user = Auth::user();
        $user->bankName = $request['bank_name'];
        $user->accountName = $request['account_name'];
        $user->accountNumber = $request['account_no'];
        $user->swiftCode = $request['swiftcode'];
     


        $user->save();
        return back()->with('status', 'Withdrawal Details Updated');
    }

    public function supportEmail(Request $request)
    {

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];
        Mail::to('blueswayne133@gmail.com')->send(new supportEmail($data));

        return back()->with('status', 'Email Successfully sent');
    }








    //buy plans
    public function buyPlans(Request $request)
    {
         $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
                    $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
                     $data['credit_investment'] = Investment::where('user_id', Auth::user()->id)->where('status', 'Expired')->sum('amount');
                    // $data['debit_investment'] = Investment::where('user_id', Auth::user()->id)->where('status', 'Active')->sum('amount');
                    $data['user_balance'] =  $data['credit'] + $data['credit_investment'] - $data['debit'];
                    // $data['btc_balance'] = $data['user_balance'] / $price;


                    $data['deposit'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
                    $data['withdrawal'] = Withdrawal::where('user_id', Auth::user()->id)->sum('amount');
                    $data['earning'] = Earning::where('user_id', Auth::user()->id)->sum('capital');
                   $data['addprofit'] = Profit::where('user_id', Auth::user()->id)->sum('amount');
                   $data['debitprofit'] = Debitprofit::where('user_id', Auth::user()->id)->sum('amount');
                   $data['profit'] = $data['addprofit'] + $data['earning'] - $data['debitprofit'];
                    // $data['plan'] = Plan::where('user_id',Auth::user()->id)->sum('amount');
                    $data['referral'] = Refferal::where('user_id', Auth::user()->id)->sum('amount');
                    $data['investment'] = Investment::where('user_id', Auth::user()->id)->sum('amount');
        if ($data['user_balance'] <= '0') {
            return back()->with('status', 'Your Balance Is Insufficient');
        }
        
      
        
        $transaction_id = rand(76503737, 12344994);
        $buy = new Plan;
        $buy->transaction_id = $transaction_id;
        $buy->user_id = Auth::user()->id;
        $buy->amount = $request['amount'];
        $buy->plan_name = $request['plan_name'];
        $buy->plan_duration = $request['plan_duration'];
        $buy->amount = $request['amount'];

        $buy->save();


        $transaction = new Transaction;
        $transaction->user_id = Auth::user()->id;
        $transaction->transaction_id = $transaction_id;
        $transaction->transaction_type = "Debit";
        $transaction->transaction = "debit";
        $transaction->credit = "0";
        $transaction->debit = $request['amount'];
        $transaction->status = 1;
        $transaction->save();
        
        
          $amount = $request['amount'];

if ($amount > $data['user_balance']) {
    return back()->with('status', 'Your requested amount exceeds your balance');
}
        $buy = new Investment;
        $buy->user_id = Auth::user()->id;
        $buy->email = Auth::user()->email;
        $buy->amount=$request['amount'];
        $buy->plan_name=$request['plan_name'];
        $buy->plan_percentage=$request['plan_percent'];
        $buy->plan_duration=$request['plan_duration'];
        $plan_amount = $request->input('amount');
        $plan_duration = $request->input('plan_duration');
        $plan_name = $request->input('plan_name');
        $plan_percentage = $request->input('plan_percentage');
        $plan_percent = $request->input('plan_percent');
        $buy->status='Active';
        $startDate = date('Y-m-d');
        $buy->plan_start=  $startDate;
             
        if($plan_duration == '24 hours' ) 
        {
             
        $endDate = date('Y-m-d', strtotime( $startDate.'+ 24 hours'));
        }
        if($plan_duration == '3 days' ) 
        {
             
        $endDate = date('Y-m-d', strtotime( $startDate.'+ 3 days'));
        }
        if($plan_duration == '1 week' ) 
        {
             
        $endDate = date('Y-m-d', strtotime( $startDate.'+ 1 week'));
        }
        
        if($plan_duration == '2 weeks' ) 
        {
             
        $endDate = date('Y-m-d', strtotime( $startDate.'+ 2 weeks'));
        }
        
        if($plan_duration == '1 month' ) 
        {
             
        $endDate = date('Y-m-d', strtotime( $startDate.'+ 1 month'));
        }
        if($plan_duration == '2 months' ) 
        {
             
        $endDate = date('Y-m-d', strtotime( $startDate.'+ 2 months'));
        }
        if($plan_duration == '3 months' ) 
        {
             
        $endDate = date('Y-m-d', strtotime( $startDate.'+ 3 months'));
        }
        
               
              
        $data= "You have successfully purchased contract ".$plan_name." $".$plan_amount." @ ".$plan_percentage." interest daily 
              with an estimate daily interest of ".$plan_percentage." starting from ".$startDate." to ".$endDate . ".";
              
        $buy->plan_end= $endDate;
          
        $buy->save();

        $email = Auth::user()->email;
              
             
       Mail::to($email)->send(new Plan1($data));
            

        return back()->with('status', 'Plan Has Been Purchased Successfully');
    }













    public function makeWithdrawal(Request $request)
    {
        $method = $request->input('mode');
        $data['method'] = $method;
        $data['deposit'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['withdrawal'] = Withdrawal::where('user_id', Auth::user()->id)->sum('amount');
        $data['addprofit'] = Profit::where('user_id', Auth::user()->id)->sum('amount');
        $data['debitprofit'] = Debitprofit::where('user_id', Auth::user()->id)->sum('amount');
        $data['profit'] = $data['addprofit'] - $data['debitprofit'];
        $data['earning'] = Earning::where('user_id', Auth::user()->id)->sum('capital');
        $data['plan'] = Plan::where('user_id', Auth::user()->id)->sum('amount');
        $data['referral'] = Refferal::where('user_id', Auth::user()->id)->sum('amount');
        $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['plan'];
        
                    $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
                    $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
                  $data['credit_investment'] = Investment::where('user_id', Auth::user()->id)->where('status', 'Expired')->sum('amount');
        // $data['debit_investment'] = Investment::where('user_id', Auth::user()->id)->where('status', 'Active')->sum('amount');
        $data['user_balance'] =  $data['credit'] + $data['credit_investment'] - $data['debit'] ;

        if ($data['user_balance'] <= '0') {
            return redirect('withdrawals')->with('status', 'Your Balance Is Insufficient');
        }
        $transaction_id = rand(76503737, 12344994);
        $with = new Withdrawal;
        $with->transaction_id = $transaction_id;
        $with->user_id = Auth::user()->id;
        $with->amount = $request['amount'];
        $with->status = 0;
        $with->mode = $request['mode'];
        $with->account_name = $request['account_name'];
        $with->account_number = $request['account_number'];
        $with->bank_name = $request['bank_name'];
        $with->bank_routing_number = $request['bank_routing_number'];
        $with->swift = $request['swift'];
        $with->bank_country = $request['bank_country'];
        $with->crypto_type = $request['crypto_type'];
        $with->wallet_address = $request['wallet_address'];
        // $method = $request->input('method');
        // $data['method']=$method;
        $with->save();


        $transaction = new Transaction;
        $transaction->user_id = Auth::user()->id;
        $transaction->transaction_id = $transaction_id;
        $transaction->transaction_type = "Debit";
        $transaction->transaction = "debit";
        $transaction->credit = "0";
        $transaction->debit = $request['amount'];
        $transaction->status = 0;
        $transaction->save();
        return redirect('withdrawals')->with('status', 'Withdrawal Successfully, Please wait for approval');
    }


    public function Trading(Request $request)
    {
        $method = $request['buy'];
        $method = $request['sell'];

        return redirect('asset-balance')->with('status', 'You have placed a sell order you will be notified when your trade hit take profit or stop loss');
        // if($method==='buy'){
        //     return redirect('asset-balance')->with('status', 'You have placed a sell order you will be notified when your trade hit take profit or stop loss'); 
        // }
        // elseif($method==='sell'){
        //     return redirect('withdrawals')->with('status', 'You have placed a sell order you will be notified when your trade hit take profit or stop loss');  
        // }


    }






    public function perform()
    {
        Session::flush();
        Auth::guard('web')->logout();
        return redirect('login');
    }



 public function nextDetails()
    {
     

        return view('dashboard.step2');
    }




    public function Step2(Request $request)
    {

        $request->validate([
            'country' => 'string',
            'state' => 'string',
            'pcode' => 'string',
            'address' => 'string',
            'phone' => 'string'

        ]);

        $user = Auth::user();
        $user->country = $request['country'];
        $user->state = $request['state'];
        $user->pcode = $request['pcode'];
        $user->address = $request['address'];
        $user->phone = $request['phone'];


        $user->update();

        return view('dashboard.step3');
    }

    public function Step3(Request $request)

    {
        $data['deposit'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
        $data['withdrawal'] = Withdrawal::where('user_id', Auth::user()->id)->sum('amount');
        $data['addprofit'] = Profit::where('user_id', Auth::user()->id)->sum('amount');
        $data['debitprofit'] = Debitprofit::where('user_id', Auth::user()->id)->sum('amount');
        $data['profit'] = $data['addprofit'] - $data['debitprofit'];
        $data['earning'] = Earning::where('user_id', Auth::user()->id)->sum('capital');
        $data['plan'] = Plan::where('user_id', Auth::user()->id)->sum('amount');
        $data['referral'] = Refferal::where('user_id', Auth::user()->id)->sum('amount');
        $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['plan'];


        $request->validate([

            'pin' => 'string',


        ]);

        $user = Auth::user();

        $user->pin = $request['pin'];


        $user->update();

        return view('dashboard.home', $data);
    }

    public function resendCode($id)
    {

        $userData = User::where('id', $id)->first();
        $email = $userData->email;

        $validToken = rand(7650, 1234);
        $get_token = Auth::user();
        $get_token->token = $validToken;
        $get_token->update();



        Mail::to($email)->send(new VerificationEmail($validToken));


        return redirect("verify/" . $userData->id)->with('message', 'verification code has been resent to your email');
    }




    public function verify($id)
    {
        $user = User::where('id', $id)->first();
        $data['email'] = $user->email;
        $data['hash'] = $user->password;
        $data['id'] = $user->id;

        return view('dashboard.step3', $data);
    }


    public function emailVerify(Request $request)
    {
        $first_token = $request->input('digit');
        $second_token = $request->input('digit2');
        $third_token = $request->input('digit3');
        $fourth_token = $request->input('digit4');
        $get_token =  $first_token;
        $verify_token = User::where('token', $get_token)->first();
        
        if ($verify_token) {
            $user = User::where('email', $verify_token->email)->first();
            $user->is_activated = 1;
            $user->save();
            $user_email =  $user->email;
            $user_password =  $user->password;

            $data = [
                'name' => $user->name,
                'email' => $user->email,
                'password' => '*********',

            ];
            
        //Mail::to($user_email)->send(new welcomeEmail($data));
        
        
        
        
        
        
                // $client = new Client();
                // $response = $client->get('https://api.coindesk.com/v1/bpi/currentprice/BTC.json');
                // $data = json_decode($response->getBody(), true);
                // $price = $data['bpi']['USD']['rate_float'];

                $data['credit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('credit');
                $data['debit'] = Transaction::where('user_id', Auth::user()->id)->where('status', '1')->sum('debit');
               $data['credit_investment'] = Investment::where('user_id', Auth::user()->id)->where('status', 'Expired')->sum('amount');
            //   $data['debit_investment'] = Investment::where('user_id', Auth::user()->id)->where('status', 'Active')->sum('amount');
                $data['user_balance'] =  $data['credit'] + $data['credit_investment'] - $data['debit'] ;
                // $data['btc_balance'] = $data['user_balance'] / $price;




                $data['deposit'] = Deposit::where('user_id', Auth::user()->id)->where('status', '1')->sum('amount');
                $data['withdrawal'] = Withdrawal::where('user_id', Auth::user()->id)->sum('amount');
                $data['earning'] = Earning::where('user_id', Auth::user()->id)->sum('capital');
                $data['addprofit'] = Profit::where('user_id', Auth::user()->id)->sum('amount');
                $data['debitprofit'] = Debitprofit::where('user_id', Auth::user()->id)->sum('amount');
                $data['profit'] = $data['addprofit'] + $data['earning'] - $data['debitprofit'];
                $data['plan'] = Plan::where('user_id', Auth::user()->id)->sum('amount');
                $data['referral'] = Refferal::where('user_id', Auth::user()->id)->sum('amount');
                $data['investment'] = Investment::where('user_id', Auth::user()->id)->sum('amount');
                $data['balance'] = $data['profit'] + $data['deposit'] + $data['earning'] + $data['referral'] - $data['withdrawal'] - $data['plan'] - $data['investment'];
        
        return view('dashboard.home', $data);
        
        } else {
            return back()->with('error', 'Incorrect Activation Code!');
        }
    }
}
