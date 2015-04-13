<?php

class Customer_IndexController extends Zend_Controller_Action
{
    protected $user;
    public function init(){
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
          
       }   
    }
    
    public function indexAction(){
      $this->view->title = 'Главная';  
//print_r($_SESSION['Zend_Auth']['storage']);exit;
        // get tasks for the list
        $tasksObj = new Default_Model_DbTable_TasksModel();
        $lastTasks = $tasksObj->getLastTasks();
        // get main categories  
        $categoryObj = new Default_Model_DbTable_Categories();
        $mainCats = $categoryObj->getMainCats();

        // get slides for main banner
        $mainBannerObj = new Admin_Model_DbTable_MainBanner();
        $slides = $mainBannerObj->getSliderList();

        $this->view->slides = $slides;
        $this->view->mainCats = $mainCats;
        $this->view->lastTasks = $lastTasks;
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
            $sortOption = 'created_at DESC';
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

        // put tasks to the view

        $this->view->currentCategory = $category;
        $this->view->sortOption = $sortOption;
        $this->view->categories = $categories;
        $this->view->tasks = $tasks;  
    }
    
    public function taskViewAction(){
      // get task id from url
        $request = $this->getRequest();
        $taskId = $request->getParam('id');
        
        // call task model
        $taskObj = new Performer_Model_DbTable_TasksModel();
        $task = $taskObj->getTaskById($taskId);
        // get task's feedback from the performer
        $feedbackObj = new Performer_Model_DbTable_FeedbackModel();
        $feedback = $feedbackObj->getTasksFeedbackByCustomer($taskId, $task['performer_id']);
        $tasksFeedback = $feedbackObj->getTasksFeedbackByCustomer($taskId, $task['customer_id']);

        /// get all comments for the task
        $commentsObj = new Default_Model_Comments();
        $commentsList = $commentsObj->getCommentsByTaskId($taskId);
            //   pagination    
        $comments = new Zend_Paginator(new Zend_Paginator_Adapter_DbSelect($commentsList));
        $comments->setItemCountPerPage(10)
                ->setCurrentPageNumber($this->getParam('page', 1));
        
  
        if($tasksFeedback){
            $this->view->tasksFeedback = $tasksFeedback;
        }
        if($feedback){
            $this->view->feedback = $feedback;
        }
        $messagesObj = new Default_Model_DbTable_Messages();
        $taskMessages = $messagesObj->getTasksMessages($taskId);
        if($taskMessages){
            $this->view->taskMessages = $taskMessages;
        }




        $this->view->comments = $comments;
        $this->view->currentUser = $this->user;
        $this->view->task = $task;  
    }
    
}    