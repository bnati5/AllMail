<?php

namespace App\Services\Email;

use App\Models\EmailList;

class EmailQueries{

    public function allEmails(){

        //Get all email list
        $all = EmailList::all();
        return $all;
    }
}