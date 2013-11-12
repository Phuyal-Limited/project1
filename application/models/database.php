<?php

class Database extends CI_Model{
	public function login($data){
		$user = $data['user'];
		$pass = $data['pass'];
		$output = $this->db->query("SELECT * FROM `user` WHERE `user_name`='$user' && `password`='$pass'");
		return $output->result();
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
		$x=0;
		if($output==array()){
			$all_info = array('0'=>array(), '1'=>array());
		}else{
			for($i=0;$i<sizeof($output);$i++){
				$category_id = $output[$i]['category_id'];
				$category_id = explode(", ", $category_id);
				for($j=0;$j<sizeof($category_id);$j++){
					if($cat_id == $category_id[$j]){
						$book_details[$x] = $output[$i];
						$img_id = $output[$i]['image_id'];
						
						$image_info = $this->db->query("SELECT * FROM `images` WHERE `image_id` = '$img_id'");
						$image_info = $image_info->result();
						$image_details[$x] = get_object_vars($image_info[0]);
						$x++;
					}
				}
			}
			
			$all_info = array($book_details, $image_details);
			
		}
		return $all_info;
	}
	
	public function book_particular($book_id){
		$output = $this->db->query("SELECT * FROM `books` WHERE `book_id` = '$book_id'");
		$book_details = $output->result();
		$book_details = get_object_vars($book_details[0]);	
		
		$category_id = $book_details['category_id'];
		$category_id = explode(", ", $category_id);
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
				$book_details = $this->db->query("SELECT * FROM `books` WHERE book_name LIKE '%$srch_txt%' && book_id='$id'");
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
				
				$image = get_object_vars($image);print_r($image);
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
			}exit();
			$result = array($all, $images);
			
			return $result;
		}else{
			$x=0;
			for($i=0;$i<sizeof($stock_result);$i++){
				$book_id = $stock_result[$i]->book_id;
				$book_details = $this->db->query("SELECT * FROM `books` WHERE book_name LIKE '%$srch_txt%' && category_id='$category' && book_id='$book_id'");
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
				$output = $this->db->query("SELECT * FROM `books`, `shopstock` WHERE books.book_name LIKE '%$srch_txt%' && books.category_id='$category' && books.author LIKE '%$author%' && books.book_id='$book_id' && shopstock.book_id='$book_id'");
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
	
}

?>