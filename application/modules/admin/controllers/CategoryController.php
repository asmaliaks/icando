<?php

class Admin_CategoryController extends Zend_Controller_Action{
    public function _init(){
        
    }


    public function indexAction(){
        $this->view->title = 'Список категорий';  
        $this->view->headTitle('Список категорий', 'APPEND'); 
        $categoryObj = new Admin_Model_DbTable_Categories();
        $categoryList = $categoryObj->getList();
        $this->view->categoryList = $categoryList;
    }
    
    public function addCategoryAction(){
      $this->view->title = 'Новая категория';  
      $this->view->headTitle('Новая категория', 'APPEND'); 
      
      $form = new Admin_Form_CategoryForm();
      $this->view->form = $form;
      $categoryObj = new Admin_Model_DbTable_Categories();
      $request = $this->getRequest();
      if($request->isPost()){
          if($form->isValid($this->_request->getPost())){
              $title = $form->getValue('title');
              $parentId = $form->getValue('parentId');
              $image = $form->getValue('image');
              $description = $form->getValue('description');
              
              $categoryObj->addCategory($title, $parentId, $image, $description);
              
              $this->_redirect('/admin/category/index');
          }
      }
    }
    
    public function editCategoryAction(){

      // get category id
       $id = $this->getParam('id'); 
// setting page title and head title
      $this->view->title = 'Правка категории';  
      $this->view->headTitle('Правка категории', 'APPEND');
     // calling objects of category form and category model 
      $categoryObj = new Admin_Model_DbTable_Categories();
      $form = new Admin_Form_CategoryForm();
      $this->view->form = $form;
      
      $request = $this->getRequest();
      if($request->isPost()){
          if ($form->isValid($this->_request->getPost())) {
             $title = $form->getValue('title');
             $parentId = $form->getValue('parentId');
             $description = $form->getValue('description');
             $image = $form->getValue('image');
             
             $result = $categoryObj->editCategory($id, $title, $parentId, $image, $description);
             if($result){
                $resultNs = new Zend_Session_Namespace('result');
                $resultNs->setExpirationHops(1);
                $resultNs->success = 'Категория изменена';
                $this->_redirect('/admin/category/edit-category/id/'.$id);
             }else{
                $resultNs = new Zend_Session_Namespace('result');
                $resultNs->setExpirationHops(1);
                $resultNs->fail = 'Ошибка';
                $this->_redirect('/admin/category/edit-category/id/'.$id);
             }
          }else{
             
             $this->view->form = $form; 
          }
      }else{
          $test = 'test';
//          // get category by id
          $category = $categoryObj->getCategoryById($id);
          $form->getElement('title')->setValue($category['title']);
          $form->getElement('parentId')->setValue($category['parent_id']);
          $form->getElement('description')->setValue($category['description']);
          $this->view->category = $category; 
      }
      
    }
    
    public function removeCategoryAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            $id = $request->getParam('id');
            $categoryObj = new Admin_Model_DbTable_Categories();
            $categoryObj->removeCategoty($id);
            echo 'true';
        }
    }
}    