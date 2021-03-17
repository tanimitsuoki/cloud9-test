<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;


class MailController extends Controller
{

    //メールフォーム表示
public function index(){
    return view('mail');
}

// メール送信処理
public function send(Request $request){
    $email = $request->email; //送信先アドレス取得
    $text = $request->text; //送信テキスト取得

    // dd($text);
    // メール送信処理（//view/emails/test_mail_text.blade.phpにデータを送る）
    Mail::send(['text' => 'emails.test_mail_text'], [
        'text'=>$text , //送りたい情報
    ]
    , function($message) use($email) {
        $message
            ->from('info@test.jp')
            ->to($email)
            ->subject("テストメールだよ！");
    });
    return redirect('mail');
}

    
}
