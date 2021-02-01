<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Jobs\SendEmailJob;
use Illuminate\Support\Facades\Queue;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class JobTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example(){
        
        Queue::fake();

        //code that dispatches the job

        $details=[
            "emails"=>['test@gmail.com'],
            "subject"=>'Subject',
            "body"=>'Body'
        ];
        
        SendEmailJob::dispatch($details)->delay(now()->addSeconds(5));

        // Assert that Job was pushed with a delay
        Queue::assertPushed(SendEmailJob::class, function ($job) {
            return ! is_null($job->delay);
        });

    }
}
