<?php

namespace App\Helpers\Message;

use Illuminate\Http\Request;
use App\Models\Message;

class MysqlReceiver implements Receiver
{
    /**
     * Save form data in mysql db
     */
    function save(Request $request) {
        Message::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Message was sent.'
        ]);
    }
}
