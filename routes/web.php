<?php

Route::domain('tripserb2b.com')->group(function () {
    Route::get('/', 'AgentController@index');
});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::domain('www.tripserb2b.com')->group(function () {
  Route::get('/', 'AgentController@index');
});



Route::domain('www.tripser.africa')->group(function () {
  Route::get('/', 'B2C\SiteController@index');
});
Route::domain('tripser.africa')->group(function () {
  Route::get('/', 'B2C\SiteController@index');
});

// Route Authentication Pages


Route::get('/auth-login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/authenticate', 'Auth\LoginController@authenticate')->name('authenticate');
Route::get('/auth-register', 'Auth\RegisterController@showRegistrationForm')->name('guest-register-form');
Route::post('/register', 'Auth\RegisterController@postRegistration')->name('register');
Route::get('/registration-completed', 'Auth\RegisterController@lock_screen');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');


Route::get('/auth-forgot-password', 'AuthenticationController@forgot_password')->name('password.request');
Route::get('/auth-reset-password', 'AuthenticationController@reset_password')->name('password.reset');
Route::get('/password/reset', 'AuthenticationController@reset');;
Route::get('/auth-lock-screen', 'AuthenticationController@lock_screen');
Route::post('/password/email', 'AuthenticationController@forgot');




Route::group(['domain' => 'tripserb2b.com', 'domain' => 'tripser.africa', 'domain' => 'tripserb2b.al'], function () {
    Route::get('/', 'AgentController@index');
});

//----------------------------  B2B ---------------------------- //

//--GNR
Route::get('/gnr/region-lists', 'B2B\GnrController@ReginLists');
Route::post('/gnr/rate-recheck/{search_id}/{rate_key}/{group_code}/{search_log_id}', 'B2B\GnrController@RateRecheck');

//--GNR


// Route Dashboards
Route::group(['middleware' => 'auth'], function () {
    // Route url
    Route::get('/B2B', 'DashboardController@dashboardAnalytics');
    Route::get('/dashboard-analytics', 'DashboardController@dashboardAnalytics');

    Route::get('/B2B-reservation', 'B2B\ReservationController@index');
    Route::get('/B2B-reservation/searching', 'B2B\ReservationController@SaveSearchLogAndShowSearching');
    Route::get('/B2B-reservation/hotels/{searchID}', 'B2B\ReservationController@HotelList')->name('HotelList');
    Route::get('/B2B-hotel/show-hotel/{hotel_id}/{searchID}/{search_resp_id}', 'B2B\ReservationController@ShowHotel')->name('ShowHotel');
    Route::get('/B2B-hotel/book/details/{search_id}/{book_search_id}', 'B2B\ReservationController@AddDetailForBookHotel')->name('AddDetailForBookHotel');
    Route::post('/B2B-hotel/booking', 'B2B\ReservationController@HotelBooking')->name('HotelBookingPaymentOption');
    Route::get('/B2B-hotel/booking/payment/{booking_id}', 'B2B\ReservationController@HotelBookingPayment')->name('HotelBookingPayment');
    Route::post('/B2B-hotel/hotel-pooking-pay-with-wallet/{booking_id}', 'B2B\ReservationController@HotelBookingPayWithWallet')->name('HotelBookingPayWithWallet');
    Route::get('/B2B-reservation/show-invoice/{booking_id}', 'B2B\ReservationController@HotelBookingShowinvoiceById')->name('HotelBookingShowinvoiceByID');
    Route::get('/B2B-reservation/make-pdf-from-invoice/{booking_id}', 'B2B\ReservationController@MakePdfFromInvoice')->name('HotelBookingInvoiceToPDF');
    Route::post('/B2B-reservation/send-invoice-with-mail/{booking_name}', 'B2B\ReservationController@SendInvoiceWithEmail')->name('HotelBookingSendInvoiceWithEmail');


    Route::post('/B2B-hotels/callback/{booking_id}', 'B2B\ReservationController@GTBankCallback')->name('GTBankCallback');
    Route::get('/B2B-hotels/booking-reports', 'B2B\ReservationController@HotelBookingReports')->name('HotelBookingReports');
    Route::get('/B2B-hotels/booking-reports-confirmed', 'B2B\ReservationController@HotelBookingReports')->name('HotelBookingReportsConfirmed');
    Route::get('/B2B-hotels/booking-reports-failed', 'B2B\ReservationController@HotelBookingReports')->name('HotelBookingReportsFailed');
    Route::get('/B2B-hotels/booking-reports-rejected', 'B2B\ReservationController@HotelBookingReports')->name('HotelBookingReportsRejected');
    Route::get('/B2B-hotels/booking-reports-pending', 'B2B\ReservationController@HotelBookingReports')->name('HotelBookingReportsPending');
    Route::get('/B2B-hotels/booking-reports-canceled', 'B2B\ReservationController@HotelBookingReports')->name('HotelBookingReportsCanceled');


    Route::get('/B2B-hotels/show-booked-hotel-logs/{booking_id}', 'B2B\ReservationController@ShowBookedHotelLogs')->name('ShowBookedHotelLogs');
    Route::get('/B2B-hotels/cancel/{booking_id}/{booking_name}', 'B2B\ReservationController@ShowCancellationForm')->name('ShowCancellationForm');
    Route::post('/B2B-hotels/cancellation/{booking_id}/{booking_name}', 'B2B\ReservationController@CancelHotelBooking')->name('CancelHotelBooking');

    Route::post('/B2B-hotel-policy', 'B2B\ReservationController@GetRoompolicy')->name('GetPlicy');
    Route::post('/B2B-hotels/SearchAndAvailabilityRequest/{search_id}', 'B2B\ReservationController@SearchandAvailabilityRequest')->name('SearchAndAvailabilityRequest');
    Route::post('/LoadRooms', 'B2B\ReservationController@LoadRooms')->name('LoadRooms');


    // B2B wallet
    Route::get('/B2B-wallet/make-a-deposit', 'B2B\UserWalletController@MakeADeposit')->name('MakeADeposit');
    Route::post('/B2B-wallet/save-make-a-deposit/', 'B2B\UserWalletController@SaveMakeADeposit')->name('SaveMakeADeposit');

    Route::resource('/B2B-Agencies', 'B2B\AgencyController');
    Route::resource('/B2B-Branches', 'B2B\BranchController');
    Route::resource('/B2B-Users', 'B2B\UserController');

    //Financial Reports
    Route::get('/B2C-Plans-Reports', 'B2B\FinancialReportsController@B2CPlansTransactionReports')->name('B2CPlansTransactionReports');
    Route::get('/B2C-Plans-Reports-update/{id}', 'B2B\FinancialReportsController@UpdateB2CPlansTransactionReportsStatus')->name('UpdateB2CPlansTransactionReportsStatus');

    //Affiliate Deposit
    Route::get('/Affiliate-Deposit', 'B2B\FinancialReportsController@AffiliateDeposit')->name('AffiliateDeposit');
    Route::get('/Affiliate-Deposit-Cash-Deposite', 'B2B\FinancialReportsController@AffiliateDeposit')->name('AffiliateDepositCashDeposite');
    Route::post('/Affiliate-Deposit-Store', 'B2B\FinancialReportsController@AffiliateDepositStore')->name('AffiliateDepositStore');
    Route::get('/Affiliate-Deposit-callback-from-migs/{id}', 'B2B\FinancialReportsController@BankCallbackFromMigs')->name('BankCallbackFromMigs');
    Route::get('/Affiliate-Deposit-create-pdf-for-bank-receipt/{id}', 'B2B\FinancialReportsController@CreatePdfForBankReceipt')->name('CreatePdfForBankReceipt');

    Route::get('/Affiliate-Deposit-Reports', 'B2B\FinancialReportsController@AffiliateDepositReports')->name('AffiliateDepositReports');
    Route::post('/Affiliate-Deposit-Change-Status/{id}', 'B2B\FinancialReportsController@AffiliateDepositChangeStatus')->name('AffiliateDepositChangeStatus');
    Route::get('/Affiliate-Deposit-PayOnline/{id}', 'B2B\FinancialReportsController@AffiliateDepositPayOnline')->name('AffiliateDepositPayOnline');
    Route::post('/Affiliate-Deposit-PayOnlineWithMasterCard', 'B2B\FinancialReportsController@ProcessMasterCard')->name('PayOnlineWithMasterCard');
    Route::get('/Affiliate-Fund-Allocation', 'B2B\FinancialReportsController@AffiliateFundAllocation')->name('AffiliateFundAllocation');
    Route::post('/Affiliate-Fund-Allocation-Load-Branches', 'B2B\FinancialReportsController@AffiliateFundAllocationLoadBranches')->name('AffiliateFundAllocationLoadBranches');

    Route::post('/Affiliate-Fund-Allocation-Store', 'B2B\FinancialReportsController@AffiliateFundAllocationStore')->name('AffiliateFundAllocationStore');
    Route::get('/Affiliate-Fund-Allocation-Reports', 'B2B\FinancialReportsController@AffiliateFundAllocationReports')->name('AffiliateFundAllocationReports');

  Route::get('/CreatePdfForApprovedBankReceipt/{id}', 'B2B\FinancialReportsController@CreatePdfForApprovedBankReceipt')->name('CreatePdfForApprovedBankReceipt');
  Route::post('/savecardnumber', 'B2B\FinancialReportsController@savecardnumber')->name('savecardnumber'); // test
  Route::post('/changebookdate/{id}', 'B2B\ReservationController@changebookdate')->name('changebookdate'); // test


    //Setting
    Route::get('/B2B-setting/commission', 'B2B\SettingController@Commission')->name('B2B-Setting-Commission');
    Route::post('/B2B-setting/commission/update', 'B2B\SettingController@UpdateCommission')->name('B2B-Setting-Commission-Update');

    Route::get('B2B-Hotel-API', 'B2B\SettingController@HotelAPI')->name('B2B-Hotel-API');
    Route::post('B2B-Hotel-API/update', 'B2B\SettingController@HotelApiStore')->name('B2B-Hotel-API-Update');

    Route::get('B2B-GTpay-API', 'B2B\SettingController@GTpayAPI')->name('B2B-GTpay-API');
    Route::post('B2B-GTpay-API/update', 'B2B\SettingController@GTpayApiStore')->name('B2B-GTpay-API-Update');

    Route::get('B2B-MIGS-API', 'B2B\SettingController@MIGSAPI')->name('B2B-MIGS-API');
    Route::post('B2B-MIGS-API/update', 'B2B\SettingController@MIGSApiStore')->name('B2B-MIGS-API-Update');


    //--Site
    Route::get('/site-setting-general', 'B2B\SiteController@General')->name("SiteGeneralSettings");
    Route::post('/site-setting-general', 'B2B\SiteController@GeneralUpdate')->name("SiteGeneralSettingsUpdate");

    Route::get('/site-pages/{id}', 'B2B\SiteController@Pages')->name("SitePages");
    Route::post('/site-pages-update', 'B2B\SiteController@PagesUpdate')->name("SitePagesUpdate");
    Route::get('/site-pages-file-manager', 'B2B\SiteController@FileManager');

    //--Site


    //-- User Profile
    Route::get('/B2B/my-profile', 'B2B\ProfileController@EditProfile')->name('EditMyProfile');
    Route::post('/B2B/update-my-profile', 'B2B\ProfileController@UpdateProfile')->name('UpdateMyProfile');

    Route::get('/B2B/change-password', 'B2B\ProfileController@ChangePassword')->name('ChnagePassword');
    Route::post('/B2B/update-change-password', 'B2B\ProfileController@UpdateChagePassword')->name('UpdateChagePassword');

    //--
    Route::get('/B2B/create-role', 'B2B\ProfileController@CreateRole')->name('CreateRole');



  // FLIGHT RESERVATION
  Route::get('/tbo/airport-list', 'B2B\TboController@AirportsList');
  Route::get('/tbo/airline-list', 'B2B\TboController@AirlineList');

  Route::get('B2B-flight-reservation/searching', 'B2B\FlightReservationController@Searching');
  Route::post('B2B-flight-reservation/SearchAndAvailabilityRequest/{flight_search_log_id}', 'B2B\FlightReservationController@SearchAndAvailabilityRequest');
  Route::get('B2B-flight-reservation/flights/{flight_search_log_id}', 'B2B\FlightReservationController@ShowFlights');
  Route::get('B2B-flight-reservation/passenger/{flight_id}', 'B2B\FlightReservationController@Passenger')->name('FlightPassenger');
  Route::post('B2B-flight-reservation/passenger-store/{flight_id}', 'B2B\FlightReservationController@PassengerStore')->name('FlightPassengerStore');
  
	Route::get('/B2B-flight-reservation/passenger-payment/{flight_id}', 'B2B\FlightReservationController@PassengerPayment')->name('FlightPassengerPayment');
	Route::post('/B2B-flight-reservation/callback/{flight_id}', 'B2B\FlightReservationController@GTBankCallback')->name('FlightReservationGTBankCallback');
	Route::post('/B2B-flight-reservation/flight-reservation-pay-with-wallet/{flight_id}', 'B2B\FlightReservationController@FlightReservationPayWithWallet')->name('FlightReservationPayWithWallet');
    Route::get('/B2B-flight-reservation/flight-show-invoice/{flight_id}', 'B2B\FlightReservationController@FlightReservationShowinvoiceById')->name('FlightReservationShowinvoiceById');

  // FLIGHT RESERVATION



});
//----------------------------  B2B ---------------------------- //

//-- homepage
Route::get('/', 'HomeController@index');
Route::get('/3d-secure', 'HomeController@page_3dSecure');
Route::get('/about', 'HomeController@page_about');
Route::get('/contacts', 'HomeController@page_contacts');
Route::get('/ontrack-contacts', 'HomeController@page_ontrack_contacts')->name('OntrackContacts');
Route::post('/contact-us-send-message', 'HomeController@page_contacts_save_message');

Route::get('/legal-information', 'HomeController@page_legal_information');

Route::get('/refund-policy', 'HomeController@page_refund_policy');
Route::get('/privacy-policy', 'HomeController@page_privacy_policy');

Route::get('/b2c_travel_portal', 'HomeController@b2c_travel_portal');
Route::get('/buy', 'HomeController@buy');
Route::post('/checkout', 'HomeController@checkout');
Route::get('/order-review/{order_id}', 'HomeController@OrderReview');
Route::post('/callback/{plan_id}', 'HomeController@BankCallback');
Route::get('/callback-from-migs/{plan_id}', 'HomeController@BankCallbackFromMigs');


//-- homepage


// -- agents

Route::get('/agents', 'AgentController@index')->name('agentsIndex');
Route::get('/agents/about-us', 'AgentController@AboutUS')->name('agentsAboutUs');
Route::get('/agents/legal-information', 'AgentController@Legalinformation')->name('agentsLegalinformation');
Route::get('/agents/technical-support', 'AgentController@TechnicalSupport')->name('agentsTechnicalSupport');
Route::get('/agents/3D-Secure', 'AgentController@Page3DSecure')->name('agents3DSecure');

Route::get('/agents/agent-contracts', 'AgentController@PageAgentContracts')->name('agentsContracts');
Route::get('/agents/term-of-use', 'AgentController@PageTermOfUse')->name('agentsTermOfUse');
Route::get('/agents/privacy-policy', 'AgentController@PagePrivacyPolicy')->name('agentsPrivacyPolicy');
Route::get('/agents/contact-us', 'AgentController@PageContactUs')->name('agentsContactUs');

Route::get('/agents/register', 'AgentController@RegisterForm1')->name('agentsRegisterForm1');
Route::post('/agents/register', 'AgentController@storeRegisterForm1')->name('agentsStoreRegisterForm1');
Route::get('/agents/wait-for-activation/{id}/{email}', 'AgentController@WaitForActivation')->name('agentsWaitForActivation');
Route::get('/agents/verify/email/{id}/{token}', 'AgentController@VerifyEmailAndContinueRegistration')->name('agentsVerifyEmailAndContinueRegistration');
Route::post('/agents/register2/{id}', 'AgentController@storeRegisterForm2')->name('agentsStoreRegisterForm2');
// -- agents


//---- B2C
Route::get('/B2C-Index', 'B2C\SiteController@index')->name('B2CIndex');
Route::get('hotel-searching','B2C\HotelReservationController@HotelSearching')->name('B2CHotelSearching');
Route::post('/SearchAndAvailabilityRequest/{search_id}', 'B2C\HotelReservationController@SearchandAvailabilityRequest')->name('B2CSearchAndAvailabilityRequest');
Route::get('hotels-reservation/result/{reservation_search_log_id}','B2C\HotelReservationController@HotelReservationSearchResult')->name('B2CHotelReservationSearchResult');
Route::get('hotel-reservation/show-hotel/{hotel_id}/{searchID}/{search_resp_id}', 'B2C\HotelReservationController@ShowHotel')->name('B2CShowHotel');
Route::get('hotel-reservation/book/details/{search_id}/{book_search_id}', 'B2C\HotelReservationController@AddDetailForBookHotel')->name('B2CAddDetailForBookHotel');
//---- B2C
