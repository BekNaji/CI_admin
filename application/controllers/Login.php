<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	// LOGO NAME
	public $logoname = 'Your Logo';

	public function __construct()
	{
		parent::__construct();

		// this Helper created by CI and it already Helper
		$this->load->helper('captcha');
		// this Helper created by manuel and you can change some methods in Helper
		$this->load->helper('code');

		// we included login model
		$this->load->model('login_model'); 
	} 


	

	// this is login page
	public function index($id ='')
	{
		
		// here we created captcha for security
		$vals = cap_code();
		$captcha = create_captcha($vals);
		$this->session->set_userdata('captcha_code',$captcha['word']);

		// here we created stdClass for send values to other pages
		$data = new stdClass();
		$data->captcha = $captcha;
		$data->title   = 'Login';
		$data->logoname = $this->logoname;
		
		// here we called login page
		$this->load->view("login",$data);

	}


	// this is register page
	public function Register($id ='')
	{
		$query = $this->db->get('settings');
		if($query->num_rows() > 0)
		{
			$company = $query->row();
			if($company->registration != 1)
			{
				redirect(base_url("login/index/off"));
				die();
			}
		}
		
		// here we created captcha for security
		$vals = cap_code();
		$captcha = create_captcha($vals);
		$this->session->set_userdata('captcha_code',$captcha['word']);

		// here we created stdClass for send values to other pages
		$data = new stdClass();
		$data->captcha = $captcha;
		$data->title   = 'Register';
		$data->logoname = $this->logoname;
		
		// here we called view login page
		$this->load->view('register',$data);
	}


	// this is login control page
	public function loginControl()
	{
		
		// here we check which came isset forms with this funtion
		$this->load->library('form_validation');

		// check email
		$this->form_validation->set_rules('email', 'Email', 'required');

		// check password
		$this->form_validation->set_rules('password', 'Password', 'required');

		//check captcha
		$this->form_validation->set_rules('captcha_code', 'Captcha', 'required');

		
		// if this validation will true 
		if($this->form_validation->run() == TRUE)
		{
			// check captcha is true
			if($this->session->userdata('captcha_code') == $this->input->post('captcha_code'))
			{
				$data['email'] = $this->input->post('email');
				$data['password'] = $this->input->post('password');
				

				// here if cookie checked 
				if($this->input->post('cookie_key') != '')
				{	
					// we defined  value of cookie to variable
					$data['cookie_key'] = $this->input->post('cookie_key');
				}
				
				// here we called setUser function. path> login_model
				$this->login_model->setUser($data);

			}else
			{
			
			// If the captcha values are wrong, the following codes will work

			// this method is create captcha array
			$vals = cap_code(); 

			//create captcha
			$captcha = create_captcha($vals); 
			
			//this session need leter thats why created
			$this->session->set_userdata('captcha_code',$captcha['word']);

			// this varibiles we will use on Login.php
			$data['captcha_code_error'] =  'The Captcha Code field is wrong.';
			$data['captcha'] = $captcha;

			// load login page and send $data to this page
			$this->load->view('login',$data);
			}

		}else
		{

			// If the incoming values are wrong, the following codes will work

			// this method is create captcha array
			$vals = cap_code();

			//create captcha
			$captcha = create_captcha($vals);

			//this session need leter thats why created
			$this->session->set_userdata('captcha_code',$captcha['word']);

			// this varibiles we will use on Login.php
			$data['form_error'] =  validation_errors();
			$data['captcha'] = $captcha;

			// load login page and send $data to this page
			$this->load->view('login',$data);
		}
		
	
	}

	// this is register control page
		public function registerControl()
	{

		
		// here we check which came isset forms
		$this->load->library('form_validation');

		// check Name
		$this->form_validation->set_rules('first_name', 'First Name', 'required');

		$this->form_validation->set_rules('last_name', 'Last Name', 'required');

		// check email
		$this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[users.email]');

		// check password
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		//check captcha
		$this->form_validation->set_rules('captcha_code', 'Captcha', 'required');

		// if this validation will true 
		if($this->form_validation->run() == TRUE)
		{
			// check captcha is true
			if($this->session->userdata('captcha_code') == $this->input->post('captcha_code'))
			{
				// we kept of input var
				$data['first_name'] = $this->input->post('first_name');
				$data['last_name'] = $this->input->post('last_name');
				$data['email'] = $this->input->post('email');

				$data['language'] = "english";

				// you can change depends to your company name
				$data['company_id'] = 1;

				//this is value who will be user. Admin or User
				$data['who'] = 'User';

				// here we used func that we made helper/code_helper
				$data['password'] = $this->encrypt->encode($this->input->post('password'));

				// here we got register date. It will need in feature
				$data['created_at'] = date('d/m/Y - H:m:s');

				// here we call register func that we made. model/Login_model
				if($this->login_model->registerUser($data) == true)
				{
					// this method is sending verify code to email
					$this->load->model("sendemail_model");
					if($this->sendemail_model->sendemail($data['email']))
					{
						// if sending is true here we redirect to email verify page
						redirect(base_url("login/indexverifyEmail/sent"));
					}


				}


			}else
			{
			
			// this method is create captcha array  helper/code_helper
			$vals = cap_code(); 

			//create captcha
			$captcha = create_captcha($vals); 
			
			//this session need leter thats why created
			$this->session->set_userdata('captcha_code',$captcha['word']);

			// this varibiles we will use on Login.php
			$data['captcha_code_error'] =  'The Captcha Code field is wrong.';
			$data['captcha'] = $captcha;

			// load login page and send $data to this page
			$this->load->view('register',$data);
			}

		}else
		{

			// this method is create captcha array
			$vals = cap_code();

			//create captcha
			$captcha = create_captcha($vals);

			//this session need leter thats why created
			$this->session->set_userdata('captcha_code',$captcha['word']);

			// this varibiles we will use on Login.php
			$data['form_error'] =  validation_errors();
			$data['captcha'] = $captcha;
			$data['title']   = 'Login';
			$data['logoname'] = $this->logoname;

			$this->load->view('register',$data);

			// load login page and send $data to this page
			//redirect(base_url("login/register"));
		}
		
	
	}

	//this is showing verify email page
	public function indexverifyEmail($value = "")
	{
		$data['title'] = "Email Verify Page";
		$data['logoname'] = $this->logoname;
		
		if($value == "error")
		{
			$data['error_code'] = "Code is wrong. Let's try again!";
		}
		
		$this->load->view("verify-email",$data);

	}

	// this method is checking which came verify code
	public function verifyEmail()
	{

		$id['email_code'] = $this->input->post("email_code");
		$this->load->model("crud_model");
		
		if($this->crud_model->get_data("users",$id))
		{
			$data['email_verified_at'] = date("Y/m/d H:m:s");
			if($this->crud_model->update("users",$data,$id))
			redirect(base_url("login/index/emailverified"));
		}else
		{
			redirect(base_url("login/indexverifyEmail/error"));
		}
	}

	public function test($value='')
	{
		$email = $this->input->post('email');


		$this->load->model("sendemail_model");
		$this->sendemail_model->sendemail($email);
	}




}
