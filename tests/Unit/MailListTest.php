<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\TestResponse;
use Tests\TestCase;
use App\Models\EmailList;

class MailListTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testResponseStructure()
    {
        //run code to create fake email list
        EmailList::factory()->count(1)->create();

        $response = $this->getJson('/api/list');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'emails',
                    'body',
                    'subject',
                    'attachments'
                ],
            ],
          
        ]);
    }
}
