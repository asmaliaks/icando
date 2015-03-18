<?php
class Admin_SettingsController extends Zend_Controller_Action{
    public function init(){
        
    }


    public function editAboutAction(){
        // caal about model
        $aboutObj = new Admin_Model_DbTable_AboutModel();
        $request = $this->getRequest();
        if($request->isPost()){
            $data = array(
                'content' => $request->getParam('content'),
                'js_map'  => $request->getParam('js_map'),
            );
            if($data['js_map'] == ''){
                $data['js_map'] = NULL;
            }
            $aboutObj->editAbout($data);
            $message = new Zend_Session_Namespace('message');
            $message->success = 'Информация изменена';
            $message->setExpirationHops(1);
            $this->_redirect('admin/settings/edit-about');
        }else{
            $about = $aboutObj->getAbout();
            $message = new Zend_Session_Namespace('message');
            if($message->success){
                $this->view->successMes = $message->success;
            }
            $this->view->about = $about;
        }
    }
    
    public function editContactsAction(){
        // caal contacts model
        $contactsObj = new Admin_Model_DbTable_ContactsModel();
        $request = $this->getRequest();
        if($request->isPost()){
            $data = array(
                'content' => $request->getParam('content'),
                'js_map'  => $request->getParam('js_map'),
            );
            if($data['js_map'] == ''){
                $data['js_map'] = NULL;
            }
            $contactsObj->editContacts($data);
            $message = new Zend_Session_Namespace('message');
            $message->success = 'Информация изменена';
            $message->setExpirationHops(1);
            $this->_redirect('admin/settings/edit-contacts');
        }else{
            $contacts = $contactsObj->getContacts();
            $message = new Zend_Session_Namespace('message');
            if($message->success){
                $this->view->successMes = $message->success;
            }
            $this->view->contacts = $contacts;  
    }
}
}