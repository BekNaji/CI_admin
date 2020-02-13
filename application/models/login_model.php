<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public $table = "users";

	public function __construct()
	{
		parent::__construct();
		
	}

	// this function  set User session
	public function setUser($data)
	{
		// if data isset
		if($data != "")
		{
			// here we defined values  to variable
			$value['email'] = $data['email'];
			$value['password'] = $data['password'];

			// we will get datas from db 
			$query = $this->db->select("*")->where($value)->from($this->table)->get();
			
			// if query is true  
			if($query->num_rows()>0)
			{
				// here we defined user session 
				$this->session->set_userdata("email",$value['email']);
				
				// if cookei key isset we will set cookie session
				if($data['cookie_key'] != "")
				{
					$cookie['name'] = "email";
					$cookie['value'] = $value['email'];
					$cookie['expire'] = 60; // 10 days - we will keep cookie

					// here we set cookie
					set_cookie($cookie);
				}

				// redirect admin home page
				redirect(base_url("admin/home/index/entered"));
				

			}else
			{
				// if pass or email is wrong. redirect to login page
				redirect(base_url('login/index/field'));
			}
		}
	}


	// this funtion register  is getting user option who apply to this system
	public function registerUser($data)
	{
		
		if($data != "")
		{
			$query = $this->db->insert($this->table,$data);
			if($query)
			{
				echo "Kaydiniz Alınmıştır";
				return true;
			}else
			{
				return false;
			}
		}
	}


}
