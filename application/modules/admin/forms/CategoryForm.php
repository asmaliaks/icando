<?php

class Admin_Form_CategoryForm extends Zend_Form{
    
   public function __construct($option = null) {
   parent::__construct($option);
 
   // call category model to get all categories for select
   $categoryObj = new Admin_Model_DbTable_Categories();
   $categoryList = $categoryObj->getList();
   
   $this->setName('category');
   
   $title = new Zend_Form_Element_Text('title');
   $title->setLabel('Название категории')
         ->setRequired();

   $parentCategory = new Zend_Form_Element_Select('parentId');
   $parentCategory->setLabel('Родительская категория')
           ->addMultiOption('0', 'Не выбрано');
   foreach($categoryList as $category){
       if($category['parent_id'] == 0){
          $parentCategory->addMultiOption($category['id'], $category['title']);
       }
   }
   
   $submit = new Zend_Form_Element_Submit('submit');
   $submit->setLabel('Сохранить')
          ->setAttrib('class', 'button2');
   
   $this->addElements(array($title, $parentCategory, $submit));
   $this->setMethod('post');
   
   
        
        
    }
}
