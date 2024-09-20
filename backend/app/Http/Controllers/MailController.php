<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendEmailJob;

class MailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $email = $request->input("email");
        $subject = 'テストメール';
        $message = 'これはテストメールです。';

        SendEmailJob::dispatch($email, $subject, $message)->onQueue('emails');

        return redirect()->back()->with("success","メール送信ジョブをキューに追加しました！");
    }
}
