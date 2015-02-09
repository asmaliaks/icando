<?php

class Customer_Form_TaskForm extends Zend_Form{
        public function __construct($option = null) {
        parent::__construct($option);
        
        $this->setName('task');
    
        $taskName = new Zend_Form_Element_Text('title');
        $taskName->setLabel('Название задачи')
                ->setRequired()
                ->addErrorMessage('Поле обязательно для заполнения');
        
        $description = new Zend_Form_Element_Textarea('description');
        $description->setLabel('Описание задачи')
                ->setAttribs(array('cols' => 40, 'rows' => 10));
        
        $finalDate = new Zend_Form_Element_Text('final_date');
        $finalDate->setLabel('Дата выполнения задачи')
                ->setAttrib('id', 'finalDate')
                ->setRequired()
                ->addErrorMessage('Поле обязательно для заполнения');
        $customersPrice = new Zend_Form_Element_Text('customers_price');
        $customersPrice->setLabel('Ваше предложение стоимости')
                ->setrequired()
                ->addErrorMessage('Проверте вводимые данные');
        
        $taskFile = new Zend_Form_Element_File('task_image');
        $taskFile->setLabel('Прикепите изображение (не обязательно)')
//                ->setDestination($_SERVER['DOCUMENT_ROOT'].'/images/task_images/');
                ->setDestination(DOCUMENT_ROOT.'/images/task_images/');
        
        // get category_id from session namespace
        $catNms = new Zend_Session_Namespace('category');
        
        $category = new Zend_Form_Element_Hidden('category_id');
        $category->setValue($catNms->catId);
        
        $agree = new Zend_Form_Element_Checkbox('agree');
        $agree->setLabel('Я согласен/а с правилами предоставления услуг данного сервиса')
                ->setRequired()
                ->setAttrib('id', 'agree')
                ->addErrorMessage('Необходимо согласится с правилами использования сервиса');
        
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Создать');
        
        $this->addElements(array($taskName, $description, $finalDate, $customersPrice, $taskFile, $agree, $category, $submit));
        $this->setMethod('post');
        $this->setAction(Zend_Controller_Front::getInstance()->getBaseUrl().'/customer/task/add-task');
    }
}
    