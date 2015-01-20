<?php

class Form_RegistrationForm extends Zend_Form{
    
   public function __construct($option = null) {
   parent::__construct($option);
 
   $this->setName('registration_form');

   $email = new Zend_Form_Element_Text('email');
   $email->setLabel('Email')
         ->setRequired()
         ->addErrorMessage('Поле обязательно для заполнения');
   
   $name = new Zend_Form_Element_Text('username');
   $name->setLabel('Имя')
         ->setRequired()
         ->addErrorMessage('Поле обязательно для заполнения');
   $surname = new Zend_Form_Element_Text('surname');
   $surname->setLabel('Фамилия')
           ->setRequired()
           ->addErrorMessage('Поле обязательно для заполнения');
   $sex = new Zend_Form_Element_Select('sex');
   $sex->setLabel('Пол')
           ->setRequired()
           ->addErrorMessage('Выберите пол');
   
//   $birthday = new ZendX_JQuery_Form_Element_DatePicker('birthday');

   
   $sex->addMultiOptions(array(
      'male' => 'М',
      'female' => 'Ж'
   ));
           
   $phoneNumber = new Zend_Form_Element_Text('phonenumber');
   $phoneNumber->setLabel('Номер телефона')
           ->setRequired()
           ->addErrorMessage('Поле обязательно для заполнения');
   
   $city = new Zend_Form_Element_Text('city');
   $city->setLabel('Город')
           ->setRequired()
           ->addErrorMessage('Поле обязательно для заполнения');
   

   
   
   $pass = new Zend_Form_Element_Password('pass');
   $pass->setLabel('Пароль')
           ->setRequired();
   
   $passConfirm = new Zend_Form_Element_Password('pass_conf');
   $passConfirm->setRequired()
           ->setLabel('Подтвердите пароль');
           
   
   $captcha = new Zend_Form_Element_Captcha('captcha', array(
                    'captcha' => array(
                        'captcha' => 'image', // Тип CAPTCHA
                        'wordLen' => 4,
                        'width' => 150,
                        'height' => 60,
                        'timeout' => 320,
                        'fontSize' => 30,
                        'font' => $_SERVER['DOCUMENT_ROOT'].'/fonts/Vin\'s Dojo.ttf',
                        'imgDir' => APPLICATION_PATH . '/../public/captcha/images',
                        'imgUrl' => Zend_Controller_Front::getInstance()->getBaseUrl() .
                        '/captcha/images')));
        $captcha->setAttrib('placeholder', 'Введите код');

   $submit = new Zend_Form_Element_Submit('submit');
   $submit->setLabel('Сохранить')
          ->setAttrib('class', 'button2');
   
   $this->addElements(array($email, $name, $surname, $sex,  $phoneNumber, $city, $pass, $passConfirm, $captcha, $submit));
   $this->setMethod('post');
   
   
        
        
    }
}


