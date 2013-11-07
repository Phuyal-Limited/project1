
    <!-- Start: HEADER -->
    <?php 
      include("header.php");
    ?>
    <!-- End: HEADER -->
    <!-- Start: MAIN CONTENT -->
    <div class="content">
      <!-- Start: PRODUCT LIST -->
        <div class="container">
          <div class="row-fluid">
            <?php 
              include("sidebar.php");
            ?>
            <div class="section2 sidebar span9">
              <!-- Start:  SECTION2 -->
                <div class="page-header">
                  <h2>Search Result</h2>
                </div>
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
            </div>
            <!-- END:SECTION2 -->
          </div>
          </div>
           <!-- END:CONTAINER -->

          
        </div>
      <!-- End: PRODUCT LIST -->
    </div>
    <!-- End: MAIN CONTENT -->
    <?php 
      include("footer.php");
    ?>
   