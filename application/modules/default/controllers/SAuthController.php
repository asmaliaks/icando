<?php
class SAuthController extends Zend_Controller_Action{
    public function _init(){
        
    }

    public function indexAction(){
        
        //geting vk auuthorization link
        $vkLink = $this->vkLink();
        $fbLink = $this->fbLink();
        
        
        $this->view->fbLink = $fbLink;
        $this->view->vkLink = $vkLink;
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
           'fields'       => 'uid,first_name,last_name,screen_name,sex,domain,bdate,photo_big,city,country,email',
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
                    $userInfo['bdate'] = 0;
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
                    'email' => $userInfo['domain'].'@vkmessenger.com',
                    'vk' => $userInfo['id'],
                    'city' => $userInfo['city']['title'],
                    'pass' => $pass,
                );
                $userModel->addNewUser($data);
                // authorizate new user
                $authAdapter = $this->getAuthAdapter();
        
                $username = $userInfo['domain'].'@vkmessenger.com';
                $pass = $pass;
                $authAdapter->setIdentity($username)
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
                $userInfo = $userInfo['response'][0];
                $authAdapter = $this->getAuthAdapter();
        
                $username = $userInfo['domain'].'@vkmessenger.com';
                $pass = base64_encode($userInfo['id']);
                $pass = $pass.SALT;
                $authAdapter->setIdentity($username)
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
    
    
    public function fbAction(){
if (isset($_GET['code'])) {
    $result = false;

    $params = array(
        'client_id'     => $client_id,
        'redirect_uri'  => $redirect_uri,
        'client_secret' => $client_secret,
        'code'          => $_GET['code']
    );

    $url = 'https://graph.facebook.com/oauth/access_token';
    $tokenInfo = null;
    $response = parse_str(file_get_contents($url . '?' . http_build_query($params)), $tokenInfo);
    
}        
    }
    
    private function vkLink(){
        $url = 'http://oauth.vk.com/authorize?';

        $params = array(
            'client_id'     => VK_CLIENT_ID,
            'redirect_uri'  => VK_REDIRECT_URI,
            'response_type' => 'code'
        );

        $urlToRedirect = $url.urldecode(http_build_query($params));
        $urlToRedirect = urldecode($urlToRedirect);
        return $urlToRedirect;
    }

    private function fbLink(){
        $url = 'https://www.facebook.com/dialog/oauth';

        $params = array(
          'client_id'     => FB_CLIENT_ID,
          'redirect_uri'  => FB_REDIRECT_URI,
          'response_type' => 'code',
          'scope'         => 'email,user_birthday'
        );
        
        $link = $url . '?' . urldecode(http_build_query($params));
 
        return $link;
    }
    
    private function okLink(){
        
    }
    private function getAuthAdapter(){
    $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
    $authAdapter->setTableName('users')
                ->setIdentityColumn('email')
                ->setCredentialColumn('pass');
    return $authAdapter;
    }
}    