<?php
class Model_DbTable_Contacts extends Zend_Db_Table_Abstract{
    
    protected $_name = 'contacts';
    
    public function editContactsData($address, $homePhone, $phoneNumberMts, $phoneNumberVelc, $skype, $email, $workingTime, $additionalInfo){
        $data = array(
            'address' => $address,
            'home_phone' => $homePhone,
            'phone_mts' => $phoneNumberMts,
            'phone_velc' => $phoneNumberVelc,
            'skype' => $skype,
            'email' => $email,
            'working_time' => $workingTime,
            'additional_info' => $additionalInfo
            );
       
        $this->update($data);        
    }
}
