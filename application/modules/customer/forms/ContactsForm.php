<?php

class Form_ContactsForm extends Zend_Form{
       
    public function __construct($option = null) {
        parent::__construct($option);
        
        $this->setName('contacts');
        
        $address = new Zend_Form_Element_Text('address');
        $address->setLabel('Адрес')
                ->setRequired()
                ->addErrorMessage('Поле обязательно для заполнения');
        
        $homePhone = new Zend_Form_Element_Text('home_phone');
        $homePhone->setLabel('Стационарный телефон');
        
        $phoneNumberMts = new Zend_Form_Element_Text('phone_mts');
        $phoneNumberMts->setLabel('Контактный телефон МТС')
                    ->setRequired()
                    ->addErrorMessage('Поле обязательно для заполнения');
        
        $phoneNumberVelc = new Zend_Form_Element_Text('phone_velc');
        $phoneNumberVelc->setLabel('Контактный телефон Velcom');
        
        
        $skype = new Zend_Form_Element_Text('skype');
        $skype->setLabel('Skype');
        
        $email = new Zend_Form_Element_Text('email');
        $email->setLabel('Email')
              ->setRequired()
              ->addErrorMessage('Поле обязательно для заполнения');
       
        
        $workingTime = new Zend_Form_Element_Textarea('working_time');
        $workingTime->setLabel('Время работы')
                ->setRequired()
                ->clearFilters()
                ->setAttribs(array('cols' => 40, 'rows' => 10))
                ->addErrorMessage('Поле обязательно для заполнения');
        
        $additionalInfo = new Zend_Form_Element_Textarea('additional_info');
        $additionalInfo->setLabel('Дополнителная информация')
                ->clearFilters()
                ->setAttribs(array('cols' => 40, 'rows' => 10));
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Сохранить')
               ->setAttrib('class', 'button2');
        
        $this->addElements(array(
            $address,
            $homePhone,
            $phoneNumberMts,
            $phoneNumberVelc,
            $skype,
            $email,
            $workingTime,
            $additionalInfo,
            $submit
        ));
 }
}