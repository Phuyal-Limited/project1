<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$this->load->view('index');
	}
	
	
	public function home(){
		$data['category'] = $this->database->category();
		$this->load->view('home', $data);
	
	}
	

	
}
