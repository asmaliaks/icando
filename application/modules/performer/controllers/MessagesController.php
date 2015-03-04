<?php 

class Performer_MessagesController extends Zend_Controller_Action{
    protected $user;
    public function init(){
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
          
       } 
    }
    
    public function indexAction(){
        
    }
    
    public function sendMessageAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            $data = array(
                'task_id'=> $request->getParam('taskId'),
                'user_to'=> $request->getParam('addressee'),
                'user_from'=>$request->getParam('senderId'),
                'text'=>$request->getParam('message'),
                'created'=> time(),
            );
            $messagesObj = new Default_Model_DbTable_Messages();
            $messagesObj->addOne($data);
            // mozhna po4tu zariadzic
            echo 'true';exit;
        }
    }
    
    public function markReadAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            $taskId = $request->getParam('taskId');
            $messagesObj = new Default_Model_DbTable_Messages();
            $messagesObj->markMessagesRead($taskId, $this->user->id);
            echo 'true';exit;
        }
    }
    
    public function getUnreadMessagesAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            $taskId = $request->getParam('taskId');
            $messagesObj = new Default_Model_DbTable_Messages();
            $unreadMessages = $messagesObj->getUnreadMessages($taskId, $this->user->id);
            if(!$unreadMessages){
                print_r('empty');exit;
            }else{
                $messagesAmount = count($unreadMessages);
                $n=0;
                foreach($unreadMessages as $message){
                    if($n==0){
                        $messages = '<div class="list-group list-group-item" style="text-align:'
                                . ' -webkit-right;"><img src="/images/users_images/'.$message['uf_image'] .'" height="60" ></br>'
                                . '<h4 class="list-group-item-heading">'
                                . $message['uf_username']." ".$message['uf_surname'].'</h4>'
                                . '<small>'. date("h:i d.m.Y",$message['created']).'</small>'
                                . '<p class="list-group-item-text">'. $message['text'].'</p></div>';
                    }else{
                        $messages = $messages.'<div class="list-group list-group-item" style="text-align:'
                                . ' -webkit-right;"><img src="/images/users_images/'.$message['uf_image'] .'" height="60" ></br>'
                                . '<h4 class="list-group-item-heading">'
                                . $message['uf_username']." ".$message['uf_surname'].'</h4>'
                                . '<small>'. date("h:i d.m.Y",$message['created']).'</small>'
                                . '<p class="list-group-item-text">'. $message['text'].'</p></div>';
                    }
                    $n++;
                }
                $data = array('amount'=> $messagesAmount,
                    'messages'=> $messages);
                $dataJson = json_encode($data);
                print_r($dataJson);exit;
            }
        }
    }    
}
