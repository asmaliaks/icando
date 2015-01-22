<?php

class Customer_FeedbackController extends Zend_Controller_Action{
    
    public function _init(){
        
    }
    public function indexAction(){

    }
    public function feedbackListAction(){
      $this->view->title = 'Отзывы';  
      $this->view->headTitle('Отзывы', 'APPEND');   
      $feedbackObj = new Customer_Model_ListFeedback();
      $feedbackList = $feedbackObj->listFeedback();
      
      $paginator = new Zend_Paginator(new Zend_Paginator_Adapter_DbSelect($feedbackList));
      $paginator->setItemCountPerPage(5)
                ->setCurrentPageNumber($this->getParam('page', 1));
      
      $this->view->paginator = $paginator;
//      $feedbackObj = new Model_DbTable_Feedback();
//      $this->view->feedback = $feedbackObj->getAllFeedback();
    }
    public function newFeedbackAction(){
      $this->view->title = 'Оставить отзыв';  
      $this->view->headTitle('Оставить отзыв', 'APPEND');
      $this->view->headScript()->appendFile('/public/js/fck/ckeditor.js');
      $this->view->headScript()->appendFile('/public/js/fck/config.js');
      $this->view->headScript()->appendFile('/public/js/fck/adapters/jquery.js');      
      $form = new Form_FeedbackForm();
      
      $feedbackObj = new Model_DbTable_Feedback();
      
      $this->view->form = $form;
       
     $date = new Zend_Date();


      $request = $this->getRequest();
      if($request->isPost()){
          if($form->isValid($this->_request->getPost())){
              $name = $form->getValue('name');
              $feedback = $form->getValue('feedback');
              $currentDate = $date->get(Zend_Date::DATE_MEDIUM);
              $feedbackObj->addFeedback($name, $feedback, $currentDate);
              $this->_redirect('/feedback/feedback-list');
              
              
              
          }
      }

        
    }
    public function removeFeedbackAction()
    {
        $feedbackObj = new Model_DbTable_Feedback();
        $feedbackId = $_GET['id'];
        $feedbackObj->removeFeedback($feedbackId);
        $this->_redirect('/feedback/feedback-list');
    }
}
