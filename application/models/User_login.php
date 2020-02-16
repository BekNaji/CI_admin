<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 
	This class Help to us about session and CooKies 

*/

class User_login extends CI_Model {

	public function __construct()
	{
		parent::__construct();


	}


	//This is user Table name
	private $table = "users";

	//This method is controlling user
	public function isLoggin()
	{
		 if (get_cookie("email") != "") 
		 {
			//we have to got which session isset and we defined to variable
			
			$data['email'] = get_cookie("email");

		 	//here we are controlling that isset sessions value from database
			$query = $this->db->select("*")->where($data)->from($this->table)->get();
			if($query->num_rows > 0)
			{
				
		 		return 1;
				 
		 	}else
		 	{

		 		return 0;
		 	}
			
		 }
		//here we are controlling  sessions user and pass
		if($this->session->userdata("email") != "")
		{
			//we have to got which session isset and we defined to variable
			
			$data['email'] = $this->session->userdata("email");
			
			
			
			//here we are controlling that isset sessions value from database
			$query = $this->db->select("*")->where($data)->from($this->table)->get();
			if($query)
			{
				
				return 1;
				 
			}else
			{

				return 0;
			}

		}else
		{
			return 0 ;
		}
		
		
	}

}