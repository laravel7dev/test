<?php

namespace App\Helpers\Message;

class MailReceiverFactory implements ReceiverFactory
{
    /**
     * Create form data receiver by gmail smtp
     * @return GmailReceiver
     */
    public function createReceiver()
    {
        return new GmailReceiver();
    }
}
