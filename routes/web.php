<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendEmailController;
use App\Http\controllers\HomeController;
use App\Http\controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home.homepage');
});

Route::get('/about', function () {
    return view('home.about');
});

Route::get('/support', function () {
    return view('home.support');
});

Route::get('/how', function () {
    return view('home.how');
});

Auth::routes();

Route::get('/sent-emails', [SendEmailController::class, 'sentEmails'])->name('sent-emails');
Route::get('/send-user-email', [SendEmailController::class, 'index'])->name('send.user.email');
Route::post('/send-email', [SendEmailController::class, 'send'])->name('send.email.post');

// Route::get('/home','App\Http\Controllers\UserController@redirect')->name('home');
Route::get('/home', 'App\Http\Controllers\UserController@redirect')->middleware('verifyUser')->name('home');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', 'App\Http\Controllers\UserController@dashboard');
Route::get('/deposit', 'App\Http\Controllers\UserController@userDeposit');
Route::get('/forex', 'App\Http\Controllers\UserController@Forex');
Route::get('/stocks', 'App\Http\Controllers\UserController@Stocks');
Route::get('/wallet', 'App\Http\Controllers\UserController@Wallet');
Route::get('/crypto', 'App\Http\Controllers\UserController@Crypto');
Route::get('/binary', 'App\Http\Controllers\UserController@Binary');
Route::get('/bot', 'App\Http\Controllers\UserController@Bot');
Route::get('/copy', 'App\Http\Controllers\UserController@Copy');
Route::get('/profile', 'App\Http\Controllers\UserController@Profile');
Route::get('/photo', 'App\Http\Controllers\UserController@Photo');
// Route::post('/upload-picture','App\Http\Controllers\UserController@uploadProfile');
Route::post('/upload_picture', 'App\Http\Controllers\UserController@uploadProfile')->name('upload_picture');
Route::get('/crypto_buy', 'App\Http\Controllers\UserController@Crypto_buy');
Route::post('/get-deposit', 'App\Http\Controllers\UserController@getDeposit');
Route::post('/make-deposit', 'App\Http\Controllers\UserController@makeDeposit');
Route::get('/support', 'App\Http\Controllers\UserController@supportTicket');
Route::get('/accounthistory', 'App\Http\Controllers\UserController@accounthistory');
Route::get('/earnings', 'App\Http\Controllers\UserController@Earning');
Route::get('/buy-plan', 'App\Http\Controllers\UserController@buyplan');
Route::get('/bonus', 'App\Http\Controllers\UserController@Bonus');
Route::get('/account-settings', 'App\Http\Controllers\UserController@accountSettings');
Route::get('/myplans', 'App\Http\Controllers\UserController@myplans');
Route::get('/settings', 'App\Http\Controllers\UserController@Settings');
Route::get('/tradinghistory', 'App\Http\Controllers\UserController@tradingHistory');
Route::get('/referuser', 'App\Http\Controllers\UserController@referUser');
Route::get('/verify-account', 'App\Http\Controllers\UserController@verifyAccount');
Route::get('/upload-kyc', 'App\Http\Controllers\UserController@uploadKyc');
Route::post('/upload-kyc', 'App\Http\Controllers\UserController@uploadKyc');
Route::get('/withdrawals', 'App\Http\Controllers\UserController@withdrawals');
Route::get('/withdraw-funds', 'App\Http\Controllers\UserController@withdrawFunds');
Route::get('/logout', 'App\Http\Controllers\UserController@perform')->name('logout.perform');
Route::post('/change-password', 'App\Http\Controllers\UserController@updatePassword')->name('update-password');
Route::post('/profile-update', 'App\Http\Controllers\UserController@profileUpdate')->name('profileupdate');
Route::post('/update-user-bank', 'App\Http\Controllers\UserController@bankUserUpdate')->name('update-user-bank');
Route::post('/update-user-wallet','App\Http\Controllers\UserController@profileUpdateUserWallet')->name('update-user-wallet');
Route::post('/support-email', 'App\Http\Controllers\UserController@supportEmail');
Route::post('/buy-plan', 'App\Http\Controllers\UserController@buyPlans');
Route::get('/investments', 'App\Http\Controllers\UserController@investmentHistory');
Route::post('/trading', 'App\Http\Controllers\UserController@Trading');
Route::post('/make-withdrawal', 'App\Http\Controllers\UserController@makeWithdrawal');
Route::post('/step2', 'App\Http\Controllers\UserController@Step2')->name('step2');
Route::get('update_details', 'App\Http\Controllers\UserController@nextDetails')->name('update.details');
Route::post('/dashboard', 'App\Http\Controllers\UserController@Step3')->name('step3');
Route::get('verify/{id}', 'App\Http\Controllers\UserController@verify')->name('verify');
Route::match(['get', 'post'],'email-verify', 'App\Http\Controllers\UserController@emailVerify')->name('code');
Route::get('resend-code/{id}', 'App\Http\Controllers\UserController@resendCode')->name('resendCode');
Route::post('activate-bot', 'App\Http\Controllers\UserController@activateBot')->name('activate.bot');






// manger user details from admin
Route::get('/users', 'App\Http\Controllers\UserManagementController@viewUser');
Route::get('/profile/{id}/', 'App\Http\Controllers\UserManagementController@userProfile');
Route::get('/approve-deposit/{id}/', 'App\Http\Controllers\UserManagementController@ApproveDeposit');
Route::get('/decline-deposit/{id}/', 'App\Http\Controllers\UserManagementController@DeclineDeposit');

Route::get('/clear-account/{id}', 'App\Http\Controllers\UserManagementController@clearAccount')->name('clear.account');

Route::get('/clear-plan/{id}', 'App\Http\Controllers\UserManagementController@clearPlan')->name('clear.plan');


Route::get('/approve-withdrawal/{id}/', 'App\Http\Controllers\UserManagementController@ApproveWithdrawal');
Route::get('/decline-withdrawal/{id}/', 'App\Http\Controllers\UserManagementController@DeclineWithdrawal');
Route::get('/add-profit/{id}/', 'App\Http\Controllers\UserManagementController@getUserProfit');
Route::post('/debit-profit', 'App\Http\Controllers\UserManagementController@debitUserProfit');
Route::get('/debit-profit/{id}/', 'App\Http\Controllers\UserManagementController@getDebitProfit');
Route::post('/add-profit', 'App\Http\Controllers\UserManagementController@addUserProfit');
Route::get('/add-deposit/{id}/', 'App\Http\Controllers\UserManagementController@getUserDeposit');
Route::post('/add-deposit', 'App\Http\Controllers\UserManagementController@addUserDeposit');
Route::get('/add-referral/{id}/', 'App\Http\Controllers\UserManagementController@getUserReferral');
Route::post('/add-referral', 'App\Http\Controllers\UserManagementController@addUserReferral');
Route::get('/total-deposits', 'App\Http\Controllers\UserManagementController@usersDeposit');
Route::get('/total-withdrawals', 'App\Http\Controllers\UserManagementController@usersWithdrawals');
Route::get('/total-profits', 'App\Http\Controllers\UserManagementController@usersProfit');
Route::get('/update-wallet', 'App\Http\Controllers\UserManagementController@updateWallet')->name('wallet');
Route::post('/choose-wallet', 'App\Http\Controllers\UserManagementController@chooseWallet')->name('choose-wallet');
Route::post('/update-trc', 'App\Http\Controllers\UserManagementController@updateTrc')->name('update-trc');
Route::post('/update-btc', 'App\Http\Controllers\UserManagementController@updateBtc')->name('update-btc');
Route::post('/update-eth', 'App\Http\Controllers\UserManagementController@updateEth')->name('update-eth');
Route::post('/update-bank', 'App\Http\Controllers\UserManagementController@updateBank')->name('update-bank');
Route::get('/all-transactions', 'App\Http\Controllers\UserManagementController@allTransactions')->name('user.transactions');
Route::get('/send-mail', 'App\Http\Controllers\UserManagementController@sendTestMail');
Route::get('/send-mail/{id}/', 'App\Http\Controllers\UserManagementController@sendMail');
Route::post('/send-user-email', 'App\Http\Controllers\UserManagementController@sendUserEmail');
Route::get('/delete/{id}', 'App\Http\Controllers\UserManagementController@deleteUser');
Route::get('send-user-mail/{id}', 'App\Http\Controllers\UserManagementController@sendUserMail');
Route::get('update_wallet', 'App\Http\Controllers\UserManagementController@updateWallet')->name('update.wallet');
Route::post('admin_update_wallet', 'App\Http\Controllers\UserManagementController@saveWallet')->name('admin.save.wallet');
Route::post('/update-signal', 'App\Http\Controllers\UserManagementController@updateSignal')->name('update-signal');
Route::get('/add-traders', 'App\Http\Controllers\UserManagementController@addTrader')->name('add-traders');
Route::get('/edit-trader/{id}/', 'App\Http\Controllers\UserManagementController@editTrader');
Route::match(['get', 'post'], 'update-trader/{id}', 'App\Http\Controllers\UserManagementController@updateTrader')->name('update.trader');
Route::post('save-trader', 'App\Http\Controllers\UserManagementController@saveTrader')->name('save.trader');
Route::get('/delete-trader/{id}', 'App\Http\Controllers\UserManagementController@deleteTrader');
Route::get('/accept-kyc/{id}/', 'App\Http\Controllers\UserManagementController@acceptKyc');
Route::get('/decline-kyc/{id}/', 'App\Http\Controllers\UserManagementController@rejectKyc');
Route::match(['get', 'post'], 'send-mail', 'App\Http\Controllers\UserManagementController@sendMail')->name('send.mail');
Route::post('update-signal-strength/{id}/', 'App\Http\Controllers\UserManagementController@updateSignalStrength')->name('signal.strength');
Route::post('update-notification/{id}/', 'App\Http\Controllers\UserManagementController@updateNotification')->name('update.notification');