<?php


class Default_Model_SmsModel{


    public function __construct() {

    }

    public function sendSmsAction($phoneNumber, $message){
        $mailObj = new Default_Model_Smtp();

        $headers = 'From: no_reply@icando.by';
        $mailObj->send('asmaliaks@gmail.com', 'Регистрация', $message, $headers);
        return true;
    }
}