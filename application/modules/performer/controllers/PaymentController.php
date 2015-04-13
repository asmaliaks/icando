<?php

class Performer_PaymentController extends Zend_Controller_Action{
    
    protected $user;
    public function init(){
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
          
       }
    }
    
    public function indexAction(){
        $this->view->title = 'Пополнение баланса';  
        $this->view->headTitle('Пополнение баланса', 'APPEND');
        $request = $this->getRequest();
        if($request->isPost()){
            $quantity = $request->getParam('pointsQuantity');
            $total = $quantity;
            $usersObj = new Performer_Model_DbTable_Users();
            $user = $usersObj->getUserById($this->user->id);

            $webPayObj = new Default_Model_WebPay();
            $orderNum = $webPayObj->makeId();
            $seed = time();
            $signature = $this->makeSignature($orderNum, $seed, $total);

            $this->view->wsb_order_num = "ORDER-".$orderNum;//Идентификатор заказа, присваиваемый магазином

            $this->view->wsb_storeid = WSB_STOREID;// Идентификатор магазина в системе WebPayTM

            $this->view->wsb_store = WSB_STORE;//Название магазина, которое будет отображаться на форме оплаты.

            $this->view->wsb_currency_id = "BYR";

            $this->view->quantity = $quantity;
            $this->view->total = $total;
            $this->view->wsb_seed = $seed;
            $this->view->wsb_signature = $signature;
            $this->view->wsb_return_url = WSB_RETURN_URL;
            $this->view->wsb_cancel_return_url = WSB_CANCEL_RETURN_URL;
            $this->view->wsb_notify_return_url = WSB_NOTIFY_RETURN_URL;
            $this->view->user = $user;
        }
    }
    public function successAction(){
        $this->view->title = 'Платеж завершен';  
        $this->view->headTitle('Платеж завершен', 'APPEND');
        $pass = md5(WSB_PASS);
        $postdata = '*API=&API_XML_REQUEST='.urlencode('
        <?xml version="1.0" encoding="ISO-8859-1" ?>
        <wsb_api_request>
        <command>get_transaction</command>
        <authorization>
        <username>'.WSB_LOGIN.'</username>
        <password>'.$pass.'</password>
        </authorization>
        <fields>
        <transaction_id>'.$_GET['wsb_tid'].'
        </transaction_id>
        </fields>
        </wsb_api_request>
        ');
        $curl = curl_init(BILLING_URL);
        curl_setopt ($curl, CURLOPT_HEADER, 0);
        curl_setopt ($curl, CURLOPT_POST, 1);
        curl_setopt ($curl, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($curl, CURLOPT_SSL_VERIFYHOST, 0);
        $response = curl_exec ($curl);
        $xml = simplexml_load_string($response);
        $json = json_encode($xml);
        $resultArr = json_decode($json,TRUE);
        curl_close ($curl);
       
        // make payment log
        $paymentLogObj = new Performer_Model_DbTable_PaymentLog();
        $hasPayed = $paymentLogObj->checkIfPaymentExixsts($this->user->id, $resultArr["fields"]["order_num"], $resultArr["fields"]["transaction_id"], $resultArr["fields"]["wsb_signature"]);
        if(!$hasPayed){
            // add amount to user's balance
            $usersObj = new Performer_Model_DbTable_Users();
            $user = $usersObj->getUserById($this->user->id);
            $points = $resultArr['fields']['amount'];
            $balance = $user['balance']+$points;
            $data = array('balance'=> $balance);
            // if paymend is not loged add amount to user's balance
            $usersObj->editUser($data, $this->user->id);
            // send email about the payment
            $smtpObj = new Default_Model_Smtp();
            $message = 'Платеж на сумму '.$points.' '.POINT_LABEL.' '
                    . ' произведен успешно, сдеталями можете ознакомится в личном кабинете своего профиля.';
            
            $message = wordwrap($message, 70);
            $headers = 'From: no_reply@helpyou.by';
            if($user['email']){
                $smtpObj->send($user['email'], 'Платеж успешно произведен', $message, $headers);
            }
            $paymentData = array(
                'user_id'=>$this->user->id,
                'status'=> $resultArr['status'],
                'transaction_id'=>$resultArr["fields"]["transaction_id"],
                'order_id'=>$resultArr["fields"]["order_id"],
                'order_num'=>$resultArr["fields"]["order_num"],
                'amount'=>$resultArr["fields"]["amount"],
                'time'=>$resultArr["fields"]["batch_timestamp"],
                'currency_id'=>$resultArr["fields"]["currency_id"],
                'wsb_signature'=>$resultArr["fields"]["wsb_signature"],
                'payment_type'=>$resultArr["fields"]["payment_type"],
                'payment_method'=>$resultArr["fields"]["payment_method"],
                'rrn'=>$resultArr["fields"]["rrn"],
            );
            $logId = $paymentLogObj->logPayment($paymentData);
            $payment = $paymentLogObj->getLogById($logId);
            $this->view->payment = $payment;
        }else{
            $payment = $paymentLogObj->getPaymentByTransactionId($_GET['wsb_tid']);
            $this->view->payment = $payment;
        }
        

    }
    public function unsuccessAction(){
        
    }
    public function notifyAction(){
        
    }
    public function prepayAction(){
        $this->view->title = 'Пополнение баланса';  
        $this->view->headTitle('Пополнение баланса', 'APPEND');
        
        
    }
    
    protected function makeSignature($orderNum, $seed, $total){
       // $webPayObj = new Default_Model_WebPay();
        
        $wsb_seed = $seed;
        $wsb_storeid = WSB_STOREID;
        $wsb_order_num = "ORDER-".$orderNum;
        $wsb_test = 1;
        $wsb_currency_id = "BYR";
        $wsb_total = $total;
        $SecretKey = WSB_SECRET_KEY;
        
        $str = $wsb_seed . $wsb_storeid . $wsb_order_num . $wsb_test . $wsb_currency_id .$wsb_total.$SecretKey;
        
        $wsb_signature = sha1($str);
        // 
        //$wsb_signature = md5($resStr);

        return $wsb_signature;

    }
}

