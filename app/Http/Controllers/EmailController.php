<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Mail\SendMailable;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail()
    {
        $this->dispatch(new SendEmailJob());
        echo 'email sent';
    }
}
