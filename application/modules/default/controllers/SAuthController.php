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
             'salt' => SALT,   
             'client_id' => VK_CLIENT_ID,
             'client_secret' => VK_CLIENT_SECRET,
             'code' => $_GET['code'],
             'redirect_uri' => 'ican.loc'
            );
            $tojsonDecode = urldecode(http_build_query($params));
            $token = json_decode(file_get_contents('https://oauth.vk.com/access_token?' . urldecode(http_build_query($params))), true);
            if (isset($token['access_token'])) {
               $params = array(
               'uids'         => $token['user_id'],
               'fields'       => 'uid,first_name,last_name,screen_name,sex,bdate,photo_big',
               'access_token' => $token['access_token']
               );
               
               $userInfo = json_decode(file_get_contents('https://api.vk.com/method/users.get' . '?' . urldecode(http_build_query($params))), true);
               if (isset($userInfo['response'][0]['uid'])) {
                  $userInfo = $userInfo['response'][0];
                  $result = true;
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
}    