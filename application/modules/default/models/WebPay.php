<?php

class Default_Model_WebPay{
    /**
     * @var string wsb_storied - id нашего магазина
     * @var string wsb_store - название нашего магазина
     * @var string wsb_key - секретный ключ
     */
    
    public $wsb_storied;
    public $wsb_store;
    public $wsb_secret_key;
    public $wsb_order_num;
    public $wsb_currency_id;
    public $wsb_version;
    public $wsb_language_id;
    public $wsb_seed;
    public $wsb_signature;
    public $wsb_test;
    public $wsb_return_url;
    
    public function __construct(){
        $this->wsb_storied = WSB_STORIED;
        $this->wsb_store = WSB_STORE;
        $this->wsb_order_num = "ORDER-".$this->makeId();
        $this->wsb_secret_key = WSB_SECRET_KEY;
        $this->wsb_currency_id = "BYR";
        $this->wsb_version = 2;
        $this->wsb_language_id = 'russian';
        $this->wsb_seed = time();
        $this->wsb_test = 1;
        $this->wsb_return_url = WSB_RETURN_URL;
        
    }
    
    public function pay($total){
        $this->wsb_signature = $this->makeDigitalSIgnature($this->wsb_seed, $this->wsb_storied, $this->wsb_order_num, $this->wsb_test, $this->wsb_currency_id, $total, WSB_SECRET_KEY);
    }
    
    public function makeId(){
//        $quan1 = substr(str_shuffle(str_repeat("123", 15)), 0, 1);
//    	$quan2 = substr(str_shuffle(str_repeat("123456780", 15)), 0, 1);
    	$quan = 20;
    	$s = substr(str_shuffle(str_repeat("0123456789", 15)), 0, $quan);
    	return $s;
    }
    
    public function makeDigitalSignature($web_seed, $wsb_storied, $wsb_order_num, $wsb_test, $wsb_currency_id, $total, $secret_key){
        $wsb_signature = sha1($web_seed.$wsb_storied.$wsb_order_num.$wsb_test.$wsb_currency_id.$total.$secret_key);
        return $wsb_signature;
    }
}
