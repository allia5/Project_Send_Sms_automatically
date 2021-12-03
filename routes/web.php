<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\post_sms;
use Illuminate\Support\Carbon;



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

Route::get('/ramzi/{numm}','App\Http\Controllers\post_sms@post_sms1');
Route::get('users/', function () {
  $table= DB::table('post')->where('etat','=','1')->orderBy('date_fin','asc')->first();
  
  /* foreach($table as $tables){
    print_r($tables->username);
    

   }*/
   
   $mytime = carbon::now();
   
           /* */
        
            $mytime->add(new DateInterval("PT1H"));
            $mytime = $mytime->toDateTimeString();
             print_r($mytime);
           //  print_r(strtotime('2000-09-15 18:00:00'));
            
});
