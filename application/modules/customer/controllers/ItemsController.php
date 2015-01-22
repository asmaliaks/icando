<?php

class ItemsController extends Zend_Controller_Action
{
    public function init(){
        
    }
    public function indexAction(){
       echo 'huj';
    }
    public function galleryItemsAction(){
      $this->view->title = 'Галерея';  
      $this->view->headTitle('Галерея', 'APPEND');

      $galleryObj = new Model_ListGalleryItems();
      $gallery = $galleryObj->listGalleryItems();
     
     // $this->view->gallery = $gallery;
      
            //pagination
      
      $paginator = new Zend_Paginator(new Zend_Paginator_Adapter_DbSelect($gallery));
      $paginator->setItemCountPerPage(9)
                ->setCurrentPageNumber($this->getParam('page', 1));
      
      $this->view->paginator = $paginator;
   //------------------------- 
   
    }
    
    public function addGalleryItemAction(){
      $this->view->title = 'Добавление';  
      $this->view->headTitle('Добавление', 'APPEND');       
        
      $form = new Form_GalleryForm();
      $this->view->form = $form;
      $galleryObj = new Model_DbTable_Gallery();
      
  
      $request = $this->getRequest();
      if($request->isPost()){
           if($form->isValid($this->_request->getPost())){
               $title = $form->getValue('title');
               $image = $form->getValue('image');
               $galleryObj->addGalleryItem($title, $image);
               $this->_redirect('/items/add-gallery-item/');
           } 
        }
    }
    public function removeGalleryItemAction(){
      $galleryObj = new Model_DbTable_Gallery();
      
      $id = $_GET['id'];
      $galleryObj->removeGalleryItem($id);
      $this->_redirect('/items/gallery-items/');
    }
    
    public function editGalleryItemAction(){
      $this->view->title = 'Редактирование';  
      $this->view->headTitle('Редактирование', 'APPEND'); 
      
      $form = new Form_GalleryForm();
      $this->view->form = $form;
      
      $galleryObj = new Model_DbTable_Gallery();
      $request = $this->getRequest(); 
      $id = $_GET['id'];
      
      if($request->isPost()){
          if($form->isValid($this->_request->getPost())){
               $title = $form->getValue('title');
               $image = $form->getValue('image');
               $galleryObj->editGalleryItem($id, $title, $image);
               $this->_redirect('/items/gallery-items/');
           }
      }else{
          $galleryRow = $galleryObj->getGalleryItemById($id);
          $form->getElement('title')->setValue($galleryRow['title']);
          $form->getElement('image')->setValue($galleryRow['image']);
      }
    }
}