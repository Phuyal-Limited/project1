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
		for($i=0;$i<sizeof($output);$i++){
			$books[$i] = get_object_vars($output[$i]);
			/*$author = $books[$i]['author'];
			$author_array = explode(', ', $author);
			for($j=0;$j<sizeof($author_array);$j++){
				array_push($arr_author, $author_array[$j]);
			}*/
		}
		for($i=0;$i<sizeof($output1);$i++){
			$bookshop[$i] = get_object_vars($output1[$i]);
		}
		
		$result = array($books, $bookshop);
		return 	$result;
	}
	
	public function search_book($isbn){
		$output = $this->db->query("SELECT * FROM `books` WHERE isbn10='$isbn' OR isbn13='$isbn'");
		return $output->result();
	}
	
	public function book_details($cat_id){
		$output = $this->db->query("SELECT * FROM `books` ORDER BY `book_id` ASC");
		$output = $output->result();
		$book_details = array();
		$image_details = array();
		$x=0;
		for($i=0;$i<sizeof($output);$i++){
			$category_id = $output[$i]->category_id;
			$category_id = explode(", ", $category_id);
			for($j=0;$j<sizeof($category_id);$j++){
				if($cat_id == $category_id[$j]){
					$book_details[$x] = $output[$i];
					$img_id = $output[$i]->image_id;
					
					$image_info = $this->db->query("SELECT * FROM `images` WHERE `image_id` = '$img_id'");
					$image_info = $image_info->result();
					$image_details[$x] = $image_info;
					$x++;
				}
			}
		}
		$all_info = array($book_details, $image_details);
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
		$output = $this->db->query("SELECT * FROM `shopstock` WHERE `book_id` = '$book_id'");
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
		if($category=='All Category'){
			$output = $this->db->query("SELECT * FROM `books` WHERE book_name LIKE '%$srch_txt%'");
			$output = $output->result();
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
			$output = $this->db->query("SELECT * FROM `books` WHERE book_name LIKE '%$srch_txt%' && category_id='$category'");
			$output = $output->result();
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
	
}

?>