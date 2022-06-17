<?php

namespace App\Observers;

use App\Models\Film;
use Illuminate\Support\Facades\Mail;

class FilmObserver
{
    /**
     * Handle the Film "created" event.
     *
     * @param Film $film
     * @return void
     */
    public function created(Film $film)
    {
        $userInfo = [
            'email' => auth()->user()->email,
            'name' => auth()->user()->name
        ];

        Mail::send('emails.film_mail', ['film' => $film], function ($message) use ($userInfo) {
            $message->to('admin@gmail.com', 'SuperAdmin')->subject('Новый фильм!');
            $message->from($userInfo['email'], $userInfo['name']);
        });
    }

    /**
     * Handle the Film "updated" event.
     *
     * @param Film $film
     * @return void
     */
    public function updated(Film $film)
    {
        //
    }

    /**
     * Handle the Film "deleted" event.
     *
     * @param Film $film
     * @return void
     */
    public function deleted(Film $film)
    {
        //
    }

    /**
     * Handle the Film "restored" event.
     *
     * @param Film $film
     * @return void
     */
    public function restored(Film $film)
    {
        //
    }

    /**
     * Handle the Film "force deleted" event.
     *
     * @param Film $film
     * @return void
     */
    public function forceDeleted(Film $film)
    {
        //
    }
}
