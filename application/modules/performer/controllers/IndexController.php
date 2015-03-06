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

        //  get list of the tasks which fit to the performer
        $request = $this->getRequest();
        $sortOption = $request->getParam('sort_option');
        $category = $request->getParam('category');
        if(!$category){
            $category = 0;
        }
        if($sortOption){
            switch($sortOption){
                case 'created_at_DESC':
                    $sortOption = 'created_at DESC';
                    break;
                case 'created_at_ASC':
                    $sortOption = 'created_at ASC';
                    break;
                case 'customers_price_ASC':
                    $sortOption = 'customers_price ASC';
                    break;
                case 'customers_price_DESC':
                    $sortOption = 'customers_price DESC';
                    break;
                default:
                    $sortOption = 'created_at DESC';
                    break;
            }
        }else{
            $sortOption = 'created_at ASC';
        }
        /// get all comments for the task
        $tasksObj = new Default_Model_TaskList();
        $tasksList = $tasksObj->listTask($sortOption, $category);
            //   pagination    
        $tasks = new Zend_Paginator(new Zend_Paginator_Adapter_DbSelect($tasksList));
        $tasks->setItemCountPerPage(12)
                ->setCurrentPageNumber($this->getParam('page', 1));
        
        // get categories for the filter
              // get category list
      $categoryObj = new Performer_Model_DbTable_Categories();
      $mainCategories = $categoryObj->getCategoryList();
        // get sub categories
        $n=0;
        foreach($mainCategories as $mainCat){
            $subCats = $categoryObj->getSubCats($mainCat['id'], $this->user->id);
            $categories[$n] = array(
                'title' => $mainCat['title'],
                'id'    => $mainCat['id'],
            );
            if($subCats){
               foreach($subCats as $subCat){
                   $categories[$n]['children'][] = array(
                       'id' => $subCat['id'],
                       'title' => $subCat['title'],
                       'parent_id' => $subCat['parent_id'],
                       'user_id' => $subCat['user_id'],
                       );
                       
                    
               }
        }
            $n++;
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

        $this->view->currentCategory = $category;
        $this->view->sortOption = $sortOption;
        $this->view->categories = $categories;
        $this->view->tasks = $tasks;   

    }
}

