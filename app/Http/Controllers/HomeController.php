<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\WelcomeNotification;
// use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Notification;


class HomeController extends Controller
{
    public function index(){
        // $user = User::first();
        // Notification::send($user, new WelcomeNotification);
         return view('welcome');
        // dd('done');
    }
}
