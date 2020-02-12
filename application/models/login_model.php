<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public $table = "users";

	public function __construct()
	{
		parent::__construct();
		
	}

	public function setUser($data)
	{
		if($data != "")
		{
			$value['email'] = $data['email'];
			$value['password'] = $data['password'];

			// we will get datas from db 
			$query = $this->db->select("*")->where($value)->from($this->table)->get();
			
			// if query is true  
			if($query->num_rows()>0)
			{
				$this->session->set_userdata("email",$value['email']);
				echo $data['cookie_key'];
				if($data['cookie_key'] != "")
				{
					$cookie['name'] = "email";
					$cookie['value'] = $value['email'];
					$cookie['expire'] = 60; // 10 days - we will keep cookie

					set_cookie($cookie);
				}


				redirect(base_url("admin/home/index/entered"));
				

			}else
			{
				redirect(base_url('login/index/field'));
			}
		}
	}


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
