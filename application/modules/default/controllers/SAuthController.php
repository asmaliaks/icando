<?php
class SAuthController extends Zend_Controller_Action{
    public function _init(){
        
    }

    public function indexAction(){

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
    
    public function vkCompleteAction(){
        $params = array(
            'client_id'=>VK_CLIENT_ID,
            'client_secret' => VK_CLIENT_SECRET,
            'code'=>$_GET['code'],
            'redirect_uri'=>VK_REDIRECT_URI,
        );
        $uri = urldecode(http_build_query($params));
        //$access_token = file_get_contents('https://oauth.vk.com/access_token?'. urldecode(http_build_query($params)));
        
        #access_token through CURL
        $url = 'https://oauth.vk.com/access_token?'.urldecode(http_build_query($params));
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $token = json_decode(curl_exec($curl),true);
        curl_close($curl);

        
        if (isset($token['access_token'])) {
           $params = array(
           'user_id'         => $token['user_id'],
           'v'=>'5.28',
           'fields'       => 'uid,first_name,last_name,screen_name,sex,domain,bdate,photo_big,city,country,email,has_mobile',
           'access_token' => $token['access_token']
           );
            $url = 'https://api.vk.com/method/users.get' . '?' . urldecode(http_build_query($params));
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HEADER, false);
            $userInfo = json_decode(curl_exec($curl),true);
            curl_close($curl);

           // check id user exists with that user_id 
            $userModel = new Model_DbTable_Users();
            $user = $userModel->checkVkUser($userInfo['response']['0']['id']);
            if(!$user){
                // if user is not registred
                $userInfo = $userInfo['response']['0'];

                if($userInfo['sex'] == 2){
                    $userInfo['sex'] = 'male';
                }else if($userInfo['sex'] == 1){
                    $userInfo['sex'] = 'female';
                }
                $pass = base64_encode($userInfo['id']);
                $pass = $pass.SALT;
                if(empty($userInfo['bdate'])){
                    $userInfo['bdate'] = null;
                }else{
                    $userInfo['bdate'] = strtotime($userInfo['bdate']);
                    $userInfo['bdate'] = $userInfo['bdate']+18000;
                }
                if(empty($userInfo['city'])){
                    $userInfo['city'] = null;
                }
                $data = array(
                    'username'=> $userInfo['first_name'],
                    'surname' => $userInfo['last_name'],
                    'sex' => $userInfo['sex'],
                    'role' => 'customer',
                    'birth_date'=> $userInfo['bdate'],
                    'vk' => $userInfo['id'],
                    'city' => $userInfo['city']['title'],
                    'pass' => $pass,
                );
                $userModel->addNewUser($data);
                // authorizate new user
                $authAdapter = $this->getAuthAdapter('vk');
        
                $userId = $userInfo['id'];
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
                // if user registred or SN account attached authorize user with his regular credentials
                $userInfo = $userInfo['response'][0];
                $authAdapter = $this->getAuthAdapter('email');
        
                $userId = $userInfo['id'];
                // get user by vk_id
                $vkUser = $userModel->getUserBySnId($userId, 'vk');
                
                $authAdapter->setIdentity($vkUser['email'])
                    ->setCredential($vkUser['pass']);
        
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
   
    public function fbCompleteAction(){
       if (isset($_GET['code'])) {
            $result = false;

            $params = array(
                'client_id'     => FB_CLIENT_ID,
                'redirect_uri'  => FB_REDIRECT_URI, 
                'client_secret' => FB_CLIENT_SECRET,
                'code'          => $_GET['code']
            );

            $url = 'https://graph.facebook.com/oauth/access_token';
            
            $tokenInfo = null;
            parse_str(file_get_contents($url . '?' . http_build_query($params)), $tokenInfo);

            if (count($tokenInfo) > 0 && isset($tokenInfo['access_token'])) {
                $params = array('access_token' => $tokenInfo['access_token']);

                //$userInfo = json_decode(file_get_contents('https://graph.facebook.com/me' . '?' . urldecode(http_build_query($params))), true);
                
                $url = 'https://graph.facebook.com/me' . '?' . urldecode(http_build_query($params));
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_HEADER, false);
                $userInfo = json_decode(curl_exec($curl),true);
                curl_close($curl);
                           // check id user exists with that user_id 
                $userModel = new Model_DbTable_Users();
                $user = $userModel->checkFbUser($userInfo['id']);//print_r($user);exit;
                // if user is not registred
                if(!$user){//print_r('opa');exit;
                    $pass = base64_encode($userInfo['id']);
                    $pass = $pass.SALT;
                    if(empty($userInfo['birthday'])){
                        $userInfo['birthday'] = null;
                    }else{
                        $userInfo['birthday'] = strtotime($userInfo['birthday']);
                        $userInfo['birthday'] = $userInfo['birthday']+18000;
                    }
                    if(empty($userInfo['city'])){
                        $userInfo['city'] = null;
                    }
                    $data = array(
                        'username'=> $userInfo['first_name'],
                        'surname' => $userInfo['last_name'],
                        'sex' => $userInfo['gender'],
                        'role' => 'customer',
                        'birth_date'=> $userInfo['birthday'],
                        'email' => $userInfo['email'],
                        'fb' => $userInfo['id'],
                        'pass' => $pass,
                    );
                    $userModel->addNewUser($data);
                    // authorizate new user
                    $authAdapter = $this->getAuthAdapter('fb');

                    $userId = $userInfo['id'];
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
                    $authAdapter = $this->getAuthAdapter('fb');

                    $userId = $userInfo['id'];
                    $pass = base64_encode($userInfo['id']);
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
                   $userInfo['birthday'] = $userInfo['birthday']+18000;
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
                $authAdapter = $this->getAuthAdapter('email');
        
                $userId = $userInfo['uid'];
                $okUser = $userModel->getUserBySnId($userId, 'ok'); 
                
                $authAdapter->setIdentity($okUser['email'])
                    ->setCredential($okUser['pass']);
        
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
    
    public function okCompleteAction(){  
        if (isset($tokenInfo['access_token'])) { 
            $sign = md5("application_key={$public_key}format=jsonmethod=users.getCurrentUser" . md5("{$tokenInfo['access_token']}{$client_secret}"));

            $params = array(
                'method'          => 'users.getCurrentUser',
                'access_token'    => $tokenInfo['access_token'],
                'application_key' => $public_key,
                'format'          => 'json',
                'sig'             => $sign
            );
        }
    }
    
    public function vkLinkAction(){
        $url = 'http://oauth.vk.com/authorize?';

        $params = array(
            'client_id'     => VK_CLIENT_ID,
            'redirect_uri'  => VK_REDIRECT_URI,
            'response_type' => 'code'
        );

        $urlToRedirect = $url.urldecode(http_build_query($params));
        $urlToRedirect = urldecode($urlToRedirect);
        $this->_redirect($urlToRedirect);
    }

    public function fbLinkAction(){
        $url = 'https://www.facebook.com/dialog/oauth';

        $params = array(
          'client_id'     => FB_CLIENT_ID,
          'redirect_uri'  => FB_REDIRECT_URI,
          'response_type' => 'code',
          'scope'         => 'email,user_birthday'
        );
        
        $link = $url . '?' . urldecode(http_build_query($params));
 
        $this->_redirect($link);
    }
    
    public function okLinkAction(){
        $url = 'http://www.ok.ru/oauth/authorize';
        $params = array(
            'client_id'     => OK_CLIENT_ID,
            'response_type' => 'code',
            'redirect_uri'  => OK_REDIRECT_URI,
            'scope' => 'VALUABLE_ACCESS;GET_EMAIL',
        ); 
        $link = $url.'?'. urldecode(http_build_query($params));
        $this->_redirect($link);
    }
    private function getAuthAdapter($socialNetwork){
    $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
    $authAdapter->setTableName('users')
                ->setIdentityColumn($socialNetwork)
                ->setCredentialColumn('pass');
    return $authAdapter;
    }
}    