<?php

namespace App\Helpers\Message;

use Illuminate\Http\Request;
/**
 * Receiver interface
 */
interface Receiver
{
    function save(Request $request);
}
