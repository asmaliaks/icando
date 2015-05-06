<?php

class Customer_OfficeController extends Zend_Controller_Action{
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
        $usersModel = new Model_DbTable_Users();
        $form = new Customer_Form_RegistrationForm();
//        $user = $usersModel->getCustomerById($this->user->id);
        // get customer's tasks
        $tasksObj = new Customer_Model_DbTable_TasksModel();
        $customersTasks = $tasksObj->getCustomersTasksForOffice($this->user->id);
        
        $request = $this->getRequest();
             // user data form   
        if($request->isPost()){
            if($form->isValid($this->_request->getPost())){
                $birthDay = $request->getParam('day_birth')+1;
                $birthMonth = $request->getParam('month_birth');
                $birthYear = $request->getParam('year_birth');
                $birthDate = $birthDay.'.'.$birthMonth.'.'.$birthYear;
                $birthDate = strtotime($birthDate);
                $passStr = $form->getValue('pass');
                $data = array(
                    'email' => $form->getValue('email'),
                    'username'  => $form->getValue('username'),
                    'surname' => $form->getValue('surname'),
                    'sex' => $form->getValue('sex'),
                    'city' => $form->getValue('city'),
                    'about' => $form->getValue('about'),
                    'birth_date' => $birthDate,
                );
                if($data['about'] == ''){
                    $data['about'] = NULL;
                }
//                $image = $form->getValue('image');
//                if($image){
//                    $data['image'] = $image;
//                }
                if($passStr != ''){
                    $passHash = base64_encode($passStr);
                    $passHash = $passHash.SALT;
                    $data['pass'] = $passHash;
                }
                $usersModel = new Model_DbTable_Users();
                $usersModel->editUser($data, $this->user->id);
                $_SESSION['Zend_Auth']['storage']->email = $form->getValue('email');
                $_SESSION['Zend_Auth']['storage']->username = $form->getValue('username');
                $_SESSION['Zend_Auth']['storage']->surname = $form->getValue('surname');
                $_SESSION['Zend_Auth']['storage']->sex = $form->getValue('sex');
                $_SESSION['Zend_Auth']['storage']->about = $data['about'];
                $_SESSION['Zend_Auth']['storage']->birth_date = $birthDate;
                $this->_redirect("/customer/office/index/success/1");
            }else{
                $this->view->form = $form;
            }
    }else{
        // if request is not post

        $usersModel = new Model_DbTable_Users();
        $user = $usersModel->getUserById($this->user->id);
        $birthStr = gmdate("d.m.Y", $user['birth_date']);
        $birthAr = explode(".", $birthStr);
        
        $form->getElement('email')->setValue($user['email']);
        $form->getElement('username')->setValue($user['username']);
        $form->getElement('surname')->setValue($user['surname']);
        $form->getElement('year_birth')->setValue($birthAr[2]);
        $form->getElement('month_birth')->setValue($birthAr[1]);
        $form->getElement('day_birth')->setValue($birthAr[0]);
        $form->getElement('sex')->setValue($user['sex']);
//        $form->getElement('image')->setValue($user['image']);
        $form->getElement('about')->setValue($user['about']);
        $form->getElement('city')->setValue($user['city']);
        $this->view->form = $form;
    }

    $closedTasks = $tasksObj->getCustomersTasksClosed($this->user->id);
    if($closedTasks){
            // get user's rating
            $feedbackObj = new Customer_Model_DbTable_FeedbackModel();
            $rating = $feedbackObj->countCustomersRating($this->user->id);
            $this->view->rating = floor($rating);
            $this->view->closedTasks = $closedTasks;
        }
    
        $this->view->customersTasks = $customersTasks;
        $this->view->form = $form;
        $this->view->user = $user;
    }
    
public function changeAvatarAction(){
    $request = $this->getRequest();
    if($request->isPost()){
        $avatar_src = $request->getParam('avatar_src');
        $avatar_data = $request->getParam('avatar_data');
        $cropObj = new Default_Model_CropAvatar($avatar_src, $avatar_data, $_FILES['avatar_file']);
          $response = array(
            'state'  => 200,
            'message' => $cropObj->getMsg(),
//            'result' => $cropObj->getResult(),

          );
              // edit user's data
        $usersObj = new Model_DbTable_Users();
        $data = array(
            'image'=>$cropObj->getName() 
        );
        $response['result'] = '/images/users_images/'.$data['image'];
        $usersObj->editUser($data, $this->user->id);
        echo json_encode($response);exit;
    }

}    
private function makeHash(){
    	$quan1 = substr(str_shuffle(str_repeat("234", 15)), 0, 1);
    	$quan2 = substr(str_shuffle(str_repeat("123456780", 15)), 0, 1);
    	$quan = $quan1."". $quan2;
    	$s = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 15)), 0, $quan);
    	return $s;
}

public function applicationAction(){
        $this->view->title = 'Настройка категорий';  
        $this->view->headTitle('Настройка категорий', 'APPEND');
        
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
          $this->view->categories = $categories;
}  

    public function addUserCategoryAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            $userCatObj = new Performer_Model_DbTable_UserCategory();
            $catId = $request->getParam('catId');
            $userCatObj->addUsersCategory($this->user->id, $catId);
            echo 'true';exit;
        }
    }
    
    public function removeUsersCategoryAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            $userCatObj = new Performer_Model_DbTable_UserCategory();
            $catId = $request->getParam('catId');
            $userCatObj->removeUsersCategory($this->user->id, $catId);
            echo 'true';exit;
        }
    }
}

