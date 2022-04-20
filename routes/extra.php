<?php

use Eduka\MasteringNovaOfficial\Mail\ThankYouForSubscribing;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/email', function () {
    Mail::to('bruno.falcao@live.com')
        ->send(new ThankYouForSubscribing());

    return new ThankYouForSubscribing();
});
