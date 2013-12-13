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
              <div class="row-fluid">
                  <form action="<?php echo base_url();?>search" method="post">
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
                      <input type="submit" name="search" value="Search" class="search-btn"/>
                      <a href="advance_search">Advanced</a>
                  </form>
                </div>
                <div class="page-header">
                  <?php
                    $category_name = '';
                    for($i=0;$i<sizeof($category);$i++){
                      $category_id = $category[$i]->category_id;
                      if($category_id==$cat_id){
                        $category_name = $category[$i]->name;
                      }
                    }
                  ?>
                  <h2><?php echo $category_name?></h2>
                </div>
                <?php
                  $sz = sizeof($book_details[0]);
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
                  <ul class="thumbnails">
                  
				          
                  <?php 
                    $size = sizeof($book_details[0]);
                
                    if($book_details[0] == array()){
                      echo 'No Books Available.';
                    }else{
                      while($i<$size){
                
                      $counter++;
                      $img = $book_details[1][$i]['path'];
                      //echo $img;exit();
                      $alt = $book_details[1][$i]['alt'];
                  ?> 
				            
                      
                        <li class="span3">
                          <div class="thumbnail">
                            <img style="height:300px;" onClick="info(<?php echo $i;?>, <?php echo $x;?>);" src="<?php echo $img;?>" alt="<?php echo $alt;?>">

                              <div class="search-result-footer">
                              <div class="caption" style="height:65px;">
                                <span style="display:none;" id="<?php echo 'goto-info'.$x;?>"></span>
                                <a href="http://nepalreads.com/books/<?php echo $book_details[0][$i]['book_id'];?>"><h3><?php echo $book_details[0][$i]['book_name'];?></h3></a>
                              </div>
                              <div class="row-fluid">
                                <div class="span6">
                                  <p class="book-price"><span class="currency">NRs</span><?php echo $book_details[2][$i];?></p>
                                </div>
                                <div class="span6 widget-buttons">
                                  <p>
                                    <input type="hidden" id="book_id<?php echo $i;?>" value="<?php echo $book_details[0][$i]['book_id']?>" />
                                    <a id='more_info' onClick="info(<?php echo $i;?>, <?php echo $x;?>);" href="javascript:void(0)">More</a>
                                    
                                  </p>
                                </div>
                              </div>
                            </div>
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

                <!-- details -->
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
                                <img src="">
                              </div>
                            </div>  
                          </div>
                          <div class="span8 ">
                            
                            <div class="product-info-details">
                              <div class="row-fluid product-info-bla"> <!-- tabs-->
                  
                              <ul class="nav nav-tabs product-info-tabs" id="myTab">
                                <li class="active"><a href="#home" data-toggle="tab">Price comparison</a></li>
                                <li><a href="#profile" data-toggle="tab">Information</a></li>
                              </ul>
                               
                              <div class="tab-content product-info-detail">
                                <div class="tab-pane active" id="home">
                                    <div class="row-fluid price-head">
                                                  <div class="span2 "> Seller</div>
                                                  <div class="span2 "> Price</div>
                                                  <div class="span2 "> Delivery(Within City)</div>
                                                  <div class="span2 "> Delivery Cost Outof City</div>
                                                  <div class="span2 "> Quantity</div>
                                                  <div class="span2 "></div>
                                                </div><!-- end:price-head -->
                                               <div id="display<?php echo $x;?>"></div><!-- end:price-detail -->
                                </div>
                                <div class="tab-pane" id="profile"><p id="info-tab<?php echo $x;?>">this is a information tab</p></div>
                               
                              </div>
                            </div> <!-- tabs -->
                            </div>
                          </div>
                        </div>
                      </div> <!-- end: module container -->
                    </div> <!-- ends:product-info -->
                  </div>
                </div>
                  <br />
                  <?php 
                      }
                  ?>

                <!-- details -->
                 <input type="hidden" id="info-showed">
            </div>
            <!-- END:SECTION2 -->
          </div>
          </div>
           <!-- END:CONTAINER -->

          <!--<div class="pagination pagination-centered">
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
      <!-- End: PRODUCT LIST -->
    </div>
    <!-- End: MAIN CONTENT -->
    <?php 
      include("footer.php");
    ?>
    <!-- <div class="container">
      <div class="row">

      </div>
    </div> -->
    
  </body>
</html>
