<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacebookController extends Controller
{
    //


    public function verify(Request $request)

    {
        $data=$request->all();
        $id=$data["entry"][0]["messaging"][0]["sender"]["id"];
        $senderMessage=$data["entry"][0]["messaging"][0]["message"];
        if(!empty($senderMessage))
        {
            $this->sendTextMessage($id, 'hi ');
            $this->sendTextMessage($id, 'hi again');
        }
    }

    private function sendTextMessage($recipientId, $msg)
    {
       
        $messageData = [
            "recipient" => [
                "id" => $recipientId,
            ],
            "message"   => $msg
        ];
        
        $ch = curl_init('https://graph.facebook.com/v3.2/me/messages?access_token=' . env("PAGE_ACCESS_TOKEN"));
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($messageData));
        curl_exec($ch);
        curl_close($ch);
    }


    


}
