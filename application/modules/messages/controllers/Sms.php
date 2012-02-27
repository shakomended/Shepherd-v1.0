<?php

/*
22.03.2007. - Added wap push support
19.01.2007. - Added html encoding for sender and messagetext
*/

class SMS extends CI_Controller
{
  


	function index(){
		
		$this->load->view('smsform');
	}
	
	
	function Send($username, $password, $sender, $message, $flash, $inputgsmnumbers, $type, $bookmark)
	{
		
		
		      //input parameters ---------------------
	$username = 'chriss';                          //your username
	$password = 'chr045is';                          //your password
	 $sender;                            //sender text
	$message;                           //message text
	$flash = 0 ;                             //Is flash message (1 or 0)
	$inputgsmnumbers;        			 //destination gsm numbers
	$type = "longsms";                              //msg type ("bookmark" - for wap push, "longSMS" for text messages only)
	                      
	//--------------------------------------

	$host;
	$path;
	$XMLgsmnumbers;
	$xmldata;
	$request_data;
	$response;
		
		
		
		echo $username; die();
		$this->username = $username;
		$this->password = $password;
		$this->sender = htmlspecialchars($sender, ENT_QUOTES);
		$this->message = htmlspecialchars($message, ENT_QUOTES);
		$this->flash = $flash;
		$this->inputgsmnumbers = explode(',',$inputgsmnumbers);
		$this->type = $type;
		$this->bookmark = $bookmark;

		$this->host = "api2.infobip.com";
		$this->path = "/api/sendsms/xml";

		$this->convertGSMnumberstoXML();
		$this->prepareXMLdata();

                $this->response = $this->doPost($this->path,$this->request_data,$this->host);
                return $this->response;
	}

	function convertGSMnumberstoXML()
	{
		foreach($this->inputgsmnumbers as $gsmnumber)
		{
			$this->XMLgsmnumbers .= "<gsm>" . $gsmnumber . "</gsm>";
		}
	}

	function prepareXMLdata()
	{
		$this->xmldata = "<SMS><authentification><username>" . $this->username . "</username><password>" . $this->password . "</password></authentification><message><sender>" . $this->sender . "</sender><text>" . $this->message . "</text><flash>" . $this->flash . "</flash><type>" . $this->type . "</type><bookmark>" . $this->bookmark . "</bookmark></message><recipients>" . $this->XMLgsmnumbers . "</recipients></SMS>";
		$this->request_data = 'XML=' . $this->xmldata;
	}
	
	function doPost($uri,$postdata,$host){
	   $da = fsockopen($host, 80, $errno, $errstr);
	   if (!$da) 
	   {
		   return "$errstr ($errno)";
	   }
	   else {
		   $salida ="POST $uri  HTTP/1.1\r\n";
		   $salida.="Host: $host\r\n";
		   $salida.="User-Agent: PHP Script\r\n";
		   $salida.="Content-Type: text/xml\r\n";
		   $salida.="Content-Length: ".strlen($postdata)."\r\n";
		   $salida.="Connection: close\r\n\r\n";
		   $salida.=$postdata;
		   fwrite($da, $salida);
					 while (!feof($da))
			   $response.=fgets($da, 128);
		   $response=split("\r\n\r\n",$response);
		   $header=$response[0];
		   $responsecontent=$response[1];
		   if(!(strpos($header,"Transfer-Encoding: chunked")===false)){
			   $aux=split("\r\n",$responsecontent);
			   for($i=0;$i<count($aux);$i++)
				   if($i==0 || ($i%2==0))
					   $aux[$i]="";
			   $responsecontent=implode("",$aux);
		   }//if
		   return chop($responsecontent);
	   }//else
	}	
}

?>