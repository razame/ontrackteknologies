<?php

namespace App\Http\Controllers;

use Mail;

class MailController extends Controller
{

  // send tripserb2b registration verfication link
  public function SendRegisterVerificationLink($to_email, $to_name, $from_email, $from_name, $data, $user)
  {
    $email_data = ['to_email' => $to_email, 'to_name' => $to_name, 'from_email' => $from_email, 'from_name' => $from_name, 'data' => $data, 'user' => $user];

    Mail::send('emails.B2B.register_verification', $email_data, function ($message) use ($to_email, $to_name, $from_email, $from_name, $data, $user) {
      $message->to($to_email, $to_name)->subject
      ($data['subject']);
      $message->from($from_email, $from_name);
    });
  }


  // send booking confrmation email
  public function SendBookingConfirmation($to_email, $to_name, $from_email, $from_name, $data)
  {
    $email_data = ['to_email' => $to_email, 'to_name' => $to_name, 'from_email' => $from_email, 'from_name' => $from_name, 'data' => $data];

    Mail::send('emails.B2B.booking_confirmation', $email_data, function ($message) use ($to_email, $to_name, $from_email, $from_name, $data) {
      $message->to($to_email, $to_name)->subject
      ($data['subject']);
      $message->attach($data['file']);
      $message->from($from_email, $from_name);
    });
  }
}
