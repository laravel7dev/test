<?php

namespace App\Helpers\Message;

class DbReceiverFactory implements ReceiverFactory
{
    /**
     * Create form data Mysql receiver
     * @return MysqlReceiver
     */
    public function createReceiver()
    {
        return new MysqlReceiver();
    }
}
