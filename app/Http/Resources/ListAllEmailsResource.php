<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ListAllEmailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            "id" => $this->id,
            "emails" => $this->email,
            "subject" => $this->subject,
            "body" => $this->body,
            "attachments" => $this->attachment,
            "created_at" => $this->created_at->diffForHumans()

        ];
    }
}
