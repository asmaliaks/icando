<?php


class Default_Model_Smtp{
  /**
    * 
    * @var string $smtp_username - логин
    * @var string $smtp_password - пароль
    * @var string $smtp_host - хост
    * @var string $smtp_from - от кого
    * @var integer $smtp_port - порт
    * @var string $smtp_charset - кодировка
    *
    */   
    public $smtp_username;
    public $smtp_password;
    public $smtp_host;
    public $smtp_from;
    public $smtp_port;
    public $smtp_charset;
    
    public function __construct() {
        $this->smtp_username = SMTP_USERNAME;
        $this->smtp_password = SMTP_PASS;
        $this->smtp_host = SMTP_HOST;
        $this->smtp_from = SMTP_FROM;
        $this->smtp_port = SMTP_PORT;
        $this->smtp_charset = SMTP_CHARSET;
    }
    
    /**
    * Отправка письма
    * 
    * @param string $mailTo - получатель письма
    * @param string $subject - тема письма
    * @param string $message - тело письма
    * @param string $headers - заголовки письма
    *
    * @return bool|string В случаи отправки вернет true, иначе текст ошибки    *
    */
    function send($mailTo, $subject, $message, $headers) {
$mailTo = "asmaliaks@gmail.com";
        
        $contentMail = "Date: " . date("D, d M Y H:i:s") . " UT\r\n";
        $contentMail .= 'Subject: =?' . $this->smtp_charset . '?B?'  . base64_encode($subject) . "=?=\r\n";
        $contentMail .= $headers . "\r\n";
        $contentMail .= $message . "\r\n";

            if(!$socket = @fsockopen($this->smtp_host, $this->smtp_port, $errorNumber, $errorDescription, 60)){
                echo $errorNumber.".".$errorDescription;
                return false;
            }
            if (!$this->_parseServer($socket, "220")){
                echo'Connection error';
                return false;
            }
			
			$server_name = $_SERVER["SERVER_NAME"];
            fputs($socket, "EHLO $server_name\r\n");
            if (!$this->_parseServer($socket, "250")) {
                fclose($socket);
                echo 'Error of command sending: HELO';
                return false;
            }
            
            fputs($socket, "AUTH LOGIN\r\n");
            if (!$this->_parseServer($socket, "334")) {
                fclose($socket);
                echo 'Autorization error';
                return false;
            }	
            
            fputs($socket, base64_encode($this->smtp_username) . "\r\n");
            if (!$this->_parseServer($socket, "334")) {
                fclose($socket);
                echo 'Autorization error';
                return false;
            }
            
            fputs($socket, base64_encode($this->smtp_password) . "\r\n");
            if (!$this->_parseServer($socket, "235")) {

                fclose($socket);
                echo 'Autorization error';
                return false;
            }
			
            fputs($socket, "MAIL FROM: <".$this->smtp_username.">\r\n");
            if (!$this->_parseServer($socket, "250")) {
                fclose($socket);
                echo 'Error of command sending: MAIL FROM';
                return false;
            }
            
			$mailTo = ltrim($mailTo, '<');
			$mailTo = rtrim($mailTo, '>');
            fputs($socket, "RCPT TO: <" . $mailTo . ">\r\n");     
            if (!$this->_parseServer($socket, "250")) {
                fclose($socket);
                //echo 'Error of command sending: RCPT TO';
                return false;
            }
            
            fputs($socket, "DATA\r\n");     
            if (!$this->_parseServer($socket, "354")) {
                fclose($socket);
                //echo 'Error of command sending: DATA';
                return false;
            }
            
            fputs($socket, $contentMail."\r\n.\r\n");
            if (!$this->_parseServer($socket, "250")) {
                fclose($socket);
                echo "E-mail didn't sent";
                return false;
            }
            
            fputs($socket, "QUIT\r\n");
            fclose($socket);

        return true;
    }
    
    private function _parseServer($socket, $response) {
        while (@substr($responseServer, 3, 1) != ' ') {
            if (!($responseServer = fgets($socket, 256))) {
                return false;
            }
        }
        if (!(substr($responseServer, 0, 3) == $response)) {
            return false;
        }
        return true;
        
    }
}