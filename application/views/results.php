    <!-- Start: HEADER -->
    <?php 
      include("header.php");
    ?>
    <!-- End: HEADER -->
    
    <div class="content"><!-- Start: MAIN CONTENT -->
        <div class="container"><!-- Start: container -->
          <div class="row-fluid">
            <div class="span2"></div>
            <div class="span10">
                <div class="row-fluid">
                  <form action="search" method="post">
                      <input class="span7" type="text" name="search_text" placeholder="Search...">
                      <select name="category" id="category" class="span3">
                        
                			<option value="All Category">All Category</option>
                			<?php 
                  				for($i=0;$i<sizeof($category);$i++){
                			?>
                                <option value="<?php echo $category[$i]->category_id;?>"><?php echo $category[$i]->name;?></option>
                             <?php   
                  				}
                			?>
                      </select>
                      <input type="submit" name="search" value="Search" class="search-btn" />
                      <a href="advance_search">Advanced</a>
                  </form>
                </div>
            </div>
          </div>
            <div class="page-header">
              <p>Search Result for: <span><?php echo $srch_txt;?></span></p>
            </div>

          <div class="row-fluid filter-sort">
            <div class="span2">Filters:</div>
            <div class="span5">Showing 1-100 <span>(of 3333)</span></div>
            <div class="span2">
              Per page
              <select class="span5">
                <option>10</option>
                <option>20</option>
                <option>50</option>
              </select>
            </div>
            <div class="span3" style="float:right;"> 
              Sort by
              <select>
                <option value="newest">Newest</option>
                <option>newest</option>
                <option>newest</option>
              </select>
            </div>
          </div>
          <div class="row-fluid"> <!-- starts: roww -->
            <div class="span2 section1"> <!-- starts section1 -->
                <div class="filter-region">
                  <div class="filter-options">
                      <div class="filter-option"> <!-- starts:filter option -->
                        <div class="title">
                        Category
                        </div>
                          <div class="values">
                            <a href=""></a>
                              <div class="values-list toggle">
                                <?php 
                  					for($i=0;$i<sizeof($category);$i++){
                              $checked = '';
                              foreach ($category_IDs as $value) {
                                if($value == $category[$i]->category_id){
                                  $checked = 'checked';
                                }
                              }
                				?>
                                	<div class="value">
                                    	<label class="checkbox">
                                      		<input type="checkbox" name="category_list[]" class="category_list" <?php echo $checked; ?> value="<?php echo $category[$i]->category_id;?>"> <?php echo $category[$i]->name;?>
                                    	</label>
                                	</div>
                                    
                             	<?php   
                  					}
                				?>
                                
                              </div>
                          </div>
                      </div> <!-- ends:filter option -->

                      <div class="filter-option"> <!-- starts:filter option -->
                        <div class="title">
                        Author
                        </div>
                          <div class="values">
                            <a href=""></a>
                              <div class="values-list toggle">
                               <?php 
                  					for($i=0;$i<sizeof($details[0]);$i++){
                              $checked = '';
                              foreach ($authors as $value) {
                                if($value == $details[0][$i]){
                                  $checked = 'checked';
                                }
                              }
                				?>
                                	<div class="value">
                                    	<label class="checkbox">
                                      		<input type="checkbox" class="author" name="author_names[]" <?php echo $checked; ?> value="<?php echo $details[0][$i];?>"> <?php echo $details[0][$i];?>
                                    	</label>
                                	</div>
                                   
                             	<?php   
                  					}
                				?>
                                
                                
                              </div>
                          </div>
                      </div> <!-- ends:filter option -->

                      <div class="filter-option"> <!-- starts:filter option -->
                        <div class="title">
                        Store
                        </div>
                          <div class="values">
                            <a href=""></a>
                              <div class="values-list toggle">
                                <?php 
                  					for($i=0;$i<sizeof($details[1]);$i++){
                              $checked = '';
                              foreach ($store_IDs as $value) {
                                if($value==$details[1][$i]['shop_id']){
                                  $checked = 'checked';
                                }
                              }
                				?>
                                	<div class="value">
                                    	<label class="checkbox">
                                      		<input type="checkbox" class="store" name="store_names[]" <?php echo $checked;?> value="<?php echo $details[1][$i]['shop_id'];?>"> <?php echo $details[1][$i]['name'];?>
                                    	</label>
                                	</div>
                                    
                            	<?php   
                  					}
                				?>
                                
                              </div>
                          </div>
                      </div> <!-- ends:filter option -->

                      <div class="filter-option"> <!-- starts:filter option -->
                        <div class="title">
                        Price
                        </div>
                          <div class="values">
                            <a href=""></a>
                              <div class="values-list toggle">
                                <?php 
                                    foreach ($prices as $value) {
                                      $curr = 'Up to ';
                                      $checked = '';
                                      if($value==$price_range){
                                        $checked = 'checked';
                                      }
                                      if($value == 'No Preferences'){
                                        $curr = '';
                                      }
                                    
                                ?>
                                <div class="value">
                                    <label class="radio">
                                      <input type="radio" class="price" <?php echo $checked; ?> name="price" value="<?php echo $value;?>"> <?php echo $curr.$value; ?>
                                    </label>
                                </div>
                                <?php 
                                  }
                                ?>
                                                  
                              </div>
                          </div>
                      </div> <!-- ends:filter option -->
                  </div>
                </div>

            </div> <!-- end s section1 -->
            <div class="span10 section2"> <!-- section2 starts -->
              <?php
                	$sz = sizeof($search_result[0]);
					if($sz==0){
					
					}else{
						$sz = $sz-1;
					}
					$row = $sz/4;
					$counter = 0;
					$i = 0;
					for($x=0;$x<=$row;$x++){
						
				?>
                <div class="row-fluid">
                  <!-- <div class="span3" style="border:2px solid red;">

                  </div>
                  <div class="span3" style="border:2px solid red;">

                  </div>
                  <div class="span3" style="border:2px solid red;">

                  </div>
                  <div class="span3" style="border:2px solid red;">

                  </div> -->
                      <ul class="thumbnails">
                      <?php 
				 		 $size = sizeof($search_result[0]);
				  			
				  		if($search_result[0] == array()){
							 echo 'No Books Available.';
						}else{
				  			while($i<$size){
								
								$counter++;
								$img = $search_result[1][$i]['path'];
								//echo $img;exit();
								$alt = $search_result[1][$i]['alt'];
				  		?>
                      
                        <li class="span3 book-<?php echo $counter; ?>">
                          <div class="thumbnail ">
                            <img style="height:300px;" onClick="info(<?php echo $i;?>, <?php echo $x;?>);" src="<?php echo $img;?>" alt="<?php echo $alt;?>">
                            <div class="search-result-footer">
                              <div class="caption" style="height:65px;">
                                <span style="display:none;" id="<?php echo 'goto-info'.$x;?>"></span>
                                <a href="<?php echo base_url(); ?>books/<?php echo $search_result[0][$i]['book_id'];?>"><h3><?php echo $search_result[0][$i]['book_name'];?></h3></a>
                              </div>
                              <div class="row-fluid">
                                <div class="span6">
                                  <p class="book-price"><span class="currency">NRs</span><?php echo $search_result[0][$i]['price'];?></p>
                                </div>
                                <div class="span6 widget-buttons">
                                  <p>
                                    <!--<a href="product?book_id=<?php echo $search_result[0][$i]['book_id'];?>">More</a>-->
                                    <input type="hidden" id="book_id<?php echo $i;?>" value="<?php echo $search_result[0][$i]['book_id']?>" />
                                    <a id='more_info' onClick="info(<?php echo $i;?>, <?php echo $x;?>);" href="javascript:void(0)">More</a>
                                  </p>
                                </div>
                              </div>
                            <!-- </div> -->
                          </div>
                        </li>
                     <?php
  				              $i++; 
  				              if($counter==4){
                          $counter=0;
  					               break;
  					             }
  					           }
  				          }
  					?>
                  </ul>
                </div>

                <div id="<?php echo 'info-show'.$x;?>" style="display:none;">
                <div class="row-fluid" style="margin-top:-30px;">
                  <div class="show-info-arrow" id="arrow<?php echo $x;?>"></div>
                  <div  class="close-button" onClick="close_info(<?php echo $x;?>);">x</div>
                  <div class="product-info">
                      <div class="module-container">
                    
                        <!-- <div class="pprev"><</div>
                        <div class="nnext">></div> -->
                        <div class="product-info-title">
                          <p class="title">
                            <a id="book_title<?php echo $x;?>" href="">Kara Walker: Pictures from another world</a>
                          </p>
                        </div>
                        <div class="row-fluid product-info-row">
                          <div class="span4 ">
                            <div class="product-info-gallary">
                              <div id="img<?php echo $x;?>" class="main-gallary">
                                <img  src="<?php echo $img;?>" alt="<?php echo $alt;?>">
                              </div>
                            </div>  
                          </div>
                          <div class="span8 ">
                            
                            <div class="product-info-details">
                              <div class="row-fluid product-info-bla"> <!-- tabs-->
                  
                              <ul class="nav nav-tabs product-info-tabs" id="myTab">
                                <li class="active"><a href="#home<?php echo $x;?>" data-toggle="tab">Price comparison</a></li>
                                <li><a href="#profile<?php echo $x;?>" data-toggle="tab">Information</a></li>
                              </ul>
                               
                              <div class="tab-content product-info-detail">
                                <div class="tab-pane active" id="home<?php echo $x;?>">
                                    <div class="row-fluid price-head">
                                                  <div class="span2 "> Seller</div>
                                                  <div class="span2 "> Price(NRs.)</div>
                                                  <div class="span2 "> Delivery(Within City)</div>
                                                  <div class="span2 "> Delivery(Outof City)</div>
                                                  <div class="span2 "> Quantity</div>
                                                  <div class="span2 "></div>
                                                </div><!-- end:price-head -->

                                              <div id="display<?php echo $x;?>"></div><!-- end:price-detail -->
                                </div>
                                <div class="tab-pane" id="profile<?php echo $x;?>"><div id="info-tab<?php echo $x;?>">this is a information tab</div></div>
                               
                              </div>
                            </div> <!-- tabs -->
                            </div>
                          </div>
                        </div>
                      </div> <!-- end: module container -->
                    </div> <!-- ends:product-info -->
                  </div>
                </div>
              <br/>
                <?php
					}
				?>

        <input type="hidden" id="info-showed">
        <input type="hidden" id="price_check" value="<?php echo $price_range; ?>">
        
        <form action="filter" method="post" style="display:none;">
          <input type="hidden" name="category_list" id="category_list" />
          <input type="hidden" name="author_list" id="author_list" />
          <input type="hidden" name="store_list" id="store_list" />
          <input type="hidden" name="price_range" id="price_range" />

          <input type="hidden" name="search_txt" id="search_txt" value="<?php echo $srch_txt;?>" />
          <input type="hidden" name="category" value="<?php echo $search_details['category']; ?>" />
          <input type="hidden" name="author" value="<?php echo $search_details['author']; ?>" />
          <input type="hidden" name="price" value="<?php echo $search_details['price']; ?>" />
          <input type="hidden" name="store" value="<?php echo $search_details['store']; ?>" />

          <input type="submit" id="submit" name="submit" value="Submit">
        </form>
                
          <div class="pagination pagination-centered">
            <ul>
              <li class="disabled">
                <a href="#">&laquo;</a>
              </li>
              <li class="active">
                <a href="#">1</a>
              </li>
              <li>
                <a href="#">2</a>
              </li>
              <li>
                <a href="#">3</a>
              </li>
              <li>
                <a href="#">4</a>
              </li>
              <li>
                <a href="#">5</a>
              </li>
              <li>
                <a href="#">6</a>
              </li>
              <li>
                <a href="#">&raquo;</a>
              </li>
            </ul>
          </div>
            </div> <!-- section2 ends -->

          </div> <!-- end:roww -->
          
          
        </div> <!-- End: container -->
    </div><!-- End: MAIN CONTENT -->
    <!-- Start: FOOTER -->
    <?php 
      include("footer.php");
    ?>
    <!-- End: FOOTER -->
    
    


