<?php

class Performer_IndexController extends Zend_Controller_Action {
    
    protected $user;
    public function init(){
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
          
       } 
    }
    
    public function indexAction(){
       $role = $this->user->role;
        switch ($role) {
            case 'admin':
                $this->_redirect('admin');
                break;
            case 'customer': 
                $this->_redirect('customer/office');
                break;
            case 'performer':
                $this->_redirect('performer/user');
                break;
        }
        
    }
    
    public function tasksAction(){
         // get users categories 
        $usersCatObj = new Performer_Model_DbTable_UserCategory();
        $usersCats = $usersCatObj->getUsersCategories($this->user->id);
        //  get list of the tasks which fit to the performer
        if(!empty($usersCats)){
            $taskObj = new Performer_Model_DbTable_TasksModel();
            $performersTasks =  $taskObj->getTasksForPerformer($this->user->id, $usersCats);
        }
        // count all user's reservs
        $balanceResObj = new Default_Model_DbTable_BalanceReserve();
        $amountOfReserves = $balanceResObj->countUsersReserves($this->user->id);
        //count how mauch free point
        $usersObj = new Performer_Model_DbTable_Users();
        $user = $usersObj->getUserById($this->user->id);
        $freePoints = $user['balance'] - $amountOfReserves;
        if($freePoints < 0){
            $this->view->freePoints = 0;
        }else{
            $this->view->freePoints = $freePoints;
        }
        // put tasks to the view
        if(!empty($usersCats)){
            $this->view->tasks = $performersTasks;   
        }
    }
}

