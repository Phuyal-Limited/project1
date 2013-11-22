<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		//$this->load->view('index');
		$data['title'] = 'Home';
		$data['newest'] = $this->database->newest();
		$data['category'] = $this->database->category();
		$this->load->view('home', $data);
	
	}
	
	
	public function home(){
		$data['title'] = 'Home';
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

	public function _update_cart(){
		//Updating the quantity and Removing the products
		if(isset($_POST['remove'])){

			$remove_stock=array_keys($_POST['remove']);
		}
		else
		{
			$remove_stock=array();
		}
		$cart = $this->session->userdata('cart');
		$newCart=array();
		foreach ($cart as $cartItem) {
			$newCartItem=$cartItem;
			if(!(in_array($cartItem['stockID'], $remove_stock))){
				$newCartItem['qty'] = $_POST['qtt'][$cartItem['stockID']];
				array_push($newCart, $newCartItem);
			}
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
	
	public function cat_product(){
		if(!isset($_GET['cat_id'])){
		
		}else{
			$cat_id = $_GET['cat_id'];
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

	
}
