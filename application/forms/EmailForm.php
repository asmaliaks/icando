<?php
class Form_EmailForm extends Zend_Form{
    
        public function __construct($option = null) {
        parent::__construct($option);
        
        $this->setName('email_form');
        
        $name  = new Zend_Form_Element_Text('name');
        $name->setLabel('Ваше имя')
             ->setRequired()
             ->addErrorMessage('Поле обязательно для заполнения');
        
        $email = new Zend_Form_Element_Text('email');
        $email->setLabel('E-mail')
              ->setRequired()
              ->addErrorMessage('Поле обязательно для заполнения');
        
        $emailText = new Zend_Form_Element_Textarea('email_text');
        $emailText->setLabel('Ваше сообщение')
                  ->setRequired()
                ->addErrorMessage('Поле обязательно для заполнения');
        
        $element = new Zend_Form_Element_Captcha('foo', array(
             'label' => "Докажите что вы не робот",
             'captcha' => 'Figlet',
             'captchaOptions' => array(
             'captcha' => 'Figlet',
             'wordLen' => 3,        
             'timeout' => 300
             ),
        ));
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Отправить')
               ->setAttrib('class', 'button2');
        
        $this->addElements(array(
            $name,
            $email,
            $emailText,
            $element,
            $submit
        ));
  }
}
