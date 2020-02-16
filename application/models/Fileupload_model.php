<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fileupload_model extends CI_Model {

	public function ImageUpload($value = "")
	{
                $name = rand(1111,9999);
        	$config['upload_path']          = "assets/images/admin/";
                $config['allowed_types']        = 'gif|jpg|png';
                $config['file_name']            =  $name;
                // $config['max_size']             = 100;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload($value))
                {
                $error = array('error' => $this->upload->display_errors());

                return $error;
                }
                else
                {
                        $this->load->model("crud_model");
                        $this->load->model("fileupload_model");
                        $company  = $this->crud_model->get_data($this->company);
                        $d = @unlink($company->logo);

                        $data = array('upload_data' => $this->upload->data());

                        return "assets/images/admin/".$data['upload_data']['file_name'];
                }       

}
}
