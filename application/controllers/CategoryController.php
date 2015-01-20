<?php

class CategoryController extends Zend_Controller_Action{
    public function _init(){
        
    }


    public function indexAction(){
        
    }
    
    public function addCategoryAction(){
      $this->view->title = 'Новая категория';  
      $this->view->headTitle('Новая категория', 'APPEND'); 
      
      $form = new Form_CategoryForm();
      $this->view->form = $form;
      $categoryObj = new Model_DbTable_Categories();
      $request = $this->getRequest();
      if($request->isPost()){
          if($form->isValid($this->_request->getPost())){
              $title = $form->getValue('title');
              $image = $form->getValue('category_image');
              
              $categoryObj->addCategory($title, $image);
              
              $this->_redirect('/service/add-category');
          }
      }
    }
    
    public function editCategoryAction(){
        
    }
    
    public function removeCategoryAction(){
        
    }
}    