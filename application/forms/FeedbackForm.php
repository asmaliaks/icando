<?php
class Form_FeedbackForm extends Zend_Form{
    
    public function __construct($option = null) {
        parent::__construct($option);
        
        $this->setName('feedback_form');
        
        $name = new Zend_Form_Element_Text('name');
        $name->setLabel('Введите ваше имя')
             ->setRequired()
             ->addErrorMessage('Поле обязательно для заполнения');
        
        
        
        $feedback = new Zend_Form_Element_Textarea('feedback');
        $feedback->setLabel('Оставте отзыв')
                 ->setRequired()
                 ->setAttribs(array('cols' => '40', 'class' => 'fdb', 'maxLength' => '120'))
                 ->addErrorMessage('Поле обязательно для заполнения');
        

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
        $submit->setLabel('Отправить')
                ->setAttrib('class', 'button2');
        
        $this->addElements(array(
            $name,
            $feedback,
            $captcha,
            $submit
        ));
}
}
