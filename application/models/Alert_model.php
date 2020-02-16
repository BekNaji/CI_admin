<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alert_model extends CI_Model {

	function alert($url="")
	{
		switch ($url) {
			case 'free':
				$alert 		= 'alert alert-warning';

				$subject	= $this->lang->line("free");
				$text		= '';
				break;

			case 'erroruser':
				$alert 		= 'alert alert-danger';
				$subject	= $this->lang->line("erroruser");
				$text		= '';
				break;

			case 'saved':
				$alert 		= 'alert alert-success';
				$subject	= $this->lang->line("saved");
				$text		= '';
				break;
			case 'unsaved':
				$alert 		= 'alert alert-danger';
				$subject	= $this->lang->line("unsaved");
				$text		= $this->lang->line("unsaved_text");
				break;
			case 'updated':
				$alert 		= 'alert alert-success';
				$subject	= $this->lang->line("updated");
				$text		= '';
				break;

			case 'unupdated':
				$alert 		= 'alert alert-danger';
				$subject	= $this->lang->line("unupdated");
				$text		= $this->lang->line("unupdated_text");
				break;

			case 'has':
				$alert 		= 'alert alert-warning';
				$subject	= $this->lang->line("has");
				$text		= '';
				break;

			case 'unenter':
				$alert 		= 'alert alert-warning';
				$subject	= $this->lang->line("unenter");
				$text		= $this->lang->line("unenter_text");
				break;
			case 'deleted':
				$alert 		= 'alert alert-success';
				$subject	= $this->lang->line("deleted");
				$text		= '';
				break;		
				
					
				
			
			
			
			default:
				$alert 		= '';
				$subject	= '';
				$text		= '';
				break;
		}

		return $message = '<div class="'.$alert.'">
				<strong>'.$subject.'</strong>'.@$text.'
			</div>';
	}


}
