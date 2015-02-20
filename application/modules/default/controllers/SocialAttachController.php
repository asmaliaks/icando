<?php
class SocialAttachController extends Zend_Controller_Action{
    protected $user;
    
    public function init(){
       $auth = Zend_Auth::getInstance();
       if($auth->hasIdentity()){
          $this->user = $auth->getIdentity();
          
       }        
    }
    public function vkLinkAction(){
        $url = 'http://oauth.vk.com/authorize?';

        $params = array(
            'client_id'     => VK_ATTACH_CLIENT_ID,
            'redirect_uri'  => VK_ATTACH_REDIRECT_URI,
            'response_type' => 'code'
        );

        $urlToRedirect = $url.urldecode(http_build_query($params));
        $urlToRedirect = urldecode($urlToRedirect);
        $this->_redirect($urlToRedirect);
    }
    public function vkAction(){
      
        if (isset($_GET['code'])) {
            $params = array(
             'client_id' => VK_CLIENT_ID,
             'client_secret' => VK_CLIENT_SECRET,
             'code' => $_GET['code'],
             'response_type' => 'code',
             'v'=> '5.28',  
             'redirect_uri' => 'http://icando.dev.skilus.biz/social-attach/vk-complete',
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
                'client_id'     => FB_ATTACH_CLIENT_ID,
                'redirect_uri'  => FB_ATTACH_REDIRECT_URI,
                'client_secret' => FB_ATTACH_CLIENT_SECRET,
                'code'          => $_GET['code']
            );

            $url = 'https://graph.facebook.com/oauth/access_token'. '?' . http_build_query($params);
            $tokenInfo = null;
            $this->_redirect($url);
        //    $response = parse_str(file_get_contents($url . '?' . http_build_query($params)), $tokenInfo);


        }        
    }

    public function okLinkAction(){
        $url = 'http://www.ok.ru/oauth/authorize';
        $params = array(
            'client_id'     => OK_ATTACH_CLIENT_ID,
            'response_type' => 'code',
            'redirect_uri'  => OK_ATTACH_REDIRECT_URI,
            'scope' => 'VALUABLE_ACCESS;GET_EMAIL',
        ); 
        $link = $url.'?'. urldecode(http_build_query($params));
        $this->_redirect($link);
    }    
    
    public function okAction(){
        if (isset($_GET['code'])) {
            $params = array(
                'code' => $_GET['code'],
                'redirect_uri' => OK_ATTACH_REDIRECT_URI,
                'grant_type' => 'authorization_code',
                'client_id' => OK_ATTACH_CLIENT_ID,
                'client_secret' => OK_ATTACH_SECRET_KEY
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
            $user = $userModel->getUserById($this->user->id);

            $data = array(
                'ok' => $userInfo['uid'],
            );
            $userModel->attachAccount($data, $this->user->id);
            if($this->user->role == 'customer'){
                $this->_redirect('/customer/office/');
            }else if($this->user->role == 'performer'){
                $this->_redirect('/performer/user/');
            }
            }
        }
    }
    
    public function vkCompleteAction(){
        $params = array(
            'client_id'=>VK_ATTACH_CLIENT_ID,
            'client_secret' => VK_ATTACH_CLIENT_SECRET,
            'code'=>$_GET['code'],
            'redirect_uri'=>VK_ATTACH_REDIRECT_URI,
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
            

            // if user is not registred
            $userInfo = $userInfo['response']['0'];

            $data = array(
                'vk' => $userInfo['id'],
            );
            $userModel->attachAccount($data, $this->user->id);

            $mailObj = new Default_Model_Smtp();
            $message = "Уважаемый ".$this->user->username." Вы успешно привязали свой аккаунт Вконтакте. ";
            $message = wordwrap($message, 70);
            $headers = 'From: no_reply@icando.by';
            $mailObj->send($this->user->email, 'Привязка аккаунта', $message, $headers);

            if($this->user->role == 'customer'){
                $this->_redirect('/customer/office/');
            }else if($this->user->role == 'performer'){
                $this->_redirect('/performer/user/');
            }

           } 
    }

    public function fbLinkAction(){
        $url = 'https://www.facebook.com/dialog/oauth';

        $params = array(
          'client_id'     => FB_ATTACH_CLIENT_ID,
          'redirect_uri'  => FB_ATTACH_REDIRECT_URI,
          'response_type' => 'code',
          'scope'         => 'email,user_birthday'
        );
        
        $link = $url . '?' . urldecode(http_build_query($params));
 
        $this->_redirect($link);
    } 
    
    public function fbCompleteAction(){
       if (isset($_GET['code'])) {
            $result = false;

            $params = array(
                'client_id'     => FB_ATTACH_CLIENT_ID,
                'redirect_uri'  => FB_ATTACH_REDIRECT_URI, 
                'client_secret' => FB_ATTACH_CLIENT_SECRET,
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
                $user = $userModel->getUserById($this->user->id);
                // if user is not registred

                $data = array(
                    'fb' => $userInfo['id'],
                );
                $userModel->attachAccount($data, $user['id']);
                
                $mailObj = new Default_Model_Smtp();
                $message = "Уважаемый ".$this->user->username." Вы успешно привязали свой аккаунт Facebook. ";
                $message = wordwrap($message, 70);
                $headers = 'From: no_reply@icando.by';
                $mailObj->send($this->user->email, 'Привязка аккаунта', $message, $headers);

                if($this->user->role == 'customer'){
                    $this->_redirect('/customer/office/');
                }else if($this->user->role == 'performer'){
                    $this->_redirect('/performer/user/');
                }

        }
  }
    }    
}