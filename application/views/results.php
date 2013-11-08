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
                      <input type="submit" name="search" value="Search" class="btn btn-small search-btn" />
                      <!--<a href="advance_search">Advanced</a>-->
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
                <option>newest</option>
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
                                <div class="value">
                                    <label class="checkbox">
                                      <input type="checkbox"> Business
                                    </label>
                                </div>
                                <div class="value">
                                    <label class="checkbox">
                                      <input type="checkbox"> Children
                                    </label>
                                </div>
                                <div class="value">
                                    <label class="checkbox">
                                      <input type="checkbox"> adults
                                    </label>
                                </div>
                                <div class="value">
                                    <label class="checkbox">
                                      <input type="checkbox"> Science and fiction
                                    </label>
                                </div>
                              </div>
                          </div>
                      </div> <!-- ends:filter option -->

                      <div class="filter-option"> <!-- starts:filter option -->
                        <div class="title">
                        Merchant
                        </div>
                          <div class="values">
                            <a href=""></a>
                              <div class="values-list toggle">
                                <div class="value">
                                    <label class="checkbox">
                                      <input type="checkbox"> Business
                                    </label>
                                </div>
                                <div class="value">
                                    <label class="checkbox">
                                      <input type="checkbox"> Children
                                    </label>
                                </div>
                                <div class="value">
                                    <label class="checkbox">
                                      <input type="checkbox"> adults
                                    </label>
                                </div>
                                <div class="value">
                                    <label class="checkbox">
                                      <input type="checkbox"> Science and fiction
                                    </label>
                                </div>
                              </div>
                          </div>
                      </div> <!-- ends:filter option -->

                      <div class="filter-option"> <!-- starts:filter option -->
                        <div class="title">
                        Type
                        </div>
                          <div class="values">
                            <a href=""></a>
                              <div class="values-list toggle">
                                <div class="value">
                                    <label class="checkbox">
                                      <input type="checkbox"> Business
                                    </label>
                                </div>
                                <div class="value">
                                    <label class="checkbox">
                                      <input type="checkbox"> Children
                                    </label>
                                </div>
                                <div class="value">
                                    <label class="checkbox">
                                      <input type="checkbox"> adults
                                    </label>
                                </div>
                                <div class="value">
                                    <label class="checkbox">
                                      <input type="checkbox"> Science and fiction
                                    </label>
                                </div>
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
                                <div class="value">
                                    <label class="checkbox">
                                      <input type="checkbox"> Business
                                    </label>
                                </div>
                                <div class="value">
                                    <label class="checkbox">
                                      <input type="checkbox"> Children
                                    </label>
                                </div>
                                <div class="value">
                                    <label class="checkbox">
                                      <input type="checkbox"> adults
                                    </label>
                                </div>
                                <div class="value">
                                    <label class="checkbox">
                                      <input type="checkbox"> Science and fiction
                                    </label>
                                </div>
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
                      
                        <li class="span3">
                          <div class="thumbnail">
                            <img src="<?php echo $img;?>" alt="<?php echo $alt;?>">
                            <div class="caption">
                              <h3><?php echo $search_result[0][$i]['book_name'];?><!--<small>Pictures from another time</small>--></h3>
                              <p>By: <a href=""><?php echo $search_result[0][$i]['author'];?></a> <br /></p>
                              <!--<p>Fourth Edition</p>
                              <span class="rating">
                                  <span class="star"></span>
                                  <span class="star"></span>
                                  <span class="star"></span>
                                  <span class="star"></span>
                                  <span class="star"></span>
                                </span>
                              <p><a href="">Reviews</a>(123)</p>
                              <p class="price">$10.23</p>-->
                            </div>
                            <div class="widget-footer">
                          <p>
                             <a href="product?book_id=<?php echo $search_result[0][$i]['book_id'];?>" class="btn">Read more</a>
                          </p>
                        </div>
                      </div>
                    </li>
                   <?php
				   $i++; 
				   if($counter==4){
					  break;
					}
					
				   }
				}
					?>
                  </ul>
                </div>
                <?php
					}
				?>
                <!--
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
                </div>-->
            </div> <!-- section2 ends -->

          </div> <!-- end:roww -->
          
          
        </div> <!-- End: container -->
    </div><!-- End: MAIN CONTENT -->
    <!-- Start: FOOTER -->
    <?php 
      include("footer.php");
    ?>
    <!-- End: FOOTER -->
    
    


    
          
                    <hr class="footer-divider" />
