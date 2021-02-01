<?php

namespace App\Actions\Email;
use App\Models\EmailList;

class StoreEmail{

    public function run($details){

        //Separate array with comma to save in db
        $arrayEmails = implode(',', $details['emails']);

        //Initialize new EmailList Model
        $email = new EmailList;
        $email->email = $arrayEmails;
        $email->subject = $details['subject'];
        $email->body = $details['body'];
        //Check if attachments exist
        if(!empty($details['attachments'])){

            //initiate empty array
            $attachments = [];
            $random_number = mt_rand(1000,9999);
            //Push key filename into a new array
            for($i = 0 ; $i < count($details['attachments']); $i++){

                array_push($attachments, url('/').'/attachments/'.$random_number.'-'.$details['attachments'][$i]['filename']);

                //save attachments to folder
                $image = base64_decode($details['attachments'][$i]['base64']);
                $filename= $random_number.'-'.$details['attachments'][$i]['filename'];
                $path = public_path() . "/attachments/" . $filename;
                file_put_contents($path, $image);
            }

            //Separate new array of base64 with comma to save in db
            $arrayAttachments = implode(' , ', $attachments);

            $email->attachment = $arrayAttachments;
        }

        //save new EmailList
        $email->save();

        return $email;
        
    }
}