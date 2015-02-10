<?php

class Admin_ApplicationsController extends Zend_Controller_Action{
    public function init(){
        
    }
    
    public function indexAction(){
        // get application list
        $appObj  = new Admin_Model_DbTable_PerformerApplication();
        $appList = $appObj->getAppList();
        
        $this->view->appList = $appList;
    }
    
    public function declineAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            $id = $request->getParam('id');
            $customerId = $request->getParam('customerId');
            $appObj = new Admin_Model_DbTable_PerformerApplication();
            $result = $appObj->removeApp($id);
            // if app removed then send mail
            $smtpObj = new Default_Model_Smtp();
            $usersObj = new Admin_Model_DbTable_Users();
            $user = $usersObj->getUserById($customerId);
            $message = "Администратор отклонил вашу заявку";
            $message = wordwrap($message, 70);
            $headers = 'From: no_reply@icando.by';
            $smtpObj->send($user['email'], 'Заявка отклонена', $message, $headers);
            echo 'true';
        }
    }
    
    public function acceptAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            // getting parameter from the request
            $appId = $request->getParam('appId');
            $customerId = $request->getParam('customerId');
            // calling users model and 
            $usersObj = new Admin_Model_DbTable_Users();
            $appObj = new Admin_Model_DbTable_PerformerApplication();
            // remove user's application
            $appObj->removeApp($appId);
            // change users's status to performer
            $usersObj->changeCustomerToPerformer($customerId);
            // send email to the consumer
            // get uyser by id
            $user = $usersObj->getUserById($customerId);
            $smtpObj = new Default_Model_Smtp();
            $message = "Администратор подтвердил изменение статуса вашей учетной записи на \"Исполнитель\".";
            $message = wordwrap($message, 70);
            $headers = 'From: no_reply@icando.by';
            $smtpObj->send($user['email'], 'Статус изменен', $message, $headers);
            echo 'true';
        }
    }
}

