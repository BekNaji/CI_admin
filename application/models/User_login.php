<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 
	This class Help to us about session and Coocies 

*/

class User_login extends CI_Model {


	//This is user Table name
	private $table = "users";

	//This method is controlling user
	public function isLoggin()
	{
		//here we are controlling do isset sessions user and pass
		if($this->session->userdata("user") != "" and $this->session->userdata("pass") != "")
		{
			//we have to got which session isset and we defined to variable
			$data = new stdClass();
			$data->user = $this->session->userdata("user");
			$data->pass = $this->session->userdata("pass");
			$data->key  = $this->session->userdata("key");

			//here we are controlling that isset sessions value from database
			$query = $this->db->select("*")->where($data)->from($this->table)->get();
			if($query)
			{
				
				return true;
				 
			}else
			{

				return false;
			}

		}
		
		if(!$query)
		{
			
		}
	}

}