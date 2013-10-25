<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$this->load->view('index');
	}
	
	public function login(){
		$this->load->view('login(2)');	
	}
	public function login2()
	{
		
		if (!isset($_POST['name'])){
			$this->index();
		}else{
			$login_details = array(
				'user' => $_POST['name'],
				'pass' => $_POST['pass']
			);
			
			$output = $this->database->login($login_details);
			
			if($output == array()){
				echo 'User or Password invalid!';exit();
				
			}else{
			
				$sess_data = array(
					'user_id' => $output[0]->user_id,
					'access_right' => $output[0]->access_right,
					'profile_id' => $output[0]->profile_id
				);
				
				$this->session->set_userdata($sess_data);
				
				echo 'successful';exit();
			}
		}
	}
	
	public function welcome(){
		
		$this->load->view('welcome_message');	
	}
	
	public function home(){
		$data['category'] = $this->database->category();
		$this->load->view('home', $data);
	
	}
	
	public function logout(){
		$this->session->sess_destroy();

		$this->index();
	}
	public function sudip(){
		$this->load->view('sudip');
	}	
	
}
