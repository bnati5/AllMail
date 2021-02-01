<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Email\EmailQueries;
use App\Http\Resources\ListAllEmailsResource;

class ListMailController extends Controller
{
    public function all(){
 
        //Fetch all emails
        $listEmail = (new EmailQueries())->allEmails();

        //return resource to display result
        return ListAllEmailsResource::collection($listEmail);
    }
}
