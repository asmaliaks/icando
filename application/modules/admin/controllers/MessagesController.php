<?php
class Admin_MessagesController extends Zend_Controller_Action{
    
    public function init(){
        
    }

    public function indexAction(){
      $this->view->title = 'Сообщения пользователей';  
      $this->view->headTitle('Сообщения пользователей', 'APPEND');
      $messagesObj = new Default_Model_DbTable_Messages();
      $messages = $messagesObj->getMessages();
      ///mark all messages as viewd by admin
      $messagesObj->markMessagesReadByAdmin();
      
      $this->view->messages = $messages;
    }
    
    public function removeAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            print_r('true');exit;
        }
    }
    
    public function getUnreadMessagesForAdminAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            $messagesObj = new Default_Model_DbTable_Messages();
            $messages = $messagesObj->getNewMessagesForAdmin();
            if($messages){
                $n=0;
                foreach($messages as $message){

                    if($n==0){
                        if($message['u_role'] == 'customer'){
                            $messagesString = '<div class="col-sm-12" id="messageDiv'. $message['id'].'">'
                                    . '<div class="col-sm-2">'
                                    . '<a href="/admin/customers/view/id/'.$message['u_id'].'">'. $message['u_username'].' '.$message['u_surname'].'</a>'
                                    . '</div> <div class="col-sm-1">'
                                    . '<small>'. date('h:i d.m.y', $message['created']).'</small>'
                                    . '</div>'
                                    . '<div class="col-sm-8">'. $message['text'] .' </div>'
                                    . '<div class="col-sm-1">'
                                    . '<button id="remBut'. $message['id'] .'" onclick="removeMessage('. $message['id'] .')">Удалить</button>'
                                    . '<img id="prel'. $message['id'] .'" src="/images/blue_preloader.gif" width="60" style="display:none">'
                                    . '</div>'
                                    . '<div class="col-sm-12">'
                                    . '<hr>'
                                    . '</div>'
                                    . '</div>';

                        }else if($message['u_role'] == 'performer'){
                            $messagesString = '<div class="col-sm-12" id="messageDiv'. $message['id'].'">'
                                    . '<div class="col-sm-2">'
                                    . '<a href="/admin/performer/view/id/'.$message['u_id'].'">'. $message['u_username'].' '.$message['u_surname'].'</a>'
                                    . '</div> <div class="col-sm-1">'
                                    . '<small>'. date('h:i d.m.y', $message['created']).'</small>'
                                    . '</div>'
                                    . '<div class="col-sm-8">'. $message['text'] .' </div>'
                                    . '<div class="col-sm-1">'
                                    . '<button id="remBut'. $message['id'] .'" onclick="removeMessage('. $message['id'] .')">Удалить</button>'
                                    . '<img id="prel'. $message['id'] .'" src="/images/blue_preloader.gif" width="60" style="display:none">'
                                    . '</div><div class="col-sm-12">'
                                    . '<hr>'
                                    . '</div>'
                                    . '</div>';
                        }
                    }else{
                        if($message['u_role'] == 'customer'){
                            $messagesString = $messagesString.'<div class="col-sm-12" id="messageDiv'. $message['id'].'">'
                                    . '<div class="col-sm-2">'
                                    . '<a href="/admin/customers/view/id/'.$message['u_id'].'">'. $message['u_username'].' '.$message['u_surname'].'</a>'
                                    . '</div> <div class="col-sm-1">'
                                    . '<small>'. date('h:i d.m.y', $message['created']).'</small>'
                                    . '</div>'
                                    . '<div class="col-sm-8">'. $message['text'] .' </div>'
                                    . '<div class="col-sm-1">'
                                    . '<button id="remBut'. $message['id'] .'" onclick="removeMessage('. $message['id'] .')">Удалить</button>'
                                    . '<img id="prel'. $message['id'] .'" src="/images/blue_preloader.gif" width="60" style="display:none">'
                                    . '</div><div class="col-sm-12">'
                                    . '<hr>'
                                    . '</div>'
                                    . '</div>';
                        }else if($message['u_role'] == 'performer'){
                            $messagesString = $messagesString.'<div class="col-sm-12" id="messageDiv'. $message['id'].'">'
                                    . '<div class="col-sm-2">'
                                    . '<a href="/admin/performer/view/id/'.$message['u_id'].'">'. $message['u_username'].' '.$message['u_surname'].'</a>'
                                    . '</div> <div class="col-sm-1">'
                                    . '<small>'. date('h:i d.m.y', $message['created']).'</small>'
                                    . '</div>'
                                    . '<div class="col-sm-8">'. $message['text'] .' </div>'
                                    . '<div class="col-sm-1">'
                                    . '<button id="remBut'. $message['id'] .'" onclick="removeMessage('. $message['id'] .')">Удалить</button>'
                                    . '<img id="prel'. $message['id'] .'" src="/images/blue_preloader.gif" width="60" style="display:none">'
                                    . '</div><div class="col-sm-12">'
                                    . '<hr>'
                                    . '</div>'
                                    . '</div>';
                        }
                    }
                    $n++;
                }
                $data = array('messages'=> $messagesString);
                $dataJson = json_encode($data);
                print_r($dataJson);exit;
            }else{
                print_r('empty');exit;
            }
        }
        
    }
    
    public function markAdminReadAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            $messagesObj = new Default_Model_DbTable_Messages();
            $messagesObj->markMessagesReadByAdmin();
            print_r('true');exit;
        }
    }
}