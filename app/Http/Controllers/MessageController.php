<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
    function create(Request $request) {
        $message = Message::create($request->all());

        return $message;
    }
}
