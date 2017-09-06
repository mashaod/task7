<?php 

class Model
{ 	
	private $userName;
	private $userSubject;
	private $userEmail;
	private $userMessage;

	private $placeHolders = array(
									'%TITLE%'=>'Contact Form', 
									'%ERRORS_NAME%'=>'', 
									'%ERRORS_SUBJECT%'=>'', 
									'%ERRORS_MESSAGE%'=>'', 
									'%ERRORS_EMAIL%'=>'',
									'%NAME%'=>'',
									'%MESSAGE%'=>'',
									'%EMAIL%'=>'',
									'%SUBJECT_1%'=>'',
									'%SUBJECT_2%'=>'',
									'%SUBJECT_3%'=>'',
									'%THEAM_0%'=> 'Please select',
									'%THEAM_1%'=> 'One Subject',
									'%THEAM_2%'=> 'Second Subject',
									'%THEAM_3%'=> 'Third Subject',
									'%ERRORS_SEND%'=> '',
									'%SUCCESS%' => ''
								);

	public function __construct()
	{

	}
   	
	public function getArray()
   	{	    
		return $this->placeHolders;
   	}
		
	public function checkForm()
	{
		$this->checkName();
		$this->checkSubject();
		$this->checkMessage();
		$this->checkEmail();

		if(!empty($this->userName) && !empty($this->userSubject) && !empty($this->userEmail) && !empty($this->userMessage))
		{
			return true;
		}
		else
		{
			return false;
		}			
	}

	public function checkName()
	{	
		$name = $_POST['name'];

		if (strlen($name) > 2 && !preg_match('/[0-9]/', $name))
		{
			$this->placeHolders['%NAME%'] = $name;
			$this->userName = $name;
			return true;
		}
		else
		{
			$this->placeHolders['%NAME%'] = $name;
			$this->placeHolders['%ERRORS_NAME%'] = "Name must be more than two letters and haven't numbers";
			return false;
		}		
	}

	public function checkSubject()
	{
		if($_POST['subject'] != 0)
		{
			$subjectStr = "%SUBJECT_" . $_POST['subject'] . "%";
			$this->placeHolders[$subjectStr] = "selected='selected'";
			$this->userSubject = $this->placeHolders["%THEAM_" . $_POST['subject'] . "%"];
			return true;
		}
		else
		{
			$this->placeHolders['%ERRORS_SUBJECT%'] = "Please, select a theame";
			return false;
		}

	}

	public function checkMessage()
	{
		$message = $_POST['message'];

		if (strlen($message) > 5)
		{
			$this->placeHolders['%MESSAGE%'] = $message;
			$this->userMessage = $message;
			return true;
		}
		else
		{
			$this->placeHolders['%MESSAGE%'] = $message;
			$this->placeHolders['%ERRORS_MESSAGE%'] = "Message can't be less than 5 symbols";
			return false;
		}
		
	}

	public function checkEmail()
	{
		$email = $_POST['email'];

		if(filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$this->placeHolders['%EMAIL%'] = $email;
			$this->userEmail = $email;
			return true;
		}
		else
		{
			$this->placeHolders['%EMAIL%'] = $email;
			$this->placeHolders['%ERRORS_EMAIL%'] = "Invalid Email";
			return false;
		}
	}

	public function sendEmail()
	{
		date_default_timezone_set('Europe/Kiev');
		$sendMessage = "Name: " . $this->userName . "\r\n" . 
			       "Message: " . $this->userMessage . "\r\n" . 
			       "IP-adress: " . $_SERVER['REMOTE_ADDR'] . "\r\n" . 
				"Date: " . date("Y-m-d H:i:s");
		
		$headers = "From: " . $this->userEmail . "\r\n" . 
				"Reply-To: " . $this->userEmail . "\r\n" . 
				"Content-type: text/html; charset=utf-8" . "\r\n";
		
		if (mail(TO, $this->userSubject, $sendMessage, $headers))
        {
            $this->placeHolders['%NAME%'] = '';
            $this->placeHolders['%SELECT_' . $_POST['subject'] . '%'] = '';
            $this->placeHolders['%EMAIL%'] = '';
            $this->placeHolders['%MESSAGE%'] = '';
            $this->placeHolders['%SUCCESS%'] = 'Thank you, for your mail!';
            return true;
        }
        else
        {
            $this->placeHolders['%ERRORS_SEND%'] = 'Mail was rejected';
            return false;
        }
	}
				
		// return mail()
			
}
