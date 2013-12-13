
    <!-- Start: HEADER -->
    <?php 
      include("header.php");
    ?>
    <!-- End: HEADER -->
    <!-- Start: MAIN CONTENT -->
    <div class="content">
      <!-- Start: container -->
        <div class="container">
          <div class="row-fluid">
            <?php 
              include("sidebar.php");
            ?>
            <!-- start:section2 -->
            <div class="section2 sidebar span9">
            <div class="product-page"> <!-- Starts: Product page -->
                <div class="page-header">
                    <h1><?php echo $book_details[0]['book_name'];?><!-- <small>Pictures from another time</small>--></h1>
                </div>
                
                  <div class="row-fluid">
                      <div class="span5 center-align">
                          <img src="<?php echo $book_details[1]['path'];?>" class="<?php echo $book_details[1]['alt'];?>">            
                      </div>
                      <div class="span7 details ">
                        <p><h4><a href=""><?php echo $book_details[0]['author'];?></a> <small>(Authur)</small></h4></p>
                        <div class="rate-review-front">
                          <span id="rated"><?php echo $rating['rating']; ?>%</span><br /> <a href="">132 Total reviews</a>
                        </div>
                        <div class="clear"></div>

                        <span id="rate_success"></span>
                        <input type="button" style="display:none;" id="rateIT" onclick="return rate();">
                        <div class="clear"></div>
                        <div class="rate-review-buttons">
                        <?php 
                        $style = '';
                          for($i=0;$i<sizeof($rated_booksIDs);$i++){
                            if($rated_booksIDs[$i]==$book_details[0]['book_id']){
                              $style = 'style="display:none;"';
                            }
                          }
                        ?>
                          <span <?php echo $style; ?> id="rate_book"></span>
                          <input type="hidden" id="id_book" value="<?php echo $book_details[0]['book_id'];?>">
                          <button data-toggle="modal" href="#write-a-review" class="search-btn">Write A Review</button>
                        </div>
                      </div>
                  </div>

                  <div class="clear"></div>
                  <div class="row-fluid">
                    <h3>Description </h3>
                    <p class="date"><small>Publication Date: <span class="bold"><?php echo $book_details[0]['published_date'];?></span> </small></p>
                    <p><?php echo $book_details[0]['description'];?></p>

                  </div>

                  <div class="clear"></div>
                  <div class="row-fluid">
                      <div class="span12">
                        <h3>Product Details</h3>
                        <div class="row-fluid">
                          <div class="span3"><span class="bold">Publisher: </span></div>
                          <div class="span9"><?php echo $book_details[0]['publisher'];?></div>
                        </div>

                        <div class="row-fluid">
                          <div class="span3"><span class="bold">Language: </span></div>
                          <div class="span9"><?php echo $book_details[0]['language'];?></div>
                        </div>

                        <div class="row-fluid">
                          <div class="span3"><span class="bold">ISBN10: </span></div>
                          <div class="span9"><?php echo $book_details[0]['isbn10'];?></div>
                        </div>

                        <div class="row-fluid">
                          <div class="span3"><span class="bold">ISBN13: </span></div>
                          <div class="span9"><?php echo $book_details[0]['isbn13'];?></div>
                        </div>

                        <div class="row-fluid">
                          <div class="span3"><span class="bold">Edition: </span></div>
                          <div class="span9"><?php echo $book_details[0]['edition'];?></div>
                        </div>

                      </div>

                  </div>
                  
                  <div class="clear"></div>
                  <div class="row-fluid">
                      <div class="span12">
                        <h3>Available at</h3>
                        <?php 
                            for($i=0;$i<sizeof($shop_details[0]);$i++){
                        ?>  
                        <div class="row-fluid">
                          <div class="span3"><span class="bold">Book Store: </span></div>
                          <div class="span9"><?php echo $shop_details[1][$i]['name'];?></div>
                        </div>

                        <div class="row-fluid">
                          <div class="span3"><span class="bold">Quantity: </span></div>
                          <div class="span9">
                            <?php
                              //See if the stock is already in the cart
                              $present=false;
                              if(($this->session->userdata('cart'))){
                                $cart = $this->session->userdata('cart');
                                $stk_ID=$shop_details[0][$i]['stock_id'];
                                foreach ($cart as $cartItem) {
                                  if($cartItem['stockID'] == $stk_ID)
                                  {
                                    $present=true;
                                    break;
                                  }
                                }
                              }
                              if(! $present){
                            ?>
                            <form action="#" method="post">
                              <select name="qty" id="qty" class="order-quantity">
                                          <?php
                                            for($count=1;$count<=5;$count++){
                                              echo "<option value='$count'>$count</option>";
                                            }
                                          ?>
                                        </select>
                              <input type="hidden" name="books_page" value="1"/>
                              <input type="hidden" name="stock_id" value="<?php echo $shop_details[0][$i]['stock_id']?>"/>
                              <input type="submit" name="Cart" value="Add to Cart" id="add_to_cart" class="search-btn" />
                            </form>
                            <?php
                              }
                              else{
                                $urlCart=base_url('view_cart');
                                echo "<p>This item is in your <a href='$urlCart'>Cart.</a></p>";
                              }
                            ?>
                          </div>
                        </div>

                        <div class="row-fluid">
                          <div class="span3"><span class="bold">Price: </span></div>
                          <div class="span9"><?php echo $shop_details[0][$i]['price'];?></div>
                        </div>

                        <div class="row-fluid">
                          <div class="span3"><span class="bold">Delivery cost within city: </span></div>
                          <div class="span9"><?php echo $shop_details[0][$i]['delivery_cost_within_city'];?></div>
                        </div>

                        <div class="row-fluid">
                          <div class="span3"><span class="bold">Delivery cost outof city: </span></div>
                          <div class="span9"><?php echo $shop_details[0][$i]['delivery_cost_outof_city'];?></div>
                        </div>
                        
                        <?php } ?>
                      </div>
                  </div>
                  
                  <div class="clear"></div>
                  <h3>Latest Reviews</h3>
                  <div class="row-fluid"> <!-- Starts:single review -->
                    <div class="span12">
                    <div class="review">
                      <p class="reviewer"><span>Mr. Niranjan Udas</span></p>
                      <p class="review-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                      cillum dolore eu fugiat nulla pariatur..</p>
                      <p><em>12/11/2013</em></p>
                    </div>
                    </div>
                  </div> <!-- Ends:single review -->

                  <div class="row-fluid"> <!-- Starts:single review -->
                    <div class="span12">
                    <div class="review">
                      <p class="reviewer"><span>Mr. Niranjan Udas</span></p>
                      <p class="review-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                      cillum dolore eu fugiat nulla pariatur..</p>
                      <p><em>12/11/2013</em></p>
                    </div>
                    </div>
                  </div> <!-- Ends:single review -->

                  <div class="row-fluid"> <!-- Starts:single review -->
                    <div class="span12">
                    <div class="review">
                      <p class="reviewer"><span>Mr. Niranjan Udas</span></p>
                      <p class="review-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                      cillum dolore eu fugiat nulla pariatur..</p>
                      <p><em>12/11/2013</em></p>
                    </div>
                    </div>
                  </div> <!-- Ends:single review -->

                  <div class="row-fluid"> <!-- Starts:single review -->
                    <div class="span12">
                    <div class="review">
                      <p class="reviewer"><span>Mr. Niranjan Udas</span></p>
                      <p class="review-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                      cillum dolore eu fugiat nulla pariatur..</p>
                      <p><em>12/11/2013</em></p>
                    </div>
                    </div>
                  </div> <!-- Ends:single review -->
              </div> <!-- Ends: Product page -->
            </div>
            <!-- end:section2 -->
          </div>
        </div>
      <!-- End: container -->
    </div>
  </div> <!-- kun div ho kun -->

  <!-- <a data-toggle="modal" href="#detailss" class="btn btn-primary">Launch modal</a> -->
  <div class="modal fade" id="write-a-review" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title" id="success_title">Write A Review</h3>
        </div>
        <div class="modal-body" id="success_msg">
          <div class="row-fluid">
            <div class="span12">
              <div class="row-fluid"> <!-- Starts:form-row -->
                <div class="span4">
                  <label>Name: <span>*</span></label>
                </div>
                <div class="span8">
                  <input class="form-control" type="text" placeholder="Name" required="required"> 
                </div>
              </div><!-- Ends:form-row -->

              <div class="row-fluid"> <!-- Starts:form-row -->
                <div class="span4">
                  <label>Email: <span>*</span></label>
                </div>
                <div class="span8">
                  <input class="form-control" type="email" placeholder="Name" required="required"> 
                </div>
              </div><!-- Ends:form-row -->

              <div class="row-fluid"> <!-- Starts:form-row -->
                <div class="span4">
                  <label>Title: <span>*</span></label>
                </div>
                <div class="span8">
                  <input class="form-control" type="text" placeholder="Name" required="required"> 
                </div>
              </div><!-- Ends:form-row -->

              <div class="row-fluid"> <!-- Starts:form-row -->
                <div class="span4">
                  <label>Review: <span>*</span></label>
                </div>
                <div class="span8">
                  <textarea class="form-control"></textarea> 
                </div>
              </div><!-- Ends:form-row -->
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input class="search-btn" type="submit" value="Submit">
          <button class="search-btn" onClick="success_final('mybook');" data-dismiss="modal" >Close</button>
          
        </div>
      </div>
    </div>
  </div>
    <!-- End: MAIN CONTENT -->
    <!-- Start: FOOTER -->
    <?php 
      include("footer.php");
    ?>
    <!-- End: FOOTER -->
   
  </body>
</html>
