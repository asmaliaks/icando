<?php
class Performer_Form_RegistrationForm extends Zend_Form{
    
   public function __construct($option = null) {
   parent::__construct($option);
 
   $this->setName('personal_data_form');

   $email = new Zend_Form_Element_Text('email');
   $email->setLabel('Email')
           ->setAttrib("id", "email_input")
         ->addErrorMessage('Поле обязательно для заполнения');
   
   $name = new Zend_Form_Element_Text('username');
   $name->setLabel('Имя')
         ->addErrorMessage('Поле обязательно для заполнения');
   $surname = new Zend_Form_Element_Text('surname');
   $surname->setLabel('Фамилия')
           ->addErrorMessage('Поле обязательно для заполнения');
   $sex = new Zend_Form_Element_Select('sex');
   $sex->setLabel('Пол')
           ->addErrorMessage('Выберите пол');

   $about = new Zend_Form_Element_Textarea('about');
   $about->setLabel('Описание')
           ->addErrorMessage('Поле обязательно для заполнения')
           ->setAttribs(array('cols' => '60', 'rows'=>'10', 'class' => 'form-control'));
   
   $sex->addMultiOptions(array(
      'male' => 'М',
      'female' => 'Ж'
   ));
   
   $dayBirth = new Zend_Form_Element_Select('day_birth');
   $dayBirth->setLabel('День рождения');
   $k=1;
   while($k<32){
       if($k<10){
           $k = "0".$k;
       }
       $dayBirth->addMultiOption($k, $k);
       $k++;
   }
   $monthBirth = new Zend_Form_Element_Select('month_birth');
   $monthBirth->setLabel('Месяц')
           ->addMultiOptions(array(
               '01' => 'январь',
               '02' => 'февраль',
               '03' => 'март',
               '04' => 'апрель',
               '05' => 'май',
               '06' => 'июнь',
               '07' => 'июль',
               '08' => 'август',
               '09' => 'сентябрь',
               '10' => 'октябрь',
               '11' => 'ноябрь',
               '12' => 'декабрь',
           ));
   
   $currentYear = date("Y");
   $birthYear = new Zend_Form_Element_Select('year_birth');
   $birthYear->setLabel('Год');
   $y = 0;
   while($y<110){
       $year = $currentYear-$y;
       $birthYear->addMultiOption($year, $year);
       $y++;
   }
           
   $phoneNumber = new Zend_Form_Element_Text('phonenumber');
   $phoneNumber->setLabel('Номер телефона +375')
           ->addValidator('alnum');
   
   $city = new Zend_Form_Element_Text('city');
   $city->setLabel('Город');
   
   $image = new Zend_Form_Element_File('image');
   $image->setLabel('Изображение')
//         ->setDestination(DOCUMENT_ROOT.'/images/users_images/');  
         ->setDestination($_SERVER['DOCUMENT_ROOT'].'/images/users_images/');  
   
   
   $pass = new Zend_Form_Element_Password('pass');
   $pass->setLabel('Пароль');



   $submit = new Zend_Form_Element_Submit('submit');
   $submit->setLabel('Сохранить')
          ->setAttrib('class', 'button2')
          ->setAttrib('class', 'btn btn-primary');
   
   $this->addElements(array($email, $name, $surname, $sex, $about, $phoneNumber, $city, $dayBirth, $monthBirth, $birthYear, $image, $pass,  $submit));

   $this->setMethod('post');
   
   
        
        
    }
}