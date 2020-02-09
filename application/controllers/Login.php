<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		// here we got  necessary models

		// this Helper created by CI and it already Helper
		$this->load->helper('captcha');

		// this Helper created by CI and it already Helper
		$this->load->library('parser');

		// this Helper created by manuel and you can change some methods in Helper
		$this->load->helper("Captcha_code");
	}

	// this is login page
	public function index()
	{
		// here we created captcha for security
		$vals = cap_code();
		$captcha = create_captcha($vals);
		$this->session->set_userdata("captcha_code",$captcha["word"]);

		// here we created stdClass for send values to other pages
		$data = new stdClass();
		$data->captcha = $captcha;
		
		// here we called view login page
		$this->parser->parse('login',$data);
	}


	// this is login control page
	public function loginControl()
	{
		// here we check which came isset forms
		$this->load->library('form_validation');

		// check username
		$this->form_validation->set_rules('username', 'Username', 'required');

		// check password
		$this->form_validation->set_rules('password', 'Password', 'required');

		//check captcha
		$this->form_validation->set_rules('captcha_code', 'Captcha', 'required');

		// if this validation will true 
		if($this->form_validation->run() == TRUE)
		{
			// check captcha is true
			if($this->session->userdata("captcha_code") == $this->input->post("captcha_code"))
			{


			}else
			{
			
			// this method is create captcha array
			$vals = cap_code(); 

			//create captcha
			$captcha = create_captcha($vals); 
			
			//this session need leter thats why created
			$this->session->set_userdata("captcha_code",$captcha["word"]);

			// this varibiles we will use on Login.php
			$data['captcha_code_error'] =  "The Captcha Code field is wrong.";
			$data['captcha'] = $captcha;

			// load login page and send $data to this page
			$this->load->view("login",$data);
			}

		}else
		{

			// this method is create captcha array
			$vals = cap_code();

			//create captcha
			$captcha = create_captcha($vals);

			//this session need leter thats why created
			$this->session->set_userdata("captcha_code",$captcha["word"]);

			// this varibiles we will use on Login.php
			$data['form_error'] =  validation_errors();
			$data['captcha'] = $captcha;

			// load login page and send $data to this page
			$this->load->view("login",$data);
		}
		
	
	}
}
