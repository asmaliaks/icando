<?php
class Form_LoginForm extends Zend_Form 
{
    public function __construct($option = null) {
        parent::__construct($option);
        
        $this->setName('login');
        
        $username = new Zend_Form_Element_Text('username');
        $username->setLabel('Логин ')
                 ->setRequired()
                 ->addErrorMessage('Поле обязательно для заполнения');
                 
        $password = new Zend_Form_Element_Password('pass');
        $password->setLabel('Пароль')
                 ->setRequired()
                 ->addErrorMessage('Поле обязательно для заполнения');
                 
        $login = new Zend_Form_Element_Submit('login');
        $login->setLabel('Войти')
              ->setAttrib('class', 'button2');
        
        $this->addElements(array($username, $password, $login));
        $this->setMethod('post');
        $this->setAction(Zend_Controller_Front::getInstance()->getBaseUrl().'/authentication/log-in');
    }
}