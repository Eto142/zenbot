<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; // ✅ Import base Controller
use App\Mail\AdminSendMail;
use App\Models\SentEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    public function index()
    {
        return view('manager.send_mail'); // Blade file: resources/views/admin/send_email.blade.php
    }

    // public function send(Request $request)
    // {
    //     $request->validate([
    //         'to'      => 'required|email',
    //         'subject' => 'required|string|max:255',
    //         'message' => 'required|string',
    //     ]);

    //     try {
    //         Mail::to($request->to)->send(new AdminSendMail(
    //             $request->subject,
    //             $request->message
    //         ));

    //         return back()->with('success', 'Email sent successfully!');
    //     } catch (\Exception $e) {
    //         return back()->with('error', 'Failed to send email: ' . $e->getMessage());
    //     }
    // }


    public function send(Request $request)
{
    $request->validate([
        'to'      => 'required|email',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    try {
        // Send the email
        Mail::to($request->to)->send(new AdminSendMail(
            $request->subject,
            $request->message
        ));

        // Save to database
        SentEmail::create([
            'to'      => $request->to,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return back()->with('success', 'Email sent successfully!');
    } catch (\Exception $e) {
        return back()->with('error', 'Failed to send email: ' . $e->getMessage());
    }
}



public function sentEmails()
{
    $emails = SentEmail::latest()->paginate(20); // Paginate 20 per page
    return view('manager.sent_emails', compact('emails'));
}

}