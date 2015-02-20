<?php
class Performer_UserController extends Zend_Controller_Action{
    
    protected $user;
    
    public function init(){
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
          
       }        
    }
    public function indexAction(){ 
      $this->view->title = 'Личный кабинет';  
      $this->view->headTitle('Личный кабинет', 'APPEND');

      $form = new Performer_Form_RegistrationForm();
      // call users model
      $usersObj = new Performer_Model_DbTable_Users();
      $user = $usersObj->getUserById($this->user->id);
      // get perfofrmer's orders
      $tasksObj = new Customer_Model_DbTable_TasksModel();
      $orders = $tasksObj->getCustomersTasks($this->user->id);
      // get accepted tasks
      $taskObj = new Performer_Model_DbTable_TasksModel();
      $acceptedTasks = $taskObj->getAcceptedTasks($this->user->id);
      
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
        
         
        
        $request = $this->getRequest();
             // user data form   
        if($request->isPost()){
            if($form->isValid($this->_request->getPost())){
                $birthDay = $request->getParam('day_birth')+1;
                $birthMonth = $request->getParam('month_birth');
                $birthYear = $request->getParam('year_birth');
                $birthDate = $birthDay.'.'.$birthMonth.'.'.$birthYear;
                $birthDate = strtotime($birthDate);
                $image = $form->getValue('image');
                
                $data = array(
                    'email' => $form->getValue('email'),
                    'username'  => $form->getValue('username'),
                    'surname' => $form->getValue('surname'),
                    'sex' => $form->getValue('sex'),
                    'phonenumber' => $form->getValue('phonenumber'),
                    'city' => $form->getValue('city'),
                    'birth_date' => $birthDate,
                );
                if($image){
                    $data['image'] = $image;
                }
                $passStr = $form->getValue('pass');
                
                if($passStr != ''){
                   $passHash = base64_encode($passStr);
                   $passHash = $passHash.SALT; 
                   $data['pass'] = $passHash;
                }
                $usersModel = new Performer_Model_DbTable_Users();
                $usersModel->editUser($data, $this->user->id);
                $this->_redirect("/performer/user/");
            }else{
                $this->view->form = $form;
            }
    }else{
        // if request is not post

        $usersModel = new Performer_Model_DbTable_Users();

        
        $birthStr = gmdate("d.m.Y", $user['birth_date']);
        $birthAr = explode(".", $birthStr);
        
        $form->getElement('email')->setValue($user['email']);
        $form->getElement('username')->setValue($user['username']);
        $form->getElement('surname')->setValue($user['surname']);
        $form->getElement('year_birth')->setValue($birthAr[2]);
        $form->getElement('month_birth')->setValue($birthAr[1]);
        $form->getElement('day_birth')->setValue($birthAr[0]);
        $form->getElement('sex')->setValue($user['sex']);
        $form->getElement('image')->setValue($user['image']);
        $form->getElement('phonenumber')->setValue($user['phonenumber']);
        $form->getElement('city')->setValue($user['city']);
        $this->view->form = $form;
    }      
    
        $customersTasks = $tasksObj->getCustomersTasks($this->user->id);    
        $performesTasks = $tasksObj->getPerformersTasks($this->user->id);    
     
        $closedCustomersTasks = $tasksObj->getCustomersTasksClosed($this->user->id);
        $closedPeformersTasks = $tasksObj->getPerformersTasksClosed($this->user->id);
        $feedbackObj = new Performer_Model_DbTable_FeedbackModel();
        
        if($closedCustomersTasks){
                $customersRating = $feedbackObj->countCUstomersRating($this->user->id);
                $this->view->customersRating = floor($customersRating);
         }
         if($closedPeformersTasks){
             $performersRating = $feedbackObj->countPerformersRating($this->user->id);
             
             $this->view->performersRating = floor($performersRating);
         }
    

      $this->view->customersTasks = $customersTasks;   
      $this->view->performersTasks = $performesTasks;   
      $this->view->orders = $orders;
      $this->view->acceptedTasks = $acceptedTasks;
      $this->view->categories = $categories;
      $this->view->form = $form;
      $this->view->user = $user;
     
    }
}
