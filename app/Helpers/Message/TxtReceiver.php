<?php

namespace App\Helpers\Message;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TxtReceiver implements Receiver
{
    /**
     * Save form data in txt file
     */
    function save(Request $request) {
        // save data to storage/app/file.txt file
        $data = implode("|", $request->all());
        Storage::disk('local')->append('file.txt', $data);
    }
}
