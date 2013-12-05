<?php

class Database extends CI_Model{
	public function login($data){
		$user = $data['user'];
		$pass = $data['pass'];
		$output = $this->db->query("SELECT * FROM `user` WHERE `user_name`='$user' && `password`='$pass'");
		return $output->result();
	}
	
	public function random($tablename){
			
            $i=0;
            $IDs = array();
            $result = array();
            $x=1;
            $qry = $this->db->query("SELECT * FROM $tablename");
            $qry = $qry->result();
            $n = 12;
            for($x=0;$x<sizeof($qry);$x++){
            	array_push($IDs, $qry[$x]->book_id);
            	$i++;
            }
            if(sizeof($IDs)<=$n){
                if(sizeof($IDs)==0){
                    return array();
                }
                else{
                	$n=sizeof($IDs);
                }
                
            }
            shuffle($IDs);
            array_rand($IDs);
            for($x=0;$x<$n;$x++){
            	array_push($result, $IDs[$x]);
            }
            
            return $result;
	}

	public function home_data(){
		$result = $this->random('shopstock');
		$books = array();
		$images = array();
		for($i=0;$i<sizeof($result);$i++){
			$id = $result[$i];
			$book_details = $this->db->query("SELECT * FROM `books` WHERE book_id='$id'");
			$book_details = $book_details->result();
			array_push($books, get_object_vars($book_details[0]));

			$img_id = $book_details[0]->image_id;
			$image_details = $this->db->query("SELECT * FROM `images` WHERE image_id='$img_id'");
			$image_details = $image_details->result();
			array_push($images, get_object_vars($image_details[0]));
		}
		$all = array($books, $images);
		return $all;
	}

	public function getbook_id($stkid){
		
		$output = $this->db->query("SELECT * FROM `shopstock` WHERE `stock_id`='$stkid'");
		return $output->result();
	}

	public function newest(){
		$stock = $this->db->query("SELECT DISTINCT `book_id` FROM `shopstock`");
		$stock = $stock->result();
		$newest = array();
		$image_array = array();
		for($i=0;$i<sizeof($stock);$i++){
			$book_id = $stock[$i]->book_id;
			$output = $this->db->query("SELECT * FROM `books`");
			$output = $output->result();	
			
			for($j=0;$j<sizeof($output);$j++){
				$id = $output[$j]->book_id;
				
				if($id==$book_id){
					
						array_push($newest, get_object_vars($output[$j]));
						$image_id = $output[$j]->image_id;
						$image_details = $this->db->query("SELECT * FROM `images` WHERE image_id='$image_id'");
						$image_details = $image_details->result();
						array_push($image_array, get_object_vars($image_details[0]));
					
				}
			}
		}
		$temp = array();
		$temp_img = array();
		  for($i=0;$i<sizeof($newest);$i++){
		   for($j=$i+1;$j<sizeof($newest);$j++){
		    if($newest[$i]['published_date']>$newest[$j]['published_date']){
		     //nothing
		    }else{
		     $temp = $newest[$i];
		     $newest[$i] = $newest[$j];
		     $newest[$j] = $temp;

		     $temp_img = $image_array[$i];
		     $image_array[$i] = $image_array[$j];
		     $image_array[$j] = $temp_img;
		    }
		    
		   }
		  }
		  
		  $all = array($newest, $image_array);
		  return $all;
	}

	public function category(){
		$output = $this->db->query("SELECT * FROM `category`");
		return $output->result();	
	}
	
	public function author(){
		$output = $this->db->query("SELECT * FROM `books`");
		$output1 = $this->db->query("SELECT * FROM `bookshop`");
		$output = $output->result();
		$output1 = $output1->result();
		
		$books = array();
		$bookshop = array();
		$arr_author = array();
		$name = array();
		//to get the author list only
		for($i=0;$i<sizeof($output);$i++){
			$books[$i] = get_object_vars($output[$i]);
			$author = $books[$i]['author'];
			$author_array = explode(', ', $author);
			for($j=0;$j<sizeof($author_array);$j++){
				array_push($arr_author, $author_array[$j]);
			}
		}
		//to get the bookshop name only
		for($i=0;$i<sizeof($output1);$i++){
			$bookshop[$i] = get_object_vars($output1[$i]);
			array_push($name, $bookshop[$i]['name']);
			
		}
		//remove the duplicate element
		$arr_author = array_unique($arr_author);
		$name = array_unique($name);
		
		$author_list = array();
		$names = array();
		foreach($arr_author as $key => $value){
   			array_push($author_list, $value);
		}
		
		foreach($name as $key => $value){
   			array_push($names, $value);
		}
		
		$result = array($author_list, $names);
		return 	$result;
	}
	
	public function search_book($isbn){
		$output = $this->db->query("SELECT * FROM `books` WHERE isbn10='$isbn' OR isbn13='$isbn'");
		return $output->result();
	}
	
	public function book_details($cat_id){
		$output = array();
		$books = array();
		$bookid_list = array();
		$list_book = array();
		//check if the book is on the stock or not
		$stock_result = $this->db->query("SELECT * FROM `shopstock`");
		$stock_result = $stock_result->result();

		for($i=0;$i<sizeof($stock_result);$i++){

			$book_id = $stock_result[$i]->book_id;
			$book_result = $this->db->query("SELECT * FROM `books` WHERE book_id='$book_id' ORDER BY `book_id` ASC");
			$book_result = $book_result->result();
			
			array_push($books, get_object_vars($book_result[0]));
			array_push($bookid_list, $books[$i]['book_id']);
		}
		$bookid_list = array_unique($bookid_list);
		foreach($bookid_list as $key => $value){
   			array_push($list_book, $value);
		}
		for($j=0;$j<sizeof($list_book);$j++){
			$count=0;
			for($k=0;$k<sizeof($books);$k++){
				if(($list_book[$j]==$books[$k]['book_id']) && $count==0){
					array_push($output, $books[$k]);
					$count=1;
				}
			}

		}

		
		$book_details = array();
		$image_details = array();
		$price_all = array();
		$x=0;
		if($output==array()){
			$all_info = array('0'=>array(), '1'=>array());
		}else{
			for($i=0;$i<sizeof($output);$i++){
				
				

				$category_id = $output[$i]['category_id'];
				$category_id = explode(",", $category_id);
				for($j=0;$j<sizeof($category_id);$j++){
					if($cat_id == $category_id[$j]){
						$book_details[$x] = $output[$i];
						
						$id = $output[$i]['book_id'];

						//get the cheepest price of the book
						$price = $this->db->query("SELECT `price` FROM `shopstock` WHERE book_id='$id' ORDER BY `price` ASC LIMIT 1");
						$price = $price->result();
						$price = $price[0]->price;
						array_push($price_all, $price);

						$img_id = $output[$i]['image_id'];
						
						$image_info = $this->db->query("SELECT * FROM `images` WHERE `image_id` = '$img_id'");
						$image_info = $image_info->result();
						$image_details[$x] = get_object_vars($image_info[0]);
						$x++;
					}
				}
			}
			
			$all_info = array($book_details, $image_details, $price_all);
			
		}//print_r($all_info);exit();
		return $all_info;
	}
	
	public function get_cart_details()
	{
		$output = array();
		if(($this->session->userdata('cart'))){
	        $cart = $this->session->userdata('cart');
	        foreach ($cart as $cartItem) {
	        	$cartItemDet=array();
	        	$stockID=$cartItem['stockID'];
	        	$stock_res=$this->db->query("SELECT * FROM `shopstock` WHERE `stock_id` = '$stockID'");
	        	$stock = $stock_res -> result();
	        	$stock = get_object_vars($stock[0]);
	        	$cartItemDet['stock'] = $stock;
	        	$cartItemDet['book'] = $this->book_particular($stock['book_id']);
	        	$cartItemDet['qty'] = $cartItem['qty'];
	        	$shop_res=$this->db->query("SELECT `name` FROM `bookshop` WHERE `shop_id` = $stock[store]");
	        	$shop = $shop_res -> result();
	        	$shop = get_object_vars($shop[0]);
	        	$cartItemDet['shop'] = $shop['name'];
	        	array_push($output, $cartItemDet);
	        }
	      }
	    return $output;
	}

	public function book_particular($book_id){
		$output = $this->db->query("SELECT * FROM `books` WHERE `book_id` = '$book_id'");
		$book_details = $output->result();
		$book_details = get_object_vars($book_details[0]);	
		
		$category_id = $book_details['category_id'];
		$category_id = explode(",", $category_id);
		$cat = array();
				
		for($j=0;$j<sizeof($category_id);$j++){
					
			$cat_id = $category_id[$j];
						
			$category = $this->db->query("SELECT * FROM `category` WHERE category_id='$cat_id'");
			$category = $category->result();
						
			$category = get_object_vars($category[0]);
			$cat[$j] = $category['name'];
						
		}
		
		
		$img_id = $book_details['image_id'];
		$image_info = $this->db->query("SELECT * FROM `images` WHERE `image_id` = '$img_id'");
		$image_info = $image_info->result();
		$image_info = get_object_vars($image_info[0]);
		
		$all_info = array($book_details, $image_info, $cat);
		return $all_info;
	}
	
	public function shop_details($book_id){
		$output = $this->db->query("SELECT * FROM `shopstock` WHERE `book_id` = '$book_id' ORDER BY book_id ASC");
		$stock_details = $output->result();
		$stock_all = array();
		$abt_shop = array();
		
		for($j=0;$j<sizeof($stock_details);$j++){
			$stock_all[$j] = get_object_vars($stock_details[$j]);
		
			$shop_id = $stock_all[$j]['store'];
			$shop_details = $this->db->query("SELECT * FROM `bookshop` WHERE `shop_id` = '$shop_id'");
			$shop_details = $shop_details->result();
			$abt_shop[$j] = get_object_vars($shop_details[0]);
			
		}
		
		$all = array($stock_all, $abt_shop);
		return $all;
	}
	
	public function search($srch_txt, $category){
		$images = array();
		$stock_result = $this->db->query("SELECT DISTINCT `book_id` FROM `shopstock`");
		$stock_result = $stock_result->result();
		$output = array();
		if($category=='All Category'){
			$x=0;
			for($i=0;$i<sizeof($stock_result);$i++){
				$id = $stock_result[$i]->book_id;
				//get the cheepest book from stock
				$price = $this->db->query("SELECT `price` FROM `shopstock` WHERE book_id='$id' ORDER BY `price` ASC LIMIT 1");
				$price = $price->result();
				$price = $price[0]->price;
				
				$book_details = $this->db->query("SELECT * FROM `books`, `shopstock` WHERE books.book_name LIKE '%$srch_txt%' && books.book_id='$id' && shopstock.book_id='$id'");
				$book_details = $book_details->result();
				if($book_details==array()){
					continue;
				}
				$output[$x] = $book_details[0];
				$x++;
			}
			$all = array();
			//$categories = array();
			$x=0;
			for($i=0;$i<sizeof($output);$i++){
				$all[$i] = get_object_vars($output[$i]);
				
				
				$image_id = $all[$i]['image_id'];
				$image = $this->db->query("SELECT * FROM `images` WHERE image_id='$image_id'");
				$image = $image->result();
				
				$image = get_object_vars($image[0]);
				$images[$i] = $image;
				
				/*$category_id = $all[$i]['category_id'];
				$category_id = explode(", ", $category_id);
				$cat = array();
				
				for($j=0;$j<sizeof($category_id);$j++){
					
					$cat_id = $category_id[$j];
					
					$category = $this->db->query("SELECT * FROM `category` WHERE category_id='$cat_id'");
					$category = $category->result();
					
					$category = get_object_vars($category[0]);
					$cat[$j] = $category['name'];
					
				}
				$categories[$i] = $cat;*/
			}
			$result = array($all, $images);
			
			return $result;
		}else{
			$x=0;
			for($i=0;$i<sizeof($stock_result);$i++){
				$book_id = $stock_result[$i]->book_id;
				
				//get the cheepest price of the book
				$price = $this->db->query("SELECT `price` FROM `shopstock` WHERE book_id='$book_id' ORDER BY `price` ASC LIMIT 1");
				$price = $price->result();
				$price = $price[0]->price;
				
				$book_details = $this->db->query("SELECT * FROM `books`, `shopstock` WHERE books.book_name LIKE '%$srch_txt%' && books.book_id='$book_id' && shopstock.book_id='$book_id'");
				$book_details = $book_details->result();
				if($book_details==array()){
					continue;
				}
				$category_id = $book_details[0]->category_id;
				$category_IDs = explode(",", $category_id);
				foreach ($category_IDs as $value) {
					if($category==$value){
						$output[$x] = $book_details[0];		
						$x++;
					}
				}
			}
			$all = array();
			//$categories = array();
			$x=0;
			
			for($i=0;$i<sizeof($output);$i++){
				$all[$i] = get_object_vars($output[$i]);
				
				
				$image_id = $all[$i]['image_id'];
				$image = $this->db->query("SELECT * FROM `images` WHERE image_id='$image_id'");
				$image = $image->result();
				$image = get_object_vars($image[0]);
				$images[$i] = $image;
				
				/*$category_id = $all[$i]['category_id'];
				$category_id = explode(", ", $category_id);
				$cat = array();
				for($j=0;$j<sizeof($category_id);$j++){
					$cat_id = $category_id[$j];
					$category = $this->db->query("SELECT * FROM `category` WHERE category_id='$cat_id'");
					$category = $category->result();
					$category = get_object_vars($category[0]);
					$cat[$j] = $category['name'];
				}
				$categories[$i] = $cat;*/
			}
			$result = array($all, $images);
			return $result;
		}
	}
	
	public function adv_search($srch_txt, $category, $price, $author, $store_name){
		
		if($store_name==''){
			$store = $this->db->query("SELECT * FROM `bookshop` WHERE name LIKE '%$store_name%'");
			$store = $store->result();
		}else{
			$store = $this->db->query("SELECT * FROM `bookshop` WHERE name='$store_name'");
			$store = $store->result();
		}

		if($price==''){
			$max = $this->db->query("SELECT `price` FROM `shopstock` ORDER BY `price` DESC LIMIT 1");
			$max = $max->result();
			if($max==array()){
				$price = '';
			}else{
				$price = $max[0]->price;
			}
		}
		$bookid_list = array();
		for($i=0;$i<sizeof($store);$i++){
			$store_id = $store[$i]->shop_id;
			$stock_details = $this->db->query("SELECT DISTINCT `book_id` FROM `shopstock` WHERE store='$store_id' && price<='$price'");
			$stock_details = $stock_details->result();

			if($stock_details==array()){
				continue;
			}
			for($j=0;$j<sizeof($stock_details);$j++){
				$id = $stock_details[$j]->book_id;
				array_push($bookid_list, $id);
			}
			
		}
		
		$bookid_list = array_unique($bookid_list);
		$id_list = array();
		foreach($bookid_list as $key => $value){
   			array_push($id_list, $value);
		}
		$images = array();
		$details = array();


		if($category=='All Category'){
			for($i=0;$i<sizeof($id_list);$i++){
				$book_id = $id_list[$i];
				//get the cheepest price of the book
				$price_list = $this->db->query("SELECT `price` FROM `shopstock` WHERE book_id='$book_id' ORDER BY `price` ASC LIMIT 1");
				$price_list = $price_list->result();
				$price = $price_list[0]->price;
				
				$output = $this->db->query("SELECT * FROM `books`, `shopstock` WHERE books.book_name LIKE '%$srch_txt%' && books.author LIKE '%$author%' && books.book_id='$book_id' && shopstock.book_id='$book_id'");
				$output = $output->result();
				
				if($output==array()){
					continue;
				}
				array_push($details, get_object_vars($output[0]));
			}
			
			
			
			$all = array();
			//$categories = array();
			$x=0;
			for($i=0;$i<sizeof($details);$i++){
				$all[$i] = $details[$i];
				
				
				$image_id = $all[$i]['image_id'];
				$image = $this->db->query("SELECT * FROM `images` WHERE image_id='$image_id'");
				$image = $image->result();
				$image = get_object_vars($image[0]);
				$images[$i] = $image;
				
				/*$category_id = $all[$i]['category_id'];
				$category_id = explode(", ", $category_id);
				$cat = array();
				
				for($j=0;$j<sizeof($category_id);$j++){
					
					$cat_id = $category_id[$j];
					
					$category = $this->db->query("SELECT * FROM `category` WHERE category_id='$cat_id'");
					$category = $category->result();
					
					$category = get_object_vars($category[0]);
					$cat[$j] = $category['name'];
					
				}
				$categories[$i] = $cat;*/
			}
			$result = array($all, $images);
			
			return $result;
		}else{
			for($i=0;$i<sizeof($id_list);$i++){
				$book_id = $id_list[$i];
				//get the cheepest price of the book
				$price_list = $this->db->query("SELECT `price` FROM `shopstock` WHERE book_id='$id' ORDER BY `price` ASC LIMIT 1");
				$price_list = $price_list->result();
				$price = $price_list[0]->price;
				
				$output = $this->db->query("SELECT * FROM `books`, `shopstock` WHERE books.book_name LIKE '%$srch_txt%' && books.author LIKE '%$author%' && books.book_id='$book_id' && shopstock.book_id='$book_id'");
				$output = $output->result();
				
				if($output==array()){
					continue;
				}
				$category_id = $output[0]->category_id;
				$category_IDs = explode(",", $category_id);
				foreach ($category_IDs as $value) {
					if($category==$value){
						array_push($details, get_object_vars($output[0]));
					}
				}
				
			}

			
			$all = array();
			//$categories = array();
			$x=0;
			
			for($i=0;$i<sizeof($details);$i++){
				$all[$i] = ($details[$i]);
				
				
				$image_id = $all[$i]['image_id'];
				$image = $this->db->query("SELECT * FROM `images` WHERE image_id='$image_id'");
				$image = $image->result();
				$image = get_object_vars($image[0]);
				$images[$i] = $image;
				
				/*$category_id = $all[$i]['category_id'];
				$category_id = explode(", ", $category_id);
				$cat = array();
				for($j=0;$j<sizeof($category_id);$j++){
					$cat_id = $category_id[$j];
					$category = $this->db->query("SELECT * FROM `category` WHERE category_id='$cat_id'");
					$category = $category->result();
					$category = get_object_vars($category[0]);
					$cat[$j] = $category['name'];
				}
				$categories[$i] = $cat;*/
			}
			$result = array($all, $images);
			return $result;
		}
	}
	
	
	public function cart($order, $cart, $confirm_code){
		$name = $order['name'];
		$email = $order['email'];
		$phone = $order['phone'];
		$billing_add = $order['billing'];
		$delivery_add = $order['delivery'];
		$delivery_note = $order['note'];
		
		//add the guest customer details
		$this->db->query("INSERT INTO `guest_customer` VALUES ('', '$name', '$billing_add', '$phone', '$email')");
		//get the current guest id
		$customer = $this->db->query("SELECT * FROM `guest_customer` ORDER BY `customer_id` DESC LIMIT 1");
		$customer = $customer->result();
		$customer_id = $customer[0]->customer_id;
		//add to saved cart
		$this->db->query("INSERT INTO `saved_cart` VALUES ('', '$customer_id', '0', 'Purchase', now())");
		$cart_details = $this->db->query("SELECT * FROM `saved_cart` ORDER BY `cart_id` DESC LIMIT 1");
		$cart_details = $cart_details->result();
		$cart_id = $cart_details[0]->cart_id;
		
		//add to the cart_books
		for($i=0;$i<sizeof($cart);$i++){
			$stock_id = $cart[$i]['stockID'];
			$qty = $cart[$i]['qty'];
			$this->db->query("INSERT INTO `cart_books` VALUES ('$cart_id', '$stock_id', '$qty')");
		}
		//add to order
		$this->db->query("INSERT INTO `order` VALUES ('', '$customer_id', '0', '$cart_id', '$confirm_code', '$delivery_add', '$delivery_note')");
		
	}
	
}

?>