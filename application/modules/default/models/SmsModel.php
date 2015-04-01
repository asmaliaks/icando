<?php


class Default_Model_SmsModel{


    public function __construct() {

    }

    public function sendSmsAction($phoneNumber, $message, $email = null){

        $url = 'https://userarea.sms-assistent.by/api/v1/send_sms/plain?user=Aykendu&password=v4K818A8'
                . '&recipient=+'.$phoneNumber.'&message='.$message.'&sender=helpyou.by';

        $result = file_get_contents($url);
        return $result;


    }
}