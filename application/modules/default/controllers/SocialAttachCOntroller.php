<?php
class SAuthController extends Zend_Controller_Action{
    protected $user;
    
    public function init(){
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
          
       }        
    }
    
    public function vkAction(){
       
        if (isset($_GET['code'])) {
            $params = array(
             'client_id' => VK_CLIENT_ID,
             'client_secret' => VK_CLIENT_SECRET,
             'code' => $_GET['code'],
             'response_type' => 'code',
             'v'=> '5.28',  
             'redirect_uri' => 'http://icando.dev.skilus.biz/s-auth/vk-complete',
             'scope' => 'friends,video,offline,email,nohttps',
             'display' => 'page'   
            );
            $tojsonDecode = urldecode(http_build_query($params));
           
            $url = 'https://oauth.vk.com/authorize?' . urldecode(http_build_query($params));

            $this->_redirect($url);

        }
    }
    
    public function fbAction(){
        if (isset($_GET['code'])) {
            $result = false;
            $params = array(
                'client_id'     => FB_CLIENT_ID,
                'redirect_uri'  => FB_REDIRECT_URI,
                'client_secret' => FB_CLIENT_SECRET,
                'code'          => $_GET['code']
            );

            $url = 'https://graph.facebook.com/oauth/access_token'. '?' . http_build_query($params);
            $tokenInfo = null;
            $this->_redirect($url);
        //    $response = parse_str(file_get_contents($url . '?' . http_build_query($params)), $tokenInfo);


        }        
    }
    
    public function okAction(){
        if (isset($_GET['code'])) {
            $params = array(
                'code' => $_GET['code'],
                'redirect_uri' => OK_REDIRECT_URI,
                'grant_type' => 'authorization_code',
                'client_id' => OK_CLIENT_ID,
                'client_secret' => OK_SECRET_KEY
        );

        $url = 'http://api.odnoklassniki.ru/oauth/token.do';
        
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url); // url, куда будет отправлен запрос
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, urldecode(http_build_query($params))); // передаём параметры
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($curl);
        curl_close($curl);

        $tokenInfo = json_decode($result, true);
        
        $public_key = OK_PUBLIC_KEY;
        if (isset($tokenInfo['access_token']) && isset($public_key)) { 
            $sign = md5("application_key=".OK_PUBLIC_KEY."format=jsonmethod=users.getCurrentUser" . md5("{$tokenInfo['access_token']}".OK_SECRET_KEY));
            //print_r($sign);exit;
            $params = array(
                'method'          => 'users.getCurrentUser',
                'access_token'    => $tokenInfo['access_token'],
                'application_key' => OK_PUBLIC_KEY,
                'format'          => 'json',
                'sig'             => $sign
            );
            
            
            $userInfo = json_decode(file_get_contents('http://api.odnoklassniki.ru/fb.do' . '?' . urldecode(http_build_query($params))), true);
        
            // check id user exists with that user_id 
            $userModel = new Model_DbTable_Users();
            $user = $userModel->checkOkUser($userInfo['uid']);


            if(!$user){
                // register and authenticate
                $pass = base64_encode($userInfo['uid']);
                $pass = $pass.SALT;
                if($userInfo['birthday']){
                   $birhtAr = explode("-",$userInfo['birthday']); 
                   $birthAr = array($birhtAr['2'], $birhtAr['1'], $birhtAr['0']);
                   $userInfo['birthday'] = implode(".", $birthAr);
                   $userInfo['birthday'] = strtotime($userInfo['birthday']);
                }
                $data = array(
                    'username'=> $userInfo['first_name'],
                    'surname' => $userInfo['last_name'],
                    'sex' => $userInfo['gender'],
                    'role' => 'customer',
                    'birth_date'=> $userInfo['birthday'],
                    'email' =>null,
                    'ok' => $userInfo['uid'],
                    'city' => $userInfo['location']['city'],
                    'pass' => $pass,
                );
                $userModel->addNewUser($data);
                 // authorizate new user
                $authAdapter = $this->getAuthAdapter('ok');
        
                $userId = $userInfo['uid'];
                $authAdapter->setIdentity($userId)
                    ->setCredential($pass);
        
                $auth = Zend_Auth::getInstance();
                $result = $auth->authenticate($authAdapter);
           
                if($result->isValid()){
                    $identity = $authAdapter->getResultRowObject();
            
                    $authStorage = $auth->getStorage();
                    $authStorage->write($identity);
                    // redirect user according to his role
                    $this->_redirect('customer/index');
                    
                }
            }else{
                // if user registred
                // authorizate new user
                $authAdapter = $this->getAuthAdapter('ok');
        
                $userId = $userInfo['uid'];
                $pass = base64_encode($userInfo['uid']);
                $pass = $pass.SALT;
                $authAdapter->setIdentity($userId)
                    ->setCredential($pass);
        
                $auth = Zend_Auth::getInstance();
                $result = $auth->authenticate($authAdapter);
           
                if($result->isValid()){
                    $identity = $authAdapter->getResultRowObject();
            
                    $authStorage = $auth->getStorage();
                    $authStorage->write($identity);
                    // redirect user according to his role
                    if($identity->role == 'admin'){
                        $this->_redirect('admin/index');
                    }else if($identity->role == 'customer'){
                        $this->_redirect('customer/index');
                    }else if($identity->role == 'performer'){
                        $this->_redirect('performer/index');
                    }
                    
                }
            }
            }
        }
    }    
}