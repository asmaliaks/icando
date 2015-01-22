<?php

class IndexController extends Zend_Controller_Action
{
protected $user;
    public function init(){
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
          
       }
    }

    public function indexAction()
    {
        $role = $this->user->role;
        switch ($role) {
            case 'admin':
                $this->_redirect('admin');
                break;
            case 'customer': 
                $this->_redirect('customer');
                break;
            case 'performer':
                $this->_redirect('performer');
                break;
        }
//       $layout = Zend_Layout::getMvcInstance();
//       $layout->action = $this->getRequest()->getActionName();
//               $this->getRequest()->getActionName();
//      $this->view->title = 'Главная';  
//      $this->view->headTitle('Главная', 'APPEND');
////print_r(APPLICATION_PATH);exit;
//      $contentObj = new Default_Model_DbTable_Content();
//      $pageCategory = 'main';
//      $content = $contentObj->getContentById($pageCategory);
//      
//      $this->view->content = $content['content'];
//      
//      $this->view->headScript()->appendFile('/public/js/fck/ckeditor.js');
//      $this->view->headScript()->appendFile('/public/js/fck/config.js');
//      $this->view->headScript()->appendFile('/public/js/fck/adapters/jquery.js');
//      
//if(Zend_Auth::getInstance()->hasIdentity()){
//    $form = new Form_MainPageForm();
//    $this->view->form = $form;
//    // raboya z formaj
//    $request = $this->getRequest();
//    
//    if ($request->isPost()) {
//        if ($form->isValid($this->_request->getPost())) {
//            $text = $form->getValue('text_field');
//            $pageCategory = $form->getValue('page_category');
//            
//            $contentObj->saveMainPage(html_entity_decode($text), $pageCategory);
//            
//            $this->_redirect('/index/index/');
//            
//        }
//    }else{
//        
//        $contentRow = $contentObj->getContentById($pageCategory);
//        $form->getElement('text_field')->setValue($contentRow['content']);
//    }


    }
    public function hujAction(){
    $this->_helper->layout->disableLayout();
}
    public function contactsAction(){
      $this->view->title = 'Контакты';  
      $this->view->headTitle('Контакты', 'APPEND');
      $this->view->headScript()->appendFile('/public/js/fck/ckeditor.js');
      $this->view->headScript()->appendFile('/public/js/fck/config.js');
      $this->view->headScript()->appendFile('/public/js/fck/adapters/jquery.js');     
      
      $contactsObj = new Model_DbTable_Contacts();
      if(Zend_Auth::getInstance()->hasIdentity()){    
            $form = new Form_ContactsForm();
            $this->view->form = $form;
            
            $request = $this->getRequest();
            if($request->isPost()){
                if($form->isValid($this->_request->getPost())){
                    $address = $form->getValue('address');
                    $homePhone = $form->getValue('home_phone');
                    $phoneNumberMts = $form->getValue('phone_mts');
                    $phoneNumberVelc = $form->getValue('phone_velc');
                    $skype = $form->getValue('skype');
                    $email = $form->getValue('email');
                    $workingTime = $form->getValue('working_time');
                    $additionalInfo = $form->getValue('additional_info');
                    
                    $contactsObj->editContactsData($address, $homePhone, $phoneNumberMts, $phoneNumberVelc, $skype, $email, $workingTime, $additionalInfo);
                    $this->_redirect('/index/contacts/');
                }
            }else{
                $contacts = $contactsObj->fetchRow();
                $form->getelement('address')->setValue($contacts['address']);
                $form->getelement('home_phone')->setValue($contacts['home_phone']);
                $form->getelement('phone_mts')->setValue($contacts['phone_mts']);
                $form->getelement('phone_velc')->setValue($contacts['phone_velc']);
                $form->getelement('skype')->setValue($contacts['skype']);
                $form->getelement('email')->setValue($contacts['email']);
                $form->getelement('working_time')->setValue(html_entity_decode($contacts['working_time']));
                $form->getelement('additional_info')->setValue(html_entity_decode($contacts['additional_info']));
            }
      }else{
   
    $this->view->contacts = $contactsObj->fetchRow();
      }
    }



}

