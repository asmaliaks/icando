<?php

class Form_CategoryForm extends Zend_Form{
    
   public function __construct($option = null) {
   parent::__construct($option);
 
   $this->setName('category');
   
   $title = new Zend_Form_Element_Text('title');
   $title->setLabel('Название категории')
         ->setRequired();
   
   $image = new Zend_Form_Element_File('category_image');
   $image->setLabel('Вставить изображение')
         ->setDestination($_SERVER['DOCUMENT_ROOT'].'/desktop/images/filter-portfolio/');
   
   $submit = new Zend_Form_Element_Submit('submit');
   $submit->setLabel('Сохранить')
          ->setAttrib('class', 'button2');
   
   $this->addElements(array($title, $image, $submit));
   $this->setMethod('post');
   
   
        
        
    }
}
