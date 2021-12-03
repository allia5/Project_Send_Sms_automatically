<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\post_sms;
use Symfony\Component\VarDumper\VarDumper;
use DateInterval;

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

        $schedule->call(function () {
            /* DB::insert('insert into post (username,num_dis,etat,text,date_fin)  values (?, ?, ?, ?, ?)', ['allia ramzi', '+213657777750','1','1th messages','2000/09/15 19:05:00']);*/
            $table = DB::table('post')->where('etat', '=', '1')->orderBy('date_fin', 'asc')->first();
            /*get date now*/
            $mytime = now();
            $mytime->add(new DateInterval("PT1H"));
            $mytime = $mytime->toDateTimeString();
            /*-----------*/
            $object = new post_sms();
            
            var_dump($table->date_fin);
            var_dump($mytime);
            
            if (strtotime($table->date_fin)==strtotime($mytime)) {
                $object->post_sms1($table->num_dis);
                $affected = DB::update(
                    'update post set etat = 0 where id = ?',
                    [$table->id]
                );
            }
        
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
