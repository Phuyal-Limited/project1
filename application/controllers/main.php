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
			$data['title'] = 'Book | '.$data['book_details'][0]['book_name'];
			//print_r(sizeof($data['shop_details']));exit(); 
			//echo $data['book_details'][1][1][0]->path;exit();
			//print_r(($data['shop_details']));exit();
			$this->load->view('product', $data);
	
		}
		
		
	}
	
	public function search(){
		if($this->input->post('search')==false){
			$this->home();
		}else{
			$srch_txt = $this->input->post('search_text');
			$category = $this->input->post('category');
			
			$data['srch_txt'] = $srch_txt;
			$data['title'] = 'Search | Nepal Reads';
			$data['category'] = $this->database->category();
			$data['details'] = $this->database->author();
			$data['search_result'] = $this->database->search($srch_txt, $category);
			//print_r($data['search_result']);exit();
			$this->load->view('results', $data);
		}
	}
	
	
	public function advance_search(){
		
		$data['title'] = 'Advance Search | Nepal Reads';
		$data['category'] = $this->database->category();
		$data['details'] = $this->database->author();
		//print_r($data['details']);exit();
		$this->load->view('advanced', $data);
	}
	
	public function search_adv(){
		if($this->input->post('search')==false){
			$this->home();
		}else{	
			$srch_txt = $this->input->post('search_text');
			$category = $this->input->post('category');
			$price = $this->input->post('post');
			$author = $this->input->post('author');
			$store = $this->input->post('store_name');
			if($price=='Please Choose...'){
				$price='';
			}
			if(!isset($author)){
				$author='';
			}
			if($author=='All Author'){
				$author='';
			}
			if(!isset($store)){
				$store='';
			}
			if($store=='All Store'){
				$store='';
			}
			
			$data['srch_txt'] = $srch_txt;
			$data['title'] = 'Search | Nepal Reads';
			$data['category'] = $this->database->category();
			$data['details'] = $this->database->author();
			$data['search_result'] = $this->database->adv_search($srch_txt, $category, $price, $author, $store);
			//print_r($data['details']);exit();
			$this->load->view('results', $data);
		}
	}
	
	

	
}
