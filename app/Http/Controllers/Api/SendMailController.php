<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SendMailRequest;
use App\Jobs\SendEmailJob;
use App\Actions\Email\StoreEmail;

class SendMailController extends Controller
{
    public function run(SendMailRequest $request)
    {
        // collect details
        $details=[
            "emails"=>$request->emails,
            "subject"=>ucfirst($request->subject),
            "body"=>ucfirst($request->body),
            "attachments"=>$request->attachments
        ];

        //Dispatach email job(delay for 5 seconds)
        SendEmailJob::dispatch($details)->delay(now()->addSeconds(5));

        //Save email to database
        $store = (new StoreEmail())->run($details);

        //return success message
        return response()->json(['msg' => "Emails sent successfully"], 200);    
    }
}
