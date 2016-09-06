<?php

namespace App\Http\Controllers\FormEditor;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Mails\Mails;
use App\Models\Transaction\Customer;
use App\Models\Transaction\Transaction;
use App\Models\Transaction\TransactionDetail;

use App\Helpers\MailHelpers;
use App\Helpers\AppHelpers;

class FormEditorController extends Controller
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

        foreach($message as $val){
            if(strpos($val['subject'], "[Vertikal Digital Indonesia]") !== false){
                if(strpos($val['subject'], "Please, Request a Project and be Our Next Client") !== false){
                    $mails = new Mails;
                    $mails->mail_index = $val['mail_index'];
                    $mails->mailTypes = "form_editor";
                    $mails->date = $val['date'];
                    $mails->from = $val['from'];
                    $mails->subject = $val['subject'];
                    $mails->content = $val['content'];
                    $mails->isread = 'false';
                    $mails->save();
                }
            }
        }

        $mail = Mails::where('mailTypes', 'form_editor')->orderBy('mail_index', 'desc')->get();
        $head = json_decode($mail[0]->content);
        $header = [];
        for($i=1;$i<sizeof($head);$i+=2){
            array_push($header, $head[$i]);
        }
        return view('pages.formEditor.index', ['mails' => $mail, 'header' => $header])->withTitle('FormEditor');
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
