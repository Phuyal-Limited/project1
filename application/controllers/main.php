<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$this->load->view('index');
	}
	
	
	public function home(){
		$data['title'] = 'Home';
		$data['category'] = $this->database->category();
		$this->load->view('home', $data);
	
	}
	
	public function cat_product(){
		if(!isset($_GET['cat_id'])){
		
		}else{
			$cat_id = $_GET['cat_id'];
			$data['title'] = 'Books';
			$data['category'] = $this->database->category();
			$data['book_details'] = $this->database->book_details($cat_id);
			//echo $data['book_details'][1][1][0]->path;exit();
			//print_r(($data['book_details']));exit();
			$this->load->view('cat_product', $data);
	
		}
		
		
	}
	
	public function product(){
		if(!isset($_GET['book_id'])){
		
		}else{
			$book_id = $_GET['book_id'];
			
			$data['category'] = $this->database->category();
			$data['book_details'] = $this->database->book_particular($book_id);
			$data['shop_details'] = $this->database->shop_details($book_id);
			$data['title'] = 'Book | '.$data['book_details'][0][0]->book_name;
			//print_r(sizeof($data['shop_details']));exit(); 
			//echo $data['book_details'][1][1][0]->path;exit();
			//print_r(($data['book_details']));exit();
			$this->load->view('product', $data);
	
		}
		
		
	}

	
}
