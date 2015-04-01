<?php

class ServiceController extends Zend_Controller_Action{
    public function _init(){
        
    }
    public function indexAction(){
        echo 'servise inx';
    }
    public function listOfServicesAction(){
      $this->view->title = 'Услуги';  
      $this->view->headTitle('Услуги', 'APPEND');
      $servicesObj = new Model_ListServices();
      $serviceList = $servicesObj->listServices();
  //   pagination    
      $paginator = new Zend_Paginator(new Zend_Paginator_Adapter_DbSelect($serviceList));
      $paginator->setItemCountPerPage(6)
                ->setCurrentPageNumber($this->getParam('page', 1));
      
      $this->view->paginator = $paginator;
//      $serviceObj = new Model_DbTable_Service();
//
//      $this->view->services = $serviceObj->fetchAll();
     

    }
    public function serviceListByCategoryAction(){
      $categoryId = $_GET['id']; 
    
      $servicesObj = new Model_ListServices();
      $serviceList = $servicesObj->getServiceByCategory($categoryId);
      $paginator = new Zend_Paginator(new Zend_Paginator_Adapter_DbSelect($serviceList));
      $paginator->setItemCountPerPage(9)
                ->setCurrentPageNumber($this->getParam('page', 1));
      
      $this->view->paginator = $paginator;

    }
    
    public function editServiceAction(){
      $this->view->title = 'Редактировать';  
      $this->view->headTitle('Редактировать', 'APPEND');
      $this->view->headScript()->appendFile('/public/js/fck/ckeditor.js');
      $this->view->headScript()->appendFile('/public/js/fck/config.js');
      $this->view->headScript()->appendFile('/public/js/fck/adapters/jquery.js');
      $form = new Form_ServiceForm();
      $this->view->form = $form;
      $serviceObj = new Model_DbTable_Service();
      $serviceId = $_GET['id'];
      
      $request = $this->getRequest();
      if ($request->isPost()) {
        if ($form->isValid($this->_request->getPost())) {
  
            
            $title = $form->getValue('title');
            //$price = $form->getValue('price');
            $imageIcon = $form->getValue('image_icon');
            $image = $form->getValue('image');
            $category = $form->getValue('category');
            $desc = $form->getValue('description');
            $serviceObj->editService($title, $imageIcon, $image, $category, $desc, $serviceId);
            $this->_redirect('/service/service-list-by-category/page/2?id='.$category);
        }
      }else{
         $service = $serviceObj->getServiceById($serviceId);
         $form->getElement('title')->setValue($service['title']);
       //  $form->getElement('price')->setValue($service['price']);
         $form->getElement('image_icon')->setValue($service['image_icon']);
         $form->getElement('image')->setValue($service['image']);
         $form->getElement('category')->setValue($service['category_id']);
         $form->getElement('description')->setValue(html_entity_decode($service['description']));
      }  
    }
    public function addServiceAction(){
      $this->view->title = 'Добавление';  
      $this->view->headTitle('Добавление', 'APPEND');
      $this->view->headScript()->appendFile('/public/js/fck/ckeditor.js');
      $this->view->headScript()->appendFile('/public/js/fck/config.js');
      $this->view->headScript()->appendFile('/public/js/fck/adapters/jquery.js');
      
      
            
      $categoryObj = new Model_DbTable_Categories();
      $cat =  $categoryObj->fetchAll();
      $cat = $cat->toArray();
      $this->view->cat = $cat;
     // print_r($this->view->cat);exit;

      
      $form = new Form_ServiceForm();
      $this->view->form = $form;
      $serviceObj = new Model_DbTable_Service();
      $request = $this->getRequest();
      if ($request->isPost()) {
        if ($form->isValid($this->_request->getPost())) {
            $title = $form->getValue('title');
            //$price = $form->getValue('price');
            $imageIcon = $form->getValue('image_icon');
            $image = $form->getValue('image');
            $category = $form->getValue('category');
            $desc = $form->getValue('description');
            $serviceObj->addService($title, $imageIcon, $image, $category, html_entity_decode($desc));
            $this->_redirect('/service/add-service');
        }
      }   
    }
    public function descriptionAction(){

      $serviceId = $_GET['id'];

      
      $serviceObj = new Model_DbTable_Service();
      $service = $serviceObj->getServiceById($serviceId);
      $serviceCategory = $serviceObj->getCategoryByServiceId($serviceId);
      
      $this->view->serviceCategory = $serviceCategory;
      $this->view->service = $service;
      $this->view->title = $service['title'];  
      $this->view->headTitle($service['title'], 'APPEND');
      
    }
    public function removeServiceAction(){
      $this->view->title = 'Удаление услуги';  
      $this->view->headTitle('Удаление услуги', 'APPEND');
      $serviceId = $_GET['id'];
      $serviceObj = new Model_DbTable_Service();
      $serviceObj->removeService($serviceId);
      $this->_redirect('/service/list-of-services/');
    }
    
    public function categoryListAction(){
      $this->view->title = 'Категории';  
      $this->view->headTitle('Категории', 'APPEND');
        //   pagination 
      $categoryObj = new Model_ListCategories();
      $categoryList = $categoryObj->listCategories();
      
   
      $paginator = new Zend_Paginator(new Zend_Paginator_Adapter_DbSelect($categoryList));
      $paginator->setItemCountPerPage(6)
                ->setCurrentPageNumber($this->getParam('page', 1));
      
      $this->view->paginator = $paginator; 
      

    }

    public function editCategoryAction(){
      $this->view->title = 'Редактировать категорию';  
      $this->view->headTitle('Редактировать категорию', 'APPEND');  
      
      

      $categoryObj = new Model_DbTable_Categories();
      $categoryId = $_GET['id'];
      
      $form = new Form_CategoryForm();
      $this->view->form = $form;
      $request = $this->getRequest();
      if($request->isPost()){
          if($form->isValid($this->_request->getPost())){
              $category = $categoryObj->getCategoryById($categoryId);
              $title = $form->getValue('title');
              $image = $form->getValue('category_image');
              
              $categoryObj->editCategory($category['id'], $title, $image);
              
              $this->_redirect('/service/category-list');              
          }
      }else{
          $category = $categoryObj->getCategoryById($categoryId);
          $form->getElement('title')->setValue($category['title']);
          $form->getElement('category_image')->setValue($category['category_image']);
          
      }
    }
    public function removeCategoryAction(){
      $categoryObj = new Model_DbTable_Categories();
      $categoryId = $_GET['id'];   
      $categoryObj->removeCategoty($categoryId);
      $this->_redirect('/service/category-list');
    }
    
    private function getServiceId($service){
        $serviceObj = new Model_DbTable_Service();
        $servisce = $serviceObj->getServiceById($service);
        return $service['id'];
    }
    
}
