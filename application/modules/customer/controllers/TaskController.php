<?php

class Customer_TaskController extends Zend_Controller_Action{
    
    protected $user;
    public function init(){
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
          
       } 
    }
    
    public function newTaskAction(){
        // get categories
        $categoryObj = new Customer_Model_DbTable_Categories();
        $mainCategories = $categoryObj->getCategoryList();
        // get sub categories
        $n=0;
        foreach($mainCategories as $mainCat){
            $subCats = $categoryObj->getSubCats($mainCat['id']);
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
                   ); 
               }
        }
            $n++;
        }
        // sending data to the view
        $this->view->categories = $categories;
    }
    
    public function addTaskAction(){
        $request = $this->getRequest();
        $form = new Customer_Form_TaskForm();
        if($request->isPost()){
            $params = $request->getParams();
            if($params['title']){
                if($form->isValid($this->_request->getPost())){
                $finalDateUnix = strtotime($form->getValue('final_date'));
                $data = array(
                    'customer_id' => $this->user->id,
                    'customers_price' => $form->getValue('customers_price'),
                    'category_id' => $form->getValue('category_id'),
                    'title' => $form->getValue('title'),
                    'description' => $form->getValue('description'),
                    'final_date' => $finalDateUnix,
                    'customers_price' => $form->getValue('customers_price'),
                    'task_image' => $form->getValue('task_image'),
                    'created_at' => time(),
                );

            $tasksObj = new Customer_Model_DbTable_TasksModel();
            $id = $tasksObj->addTask($data);
            $this->_redirect('/customer/office/index');
                }else{
                    $catNms = new Zend_Session_Namespace('category');
                    
                    $this->view->catId = $catNms->catId;
                    $this->view->form = $form;
                }
            }else{
                $category = $request->getParam('category');
                $catNms = new Zend_Session_Namespace('category');
                $catNms->catId = $category;
                $catNms->setExpirationHops(1);
                // caling form 
                $form = new Customer_Form_TaskForm();

                $this->view->form = $form;
            }
        }
    }
    

    
    public function customersTasksAction(){
        
    }
    
    public function customersTaskViewAction(){
        echo 'customers task view'; 
    }
    
    public function removeTaskAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            $id = $request->getParam('id');
            $tasksObj = new Customer_Model_DbTable_TasksModel();
            $result = $tasksObj->removeTask($id);
            if($result){
                echo "true";
            }
        }
    }
}

