<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mediciones extends CI_Controller {

	public function index(){
	    if (!$this->session->userdata('user_session')) {
	        redirect('login');
	    }else{
	    	$this->load->view('mediciones_page');
	    }
	}

}
