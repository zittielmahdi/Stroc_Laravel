<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
    return view('Login');
});
Route::post('Sign',[AuthController::class,'SignUp'])->name('Register');
Route::post('Login',[AuthController::class,'Login'])->name('Identificaton');
Route::get('/logout',[AuthController::class,'LogOut'])->name('logout');
Route::view('/login_page','Login')->name('login_page');
Route::view('/signup_page','SignUp')->name('signup_page');
Route::view('/forget_password','Forget_Password')->name('forget_password');
Route::post('/send_token_back',[AuthController::class,'SendToken'])->name('send_token_back');
Route::get('/reset_password/{token}',[AuthController::class,'ResetPasswordView']);
Route::post('/change_password',[AuthController::class,'ChangePassword'])->name('change_password');

Route::middleware('auth')->group(function(){
    Route::view('/home','Home')->name('home');
    Route::view('/contact','ContactUs')->name('contact');
    Route::view('/main_vue_user','Main_Home_User')->name('main_vue_user');
    Route::get('/user_news_interface',[AuthController::class,'GetNews'])->name('user_news_interface');
    Route::post('/contact_us',[AuthController::class,'ContactUs'])->name('contact_us');
    Route::get('/read_more/{id}',[AuthController::class,'ReadMore']);
    Route::post('/comment_send/{id}',[AuthController::class,'SendComments']);
    Route::post('/send_replies/{id}',[AuthController::class,'SendReplies']);
    Route::get('/product_review_panel',[AuthController::class,'GetAllProd'])->name('product_review_panel');
    Route::post('/product_review_panel',[AuthController::class,'SearchProd'])->name('product_review_panel');
    Route::post('/user_news_interface',[AuthController::class,'SearchPub'])->name('user_news_interface');
    Route::get('/showcase_employe',[AuthController::class,'ShowCaseEmp'])->name('showcase_employe');
    Route::get('/chosen_product_details/{id}',[AuthController::class,'ChosenProduct']);
    Route::post('/pay_check/{id}',[AuthController::class,'PayCheck']);
    Route::get('/payment_success/{id}/{quantity}',[AuthController::class,'CommandRegistred'])->name('payment_success');
    Route::get('/user_shopping_list',[AuthController::class,'getUserProd'])->name('user_shopping_list');
    Route::get('/follow_command/{id}',[AuthController::class,'FindCommand']);
    Route::get('/download_facture/{id}',[AuthController::class,'PDFDownLoad'])->name('download_facture');
    Route::middleware('admin_check')->group(function(){
        Route::get('/users_managing_panel',[AuthController::class,'GetUsers'])->name('users_managing_panel');
        Route::view('/admin_panel','AdminPanel')->name('admin_panel');
        Route::get('/delete_user/{id}',[AuthController::class,'DeleteUser']);
        Route::post('/add_product',[AuthController::class,'AddProduct'])->name('add_product');
        Route::view('/product_managing_panel','Product_Managing_Panel')->name('product_managing_panel');
        Route::get('/product_managing_panel2',[AuthController::class,'GetProduct'])->name('product_managing_panel2');
        Route::get('/delete_product/{id}',[AuthController::class,'DeleteProduct']);
        Route::get('/edit_product/{id}',[AuthController::class,'EditProduct']);
        Route::post('/update_product/{id}',[AuthController::class,'UpdateProduct']);
        Route::view('/publication_managing_panel','Publication_Managing_Panel')->name('publication_managing_panel');
        Route::post('/add_pub',[AuthController::class,'AddPub'])->name('add_pub');
        Route::get('/publication_managing_panel2',[AuthController::class,'GetPub'])->name('publication_managing_panel2');
        Route::get('/delete_pub/{id}',[AuthController::class,'DeletePub']);
        Route::get('/get_pub/{id}',[AuthController::class,'EditPub']);
        Route::post('/update_pub/{id}',[AuthController::class,'UpdatePub']);
        Route::view('/new_employe_managing_panel','New_Employe_Managing_Panel')->name('new_employe_managing_panel');
        Route::post('/add_new_employee',[AuthController::class,'AddNewEmployee'])->name('add_new_employee_route');
        Route::get('/new_employe_managing_panel2',[AuthController::class,'GetAllEmp'])->name('new_employe_managing_panel2');
        Route::get('/remove_emp/{id}',[AuthController::class,'DeleteEmp']);
        Route::get('/edit_employe/{id}',[AuthController::class,'EditEmp']);
        Route::post('/update_employe/{id}',[AuthController::class,'UpdateEmp']);
        Route::get('/follow_clients_commands_panel',[AuthController::class,'FollowAllClientsCommands'])->name('follow_clients_commands_panel');
        Route::post('/update_stat/{id}',[AuthController::class,'UpdateStat']);
        Route::get('/chart_managing_panel',[AuthController::class,'Charts'])->name('chart_managing_panel');
    });
});

