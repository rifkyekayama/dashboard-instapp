<?php

namespace App\Http\Controllers\Mails;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Mails\Mails;

use App\Helpers\MailHelpers;

class MailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mail = new MailHelpers();
        $mail->readAllMails();
        if(Mails::count() == 0){
            $message = $mail->getMessages();
        }else{
            $message = $mail->getMessagesUnRead();
        }

        // foreach($message as $val){
        //     $mails = new Mails;
        //     $mails->mail_index = $val['mail_index'];
        //     $mails->date = $val['date'];
        //     $mails->from = $val['from'];
        //     $mails->subject = $val['subject'];
        //     $mails->content = $val['content'];
        //     $mails->isread = 'false';
        //     $mails->save();
        // }

        $mail = Mails::orderBy('mail_index', 'desc')->get();
        $head = json_decode($mail[0]->content);
        $header = [];
        for($i=1;$i<sizeof($head);$i+=2){
            array_push($header, $head[$i]);
        }
        return view('pages.mails.index', ['mails' => $mail, 'header' => $header])->withTitle('Dashboard');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allMessage(){
        $mail = new MailHelpers();
        $mail->readAllMails();
        $message = $mail->getMessages();
        // $message = $mail->getMessagesUnRead();

        foreach($message as $val){
            $mails = new Mails;
            $mails->mail_index = $val['mail_index'];
            $mails->date = $val['date'];
            $mails->from = $val['from'];
            $mails->subject = $val['subject'];
            $mails->content = $val['content'];
            $mails->isread = 'false';
            $mails->save();
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function messageUnRead(){
        $mail = new MailHelpers();
        $mail->readAllMails();
        // $message = $mail->getMessages();
        $message = $mail->getMessagesUnRead();

        dd($message);

        // foreach($message as $val){
        //     $mails = new Mails;
        //     $mails->mail_index = $val['mail_index'];
        //     $mails->date = $val['date'];
        //     $mails->from = $val['from'];
        //     $mails->subject = $val['subject'];
        //     $mails->content = $val['content'];
        //     $mails->isread = 'false';
        //     $mails->save();
        // }
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
