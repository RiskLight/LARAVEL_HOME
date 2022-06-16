<?php

namespace App\Jobs;

use App\Models\Film;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendFilmInfoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $film;

    private $userInfo;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Film $film, array $userInfo)
    {
        $this->film = $film;
        $this->userInfo = $userInfo;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        Mail::send('emails.film_mail', ['film' =>  $this->film], function ($message) {
            $message->to('admin@gmail.com', 'SuperAdmin')->subject('Новый фильм!');
            $message->from($this->userInfo['email'], 'FROM PALMO-CINEMA');
        });
    }
}
