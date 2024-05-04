<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function __construct()
    {
        $this->authorizeResource(Event::class, 'event');
    }
}
