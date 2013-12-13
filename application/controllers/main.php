<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		//$this->load->view('index');
		$data['title'] = 'Home';
		$data['home_data'] = $this->database->home_data();
		$data['newest'] = $this->database->newest();
		$data['category'] = $this->database->category();
		$this->load->view('home', $data);
	
	}
	
	
	public function home(){
		$data['title'] = 'Home';
		$data['home_data'] = $this->database->home_data();
		$data['newest'] = $this->database->newest();
		$data['category'] = $this->database->category();
		$this->load->view('home', $data);
	
	}

	public function error(){
		$data['title'] = 'Error | Nepal Reads';
		$data['category'] = $this->database->category();
		$this->load->view('error', $data);
	
	}

	public function thank_you(){
  		if(isset($_POST['StatusCode'])){
			$data['title'] = 'thank_you | Nepal Reads';
  			$data['category'] = $this->database->category();
  			$status = $_POST['StatusCode'];
			if($status == 0){
				$confirm_code = $_POST['Message'];
				$confirm_code = explode(': ', $confirm_code);
				$data['message'] = $confirm_code[1];
   				$order=$this->session->userdata('order');
   				$cart=$this->session->userdata('cart');
				
				$this->database->cart($order, $cart, $confirm_code[1]);
   				
				$this->session->unset_userdata('cart');
   				$this->load->view('thank_you', $data); 
  			}
  			else{
   				redirect('error');;
  			}
		}else{
   			redirect('error');;
  		}
		
 
 	}

	public function view_cart(){
		if(isset($_POST['Update'])){
			$this->_update_cart();
		}
		$data['title'] = 'Shopping Cart | Nepal Reads';
		$data['category'] = $this->database->category();
		$data['Cart'] = $this->database->get_cart_details();
		if($this->session->userdata('order')){
			$order=$this->session->userdata('order');
		}
		else{
			$order = array('name' => '', 'email' => '','phone' => '','billing' => '','delivery' => '','note'=>'');
		}
		$data['order'] = $order;
		$this->load->view('view_cart', $data);
	
	}

	//ajax update
	public function update(){
		if(!isset($_POST['remove']) && !isset($_POST['qtt'])){
			redirect('home');
		}
		$remove = $_POST['remove'];
		$qty = $_POST['qtt'];
		$stock_id = $_POST['stock_id'];
		$this->_update_cart($remove, $qty, $stock_id);
		$cart = $this->database->get_cart_details();
		
		print_r(json_encode($cart));
	}

	public function _update_cart($remove, $qty, $stock_id){
		//Updating the quantity and Removing the products
		$cart = $this->session->userdata('cart');
		$newCart=array();
		foreach ($cart as $cartItem) {
			if($stock_id != $cartItem['stockID']){
				$newCartItem=$cartItem;
			}else{
				if($remove == 1){
					continue;
				}else{
					$newCartItem['stockID'] = $cartItem['stockID'];
					$newCartItem['qty'] = $qty;
				}
			}
			array_push($newCart, $newCartItem);
		}
		$this->session->unset_userdata('cart');
		$this->session->set_userdata('cart',$newCart);
		$this->_calculate_cart();
	}

	public function _calculate_cart(){
		if(!($this->session->userdata('cart'))){
			return;
		}
		$cart = $this->database->get_cart_details();
		$tot=0;
		foreach ($cart as $cartItem) {
			$tot += $cartItem['qty']*$cartItem['stock']['price'];
		}
		$this->session->unset_userdata('cartTot');
		$this->session->set_userdata('cartTot',$tot);
	}

	public function check_out(){
		if(!(isset($_POST['confirm']) || $this->session->userdata('order'))){
			$data['title'] = 'Home';
			$data['category'] = $this->database->category();
			$this->load->view('home', $data);
			return;
		}
		if(isset($_POST['confirm'])){
			$order=$_POST;
			unset($order['confirm']);
			$this->session->set_userdata('order',$order);
		}
		else
		{
			$order=$this->session->userdata('order');
		}
		$data['title'] = 'Check Out | Nepal Reads';
		$data['category'] = $this->database->category();
		$data['order'] = $order;
		$data['cart_det'] = $this->database->get_cart_details();
		$this->_calculate_cart();
		$data['cart_total'] = $this->session->userdata('cartTot');

		require_once ("PaymentFormHelper.php");
		include ("Config.php");

		$Width = 800;
		$FormAction = "https://mms.".$PaymentProcessorDomain."/Pages/PublicPages/PaymentForm.aspx";
		$data['FormAction']=$FormAction;
		// the amount in *minor* currency (i.e. £10.00 passed as "1000")
		$szAmount = $this->session->userdata('cartTot');
		$data['szAmount']=$szAmount;
		// the currency	- ISO 4217 3-digit numeric (e.g. GBP = 826)
		$szCurrencyCode = strval(826);
		$data['szCurrencyCode']=$szCurrencyCode;
		// order ID
		$szOrderID = "Nepalreads Book Order";
		$data['szOrderID']=$szOrderID;
		// the transaction type - can be SALE or PREAUTH
		$szTransactionType = "SALE";
		$data['szTransactionType']=$szTransactionType;
		// the GMT/UTC relative date/time for the transaction (MUST either be in GMT/UTC 
		// or MUST include the correct timezone offset)
		$szTransactionDateTime = date('Y-m-d H:i:s P');
		$data['szTransactionDateTime']=$szTransactionDateTime;
		// order description
		$szOrderDescription = "Book Order";
		$data['szOrderDescription']=$szOrderDescription;
		// these variables allow the payment form to be "seeded" with initial values
		$szCustomerName = $order['name'];
		$data['szCustomerName']=$szCustomerName;
		$szAddress1 = "";
		$data['szAddress1']=$szAddress1;
		$szAddress2 = "";
		$data['szAddress2']=$szAddress2;
		$szAddress3 = "";
		$data['szAddress3']=$szAddress3;
		$szAddress4 = "";
		$data['szAddress4']=$szAddress4;
		$szCity = "";
		$data['szCity']=$szCity;
		$szState = "";
		$data['szState']=$szState;
		$szPostCode = "";
		$data['szPostCode']=$szPostCode;
		// the country code - ISO 3166-1  3-digit numeric (e.g. UK = 826)
		$szCountryCode = strval(826);
		$data['szCountryCode']=$szCountryCode;
		// use these to control which fields on the hosted payment form are
		// mandatory
		$szCV2Mandatory = PaymentFormHelper::boolToString(true);
		$data['szCV2Mandatory']=$szCV2Mandatory;
		$szAddress1Mandatory = PaymentFormHelper::boolToString(false);
		$data['szAddress1Mandatory']=$szAddress1Mandatory;
		$szCityMandatory = PaymentFormHelper::boolToString(false);
		$data['szCityMandatory']=$szCityMandatory;
		$szPostCodeMandatory = PaymentFormHelper::boolToString(false);
		$data['szPostCodeMandatory']=$szPostCodeMandatory;
		$szStateMandatory = PaymentFormHelper::boolToString(false);
		$data['szStateMandatory']=$szStateMandatory;
		$szCountryMandatory = PaymentFormHelper::boolToString(true);
		$data['szCountryMandatory']=$szCountryMandatory;
		// the URL on this system that the payment form will push the results to (only applicable for 
		// ResultDeliveryMethod = "SERVER")
		if ($ResultDeliveryMethod != "SERVER")
		{
			$szServerResultURL = base_url('thank_you');
		}
		else
		{
			$szServerResultURL = PaymentFormHelper::getSiteSecureBaseURL()."ReceiveTransactionResult.php";
		}
		$data['szServerResultURL']=$szServerResultURL;
		// set this to true if you want the hosted payment form to display the transaction result
		// to the customer (only applicable for ResultDeliveryMethod = "SERVER")
		if ($ResultDeliveryMethod != "SERVER")
		{
			$szPaymentFormDisplaysResult = base_url('thank_you');
		}
		else
		{
			$szPaymentFormDisplaysResult = PaymentFormHelper::boolToString(false);
		}
		$data['szPaymentFormDisplaysResult']=$szPaymentFormDisplaysResult;
		// the callback URL on this site that will display the transaction result to the customer
		// (always required unless ResultDeliveryMethod = "SERVER" and PaymentFormDisplaysResult = "true")
		if ($ResultDeliveryMethod == "SERVER" && PaymentFormHelper::stringToBool($szPaymentFormDisplaysResult) == false)
		{
			$szCallbackURL = "http://paymentgatewayuk.com/PHP/HostedSample/DisplayTransactionResult.php";
		}
		else
		{
			$szCallbackURL = base_url('thank_you');
		}
		$data['szCallbackURL']=$szCallbackURL;
		// get the string to be hashed
		$szStringToHash = PaymentFormHelper::generateStringToHash($MerchantID,
				        										  $Password,
				        										  $szAmount,
																  $szCurrencyCode,
																  $szOrderID,
																  $szTransactionType,
																  $szTransactionDateTime,
																  $szCallbackURL,
																  $szOrderDescription,
																  $szCustomerName,
																  $szAddress1,
																  $szAddress2,
																  $szAddress3,
																  $szAddress4,
																  $szCity,
																  $szState,
																  $szPostCode,
																  $szCountryCode,
																  $szCV2Mandatory,
																  $szAddress1Mandatory,
																  $szCityMandatory,
																  $szPostCodeMandatory,
																  $szStateMandatory,
																  $szCountryMandatory,
																  $ResultDeliveryMethod,
																  $szServerResultURL,
																  $szPaymentFormDisplaysResult,
				         		                                  $PreSharedKey,
				         		                                  $HashMethod);

		// pass this string into the hash function to create the hash digest
		$szHashDigest = PaymentFormHelper::calculateHashDigest($szStringToHash,
	                        								   $PreSharedKey, 
	                        								   $HashMethod);
		$data['szHashDigest']=$szHashDigest;
		$data['ResultDeliveryMethod']=$ResultDeliveryMethod;
		$data['MerchantID']=$MerchantID;
		$this->load->view('check_out', $data);		
	}
	
	public function category(){
		$cat_id = intval($this->uri->segment(2));
		if(empty($cat_id) || !is_int($cat_id)){
			redirect('home');
		}else{
			$data['title'] = 'Books';
			$data['category'] = $this->database->category();
			$data['book_details'] = $this->database->book_details($cat_id);
			$data['cat_id'] = $cat_id;
			$this->load->view('cat_product', $data);
	
		}
		
		
	}
	
	public function books(){
		if(isset($_POST['Cart'])){
			$stock_ID=$this->input->post('stock_id');
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
			$cart = $this->session->userdata('cart');
            $count= count($cart);

            //if from books page redirect to cart page
            if(isset($_POST['books_page']) && $_POST['books_page']=='1'){
            	redirect('view_cart');
            }else{
            	echo $count;exit();
            }
		}
		$book_id = intval($this->uri->segment(2));
		if(empty($book_id) || !is_int($book_id)){
			redirect('home');		
		}else{
			$rating = $this->database->average_rating($book_id);
			if($rating['rating']==''){
				$data['rating'] = array('rating'=> 0);
			}else{
				$data['rating'] = array('rating' => round($rating['rating'],2));
			}
			$data['rated_booksIDs'] = $this->session->userdata('rated_books');
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

			if($category=='All Category'){
				$data['category_IDs'] = array();	
			}else{
				$data['category_IDs'] = array('0'=>$category);
			}
			
			$data['store_IDs'] = array();
			$data['authors'] = array();
			$data['price_range'] = 'No Preferences';

			$data['prices'] = array(
				"0" => 100,
				"1" => 200,
				"2" => 500,
				"3" => 750,
				"4" => 1000,
				"5" => 1500,
				"6" => 2000,
				"7" => 'No Preferences'
			);
			$data['search_details'] = array(
				'category' => $category,
				'price' => 'N/A',
				'author' => 'N/A',
				'store' => 'N/A'
			);
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
			$price = $this->input->post('price');
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

			if($category=='All Category'){
				$data['category_IDs'] = array();
			}else{
				$data['category_IDs'] = array('0'=>$category);
			}

			if($store==''){
				$data['store_IDs'] = array();	
			}else{
				$data['store_IDs'] = array('0'=>$store);
			}

			if($author==''){
				$data['authors'] = array();
			}else{
				$data['authors'] = array('0'=>$author);
			}

			if($price==''){
				$data['price_range'] = 'No Preferences';
			}else{
				$data['price_range'] = $price;
			}

			$data['prices'] = array(
				"0" => 100,
				"1" => 200,
				"2" => 500,
				"3" => 750,
				"4" => 1000,
				"5" => 1500,
				"6" => 2000,
				"7" => 'No Preferences'
			);

			$data['search_details'] = array(
				'category' => $category,
				'price' => $price,
				'author' => $author,
				'store' => $store
			);
			//print_r($data['details']);exit();
			$this->load->view('results', $data);
		}
	}
	
	public function info(){
		if(!isset($_POST['book_id'])){
			$this->index();
		}else{
			$book_id = $_POST['book_id'];
			$book_details = $this->database->book_particular($book_id);
			$shop_details = $this->database->shop_details($book_id);
			$stock_id= array();
			if(($this->session->userdata('cart'))){
                $cart = $this->session->userdata('cart');
               for($i=0;$i<sizeof($cart);$i++){
               		$stock_id[$i] = $cart[$i]['stockID'];
               }
            }
            
			$all = array($book_details, $shop_details, $stock_id);

			print_r(json_encode($all));exit();
			
		}

	}

	public function filter(){
		if($this->input->post('submit')==false){
			redirect('home');
		}else{

			$srch_txt = $this->input->post('search_text');
			$srch_category = $this->input->post('category');
			$srch_price = $this->input->post('price');
			$srch_author = $this->input->post('author');
			$srch_store = $this->input->post('store');

			if($srch_price=='N/A'){
				$result = $this->database->search($srch_txt, $srch_category);
			}else{
				$result = $this->database->adv_search($srch_txt, $srch_category, $srch_price, $srch_author, $srch_store);
			}
			
			$category_list = $this->input->post('category_list');
			$store_list = $this->input->post('store_list');
			$author_list = $this->input->post('author_list');
			$price = $this->input->post('price_range');

			$category = explode(',', $category_list);
			$store = explode(',', $store_list);
			$author = explode(',', $author_list);


			$price_filter = array();
			$book_details = array();
			$image_details = array();

			//price filter
			if($price=='No Preferences'){
				$price_filter = $result;
			}else{
				for($i=0;$i<sizeof($result[0]);$i++){
					if($result[0][$i]['price']<=$price){
						array_push($book_details, $result[0][$i]);
						array_push($image_details, $result[1][$i]);
					}

				}
				$price_filter = array($book_details, $image_details);
			}

			
			$x=0;
			$category_filter = array();
			$book_details = array();
			$image_details = array();
			//category filter
			if($category[0]==''){
				$category_filter = $price_filter;
			}else{
				for($i=0;$i<sizeof($price_filter[0]);$i++){
					$category_id = $price_filter[0][$i]['category_id'];
					$category_IDs = explode(',', $category_id);
					foreach ($category as $value) {
						foreach ($category_IDs as $ids) {
							if($ids==$value){
								
								array_push($book_details, $price_filter[0][$i]);
								array_push($image_details, $price_filter[1][$i]);
								$x=1;
								break;
							}
						}
						if($x==1){
							$x=0;
							break;
						}
					}
				}
				$category_filter = array($book_details, $image_details);
			}

			$x=0;
			$author_filter = array();
			$book_details = array();
			$image_details = array();

			//author filter
			if($author[0]==''){
				$author_filter = $category_filter;
			}else{
				for($i=0;$i<sizeof($category_filter[0]);$i++){
					$author_names = $category_filter[0][$i]['author'];
					$name_array = explode(', ', $author_names);
					foreach ($author as $value) {
						
						foreach ($name_array as $eachname) {
							if($eachname == $value){
								array_push($book_details, $category_filter[0][$i]);
								array_push($image_details, $category_filter[1][$i]);
								$x=1;
								break;	
							}
						}
						if($x==1){
							$x=0;
							break;
						}
					}
				}
				$author_filter = array($book_details, $image_details);
			}

			$store_filter = array();
			$book_details = array();
			$image_details = array();

			//store filter
			if($store[0]==''){
				$store_filter = $author_filter;
			}else{
				for($i=0;$i<sizeof($author_filter[0]);$i++){
					foreach ($store as $value) {
						
						if($value == $author_filter[0][$i]['store']){
							array_push($book_details, $author_filter[0][$i]);
							array_push($image_details, $author_filter[1][$i]);
							break;
						}
					}
				}
				$store_filter = array($book_details, $image_details);
			}
			
			$data['prices'] = array(
				"0" => 100,
				"1" => 200,
				"2" => 500,
				"3" => 750,
				"4" => 1000,
				"5" => 1500,
				"6" => 2000,
				"7" => 'No Preferences'
			);

			$data['search_details'] = array(
				'category' => $srch_category,
				'price' => $srch_price,
				'author' => $srch_author,
				'store' => $srch_store
			);

			$data['srch_txt'] = $srch_txt;
			$data['title'] = 'Search | Nepal Reads';
			$data['category'] = $this->database->category();
			$data['details'] = $this->database->author();
			$data['search_result'] = $store_filter;

			$data['category_IDs'] = $category;
			$data['store_IDs'] = $store;
			$data['authors'] = $author;
			$data['price_range'] = $price;
			//print_r($data['details']);exit();
			$this->load->view('results', $data);

			
		}
	}

	public function rating(){
		if(!isset($_POST['rate'])){
			redirect('home');
		}else{
			$rate_data = array(
				'book_id' => $_POST['book_id'],
				'rating' => $_POST['rate']
			);
			$this->database->add_rating($rate_data);

			$books = array();
			if($this->session->userdata('rated_books')){
				$books = $this->session->userdata('rated_books');
			}
			if($books == array()){
				$ids = array($rate_data['book_id']);
				$this->session->set_userdata('rated_books',$ids);	
			}else{
				array_push($books, $rate_data['book_id']);
				$this->session->unset_userdata('rated_books');
				$this->session->set_userdata('rated_books',$books);
			}

			$rating = $this->database->average_rating($rate_data['book_id']);
			$rate = round($rating['rating'], 2);
			echo 'Thank you for rating/'.$rate;exit();

		}
	}

	
}
