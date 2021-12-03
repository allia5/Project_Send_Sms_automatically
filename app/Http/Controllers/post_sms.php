<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use MessageBird\Client;
use MessageBird\Objects\Message;

/*MessageBird\Objects\ */
class post_sms extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function post_sms1($numm)
    {
        /*require_once 'vendor/autoload.php';*/
        $messagebird = new  Client('LuvmQUEIc5g1NavY3EuGT90JX');
        $message = new Message;
        $message->originator = $numm;
        $message->recipients = [ $numm ];
        $message->body = 'Hi! This is your first message';
        $response = $messagebird->messages->create($message);
        var_dump($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
