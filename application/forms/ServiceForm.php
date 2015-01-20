<?php

class Form_ServiceForm extends Zend_Form{
        public function __construct($option = null) {
        parent::__construct($option);
        
        $this->setName('service');
    
        $title = new Zend_Form_Element('title');
        $title->setLabel('Название услуги')
               ->setRequired()
               ->addErrorMessage('Поле обязательно для заполнения');
        
        //   dbrequest
        $catObj = new Model_DbTable_Categories();
        $cat = $catObj->fetchAll();
        $cat = $cat->toArray();
        
        
        $category = new Zend_Form_Element_Radio('category');
        $category->setLabel('Выберите категорию');
        foreach($cat as $value){
            $category->addMultiOption($value['id'], $value['title'])
                     ->addErrorMessage('необходимо выбрать категорию');
        }
        

        
        $description = new Zend_Form_Element_Textarea('description');
        $description->setLabel('Подробное описание')
                    ->clearFilters()
                    ->setValue('&nbsp')
                    ->setAttrib('rows', '10')
                    ->setAttrib('cols', '50');
        
//        $price = new Zend_Form_Element('price');
//        $price->setLabel('Цена')
//              ->setRequired()
//              ->addErrorMessage('Поле обязательно для заполнения');
        
        $imageIcon = new Zend_Form_Element_File('image_icon');
        $imageIcon->setLabel('Изображение-иконка')
              ->setDestination($_SERVER['DOCUMENT_ROOT'].'/desktop/images/filter-portfolio/');
        
        $image = new Zend_Form_Element_File('image');
        $image->setLabel('Изображение')
              ->setDestination($_SERVER['DOCUMENT_ROOT'].'/desktop/images/filter-portfolio/');        
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Сохранить')
               ->setAttrib('class', 'button2');
        
        $this->addElements(array($title, $description, $category, $imageIcon, $image, $submit));
        $this->setMethod('post');
    }
}
    