<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Message\FileReceiverFactory;
use App\Helpers\Message\DbReceiverFactory;

class MessageController extends Controller
{
    /**
     * Save form data
     * @param Request $request
     * @return Null
     */
    public function send(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'phone' => 'regex:/\+?\(([0-9]{3})\)([0-9]{3})-([0-9]{2})-([0-9]{2})/',
                'message' => 'max:250'
            ]
        );

        if($validator->fails()) {
            return $validator->messages();
        }

        // save message to file
        $fileFactory = $this->createReceiver('file');
        $file = $fileFactory->createReceiver();
        $file->save($request);

        // save message to db
        $dbFactory = $this->createReceiver('db');
        $db = $dbFactory->createReceiver();
        $db->save($request);
    }

    /**
     * Create factory
     * @param String $type
     * @return ReceiverFactory
     */
    private function createReceiver(String $type) {
        if($type == 'file')
            return new FileReceiverFactory();
        if($type == 'db')
            return new DbReceiverFactory();
    }
}
