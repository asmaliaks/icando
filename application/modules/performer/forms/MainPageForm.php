<?php

class Form_MainPageForm extends Zend_Form
{
    public function __construct($option = null) {
        parent::__construct($option);
        
        $this->setName('main-page'); 
        
        //text field
        $textField = new Zend_Form_Element_Textarea('text_field');
        $textField->setLabel('Поле для ввода текста.')
                  ->setRequired()
                  ->setVAlue('&nbsp')
                  ->setAttrib('rows', '10')
                  ->setAttrib('cols', '50')->clearFilters()
                  ->addErrorMessage('Поле обязательно для заполнения');
      
        $hiddenPageCategory = new Zend_Form_Element_Hidden('page_category');
        $hiddenPageCategory->setValue('main');
                           
        //submit
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Сохранить')
               ->setAttrib('class', 'button2');
        
        $this->addElements(array($textField, $hiddenPageCategory, $submit));
        $this->setMethod('post');
       // $this->setAction(Zend_Controller_Front::getInstance()->getBaseUrl().'/authentication/log-in');
   }
}