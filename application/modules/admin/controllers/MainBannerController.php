<?php

class Admin_MainBannerController extends Zend_Controller_Action{
    protected $user;
    
    public function init(){
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
          
       }        
    }
    
    public function sliderListAction(){
        $bannerObj = new Admin_Model_DbTable_MainBanner();
        $slides = $bannerObj->getSliderList();
        
        $this->view->slides = $slides;
    }
    
    public function removeSlideAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            $id = $request->getParam('slideId');
            $mainSliderObj = new Admin_Model_DbTable_MainBanner();
            $mainSliderObj->removeSlide($id);
            print_r('true');exit;
        }
    }
    
    public function removeImageAction(){
        
    }
    
    public function addAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            $data = array();
                        // upload image
            if($_FILES['image']){
                $dir = (int)is_dir(DOCUMENT_ROOT."/images/main-banner/");
                if( !$dir ){					
                        //die(DOCUMENT_ROOT.$file_path.'/');				
                        mkdir( DOCUMENT_ROOT."/images/main-banner/" );
                        chmod( DOCUMENT_ROOT."/images/main-banner/", 0777 );				
                }
                if(is_uploaded_file($_FILES["image"]["tmp_name"]))
                {
              
                  copy($_FILES["image"]["tmp_name"], DOCUMENT_ROOT."/images/main-banner/".$_FILES["image"]["name"]);
//                  copy($_FILES["image"]["tmp_name"], DOCUMENT_ROOT."/images/task_images/".$_FILES["image"]["name"]);
                  $data['image'] = $_FILES['image']['name'];
                }
            }
            $mainBannerObj = new Admin_Model_DbTable_MainBanner();
            $mainBannerObj->addSlide($data);
            $this->_redirect('/admin/main-banner/slider-list');
        }
    }
}

