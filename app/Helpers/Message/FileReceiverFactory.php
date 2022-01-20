<?php

namespace App\Helpers\Message;

class FileReceiverFactory implements ReceiverFactory
{
    /**
     * Create form data txt File receiver
     * @return TxtReceiver
     */
    public function createReceiver()
    {
        return new TxtReceiver();
    }
}
