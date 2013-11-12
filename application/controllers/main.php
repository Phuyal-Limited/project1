<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		//$this->load->view('index');
		$data['title'] = 'Home';
		$data['category'] = $this->database->category();
		$this->load->view('home', $data);
	
	}
	
	
	public function home(){
		$data['title'] = 'Home';
		$data['category'] = $this->database->category();
		$this->load->view('home', $data);
	
	}

	public function error(){
		$data['title'] = 'Error | Nepal Reads';
		$data['category'] = $this->database->category();
		$this->load->view('error', $data);
	
	}

	public function thank_you(){
		$data['title'] = 'thank_you | Nepal Reads';
		$data['category'] = $this->database->category();
		$this->load->view('thank_you', $data);
	
	}

	public function view_cart(){
		if(isset($_POST['update'])){
			
		}
		$data['title'] = 'Shopping Cart | Nepal Reads';
		$data['category'] = $this->database->category();
		$data['Cart'] = $this->database->get_cart_details();
		$this->load->view('view_cart', $data);
	
	}

	public function _update_cart(){

	}

	public function check_out(){
		$data['title'] = 'Check Out | Nepal Reads';
		$data['category'] = $this->database->category();
		$this->load->view('check_out', $data);
	
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
		if(isset($_POST['Cart'])){
			$stock_ID=$this->input->post('book_id');
			$qty=$this->input->post('qty');
			$cartItem= array('stockID' => $stock_ID, 'qty' => $qty);
			if(!($this->session->userdata('cart'))){
				$cart = array($cartItem);
				$this->session->set_userdata('cart',$cart);
			}
			else
			{
				$cart = $this->session->userdata('cart');
				array_push($cart, $cartItem);
				$this->session->unset_userdata('cart');
				$this->session->set_userdata('cart',$cart);
			}
		}
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
