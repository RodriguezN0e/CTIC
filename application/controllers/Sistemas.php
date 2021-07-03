<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sistemas extends CI_Controller {


	public function index(){
	    if (!$this->session->userdata('user_session')) {
	        redirect('login');
	    }else{
	    	$this->load->view('sistemas_page');
	    }
	}

	// public function index(){
	// 	$this->load->view('sistemas_page');
	// }


}
