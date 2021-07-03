<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

function __construct(){
	parent::__construct();

}

	public function index()
	{
		if(@$this->session->userdata('user_session')->email){
			redirect("Sistemas");
		}

		$this->load->view('login_page');
	}

	public function autenticar(){
		if($this->input->post('email') && $this->input->post('password')){
            $data = array(
				 "email" => $this->input->post('email'),
				 "password" => $this->input->post('password')
			 );

			 $data_to_string = json_encode($data);


			 $curl_request = curl_init("http://localhost/envirmonitoring/index.php/Login/api/login");
			 curl_setopt($curl_request,CURLOPT_CUSTOMREQUEST , "POST");
			 curl_setopt($curl_request,CURLOPT_HTTPHEADER, array(
				 "X-API-KEY: QWERTY",
				 "Content-Type: application/json"
			 ));
			 curl_setopt($curl_request , CURLOPT_RETURNTRANSFER, TRUE);
			 curl_setopt($curl_request , CURLOPT_POSTFIELDS, $data_to_string);

			 $response = curl_exec($curl_request);
			 if(!$response){
                $response = json_encode(array(
                     "status" => "error",
					 "message" => curl_errno($curl_request)
  				));
			 }
			 curl_close($curl_request);
			 $response = json_decode($response);
			 if($response->status == "success"){
                 $this->session->set_userdata('user_session',$response->data);
					echo var_dump($response->data);
				 redirect('Sistemas');
			 }else{
			 	redirect('login');
                echo var_dump($response);
			 }

		}else{
			redirect('login');
		}
	}

	function logout(){
		$this->session->unset_userdata('user_session');
		$this->session->sess_destroy();
		redirect("login");
	}
}
