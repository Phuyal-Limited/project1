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
			
		$category_id = $book_details[0]->category_id;
		$category_id = explode(", ", $category_id);
		$img_id = $book_details[0]->image_id;
		$image_info = $this->db->query("SELECT * FROM `images` WHERE `image_id` = '$img_id'");
		$image_info = $image_info->result();
		
		
		$all_info = array($book_details, $image_info);
		return $all_info;
	}
	
	public function shop_details($book_id){
		$output = $this->db->query("SELECT * FROM `shopstock` WHERE `book_id` = '$book_id'");
		$stock_details = $output->result();
		
		$abt_shop = array();
		for($i=0;$i<sizeof($stock_details);$i++){
			$shop_id = $stock_details[$i]->store;
			$shop_details = $this->db->query("SELECT * FROM `bookshop` WHERE `shop_id` = '$shop_id'");
			$shop_details = $shop_details->result();
			$abt_shop[$i] = $shop_details;
			
		}
		
		return $abt_shop;
	}
	
}

?>