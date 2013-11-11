
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
                <div class="page-header">
                    <h1><?php echo $book_details[0]['book_name'];?><!-- <small>Pictures from another time</small>--></h1>
                </div>
                
                  <div class="row-fluid">
                      <div class="span5 center-align">
                          <img src="<?php echo $book_details[1]['path'];?>" class="<?php echo $book_details[1]['alt'];?>">            
                      </div>
                      <div class="span7 details ">
                        <p><h3><a href=""><?php echo $book_details[0]['author'];?></a> <small>(Authur)</small></h3></p>
                        <!--<p>***** <small>(<a href="">123 Reviews</a>)</small> </p>-->
                        <!--<p >Price <span class="price">$20.12</span> <small>Includes free bla bla via <a href="">Nepal Reads</a></small></p>-->
                      </div>
                  </div>
                  <div class="row-fluid">
                    <h3>Description </h3>
                    <hr class="footer-divider" />
                    <p class="date"><small>Publication Date: <span class="bold"><?php echo $book_details[0]['published_date'];?></span> </small></p>
                    <p><?php echo $book_details[0]['description'];?></p>

                  </div>
                  <div class="row-fluid">
                      <h3>Product Details</h3>
                      <hr class="footer-divider" />
                      <!--<p> <span class="bold">Print Length:</span>74 pages</p>
                      <p> <span class="bold">Simultaneous Device Usage:</span>Unlimited</p>-->
                      <p> <span class="bold">Publisher: </span><?php echo $book_details[0]['publisher'];?></p>
                      <!--<p> <span class="bold">Sold by:</span>Amazon Digital Services, Inc.</p>-->
                      <p> <span class="bold">Language: </span><?php echo $book_details[0]['language'];?></p>
                      <p> <span class="bold">ISBN10: </span><?php echo $book_details[0]['isbn10'];?></p>
                      <p> <span class="bold">ISBN13: </span><?php echo $book_details[0]['isbn13'];?></p>

                  </div>
                  
                  <div class="row-fluid">
                      <h3>Available at</h3>
                      <hr class="footer-divider" />
                      <?php 
					  	for($i=0;$i<sizeof($shop_details[0]);$i++){
					?>	
                      <p> <span class="bold">Book Store: </span><br/>Name: <?php echo $shop_details[1][$i]['name'];?>
                      <p style="margin-left:90%;">
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
                        	Quantity: <select name="qty" id="qty">
                                      <?php
                                        for($count=1;$count<=5;$count++){
                                          echo "<option value='$count'>$count</option>";
                                        }
                                      ?>
                                    </select>
                        	<input type="hidden" name="book_id" value="<?php echo $shop_details[0][$i]['stock_id']?>"/>
                      		<input type="submit" name="Cart" value="Add to Cart" id="add_to_cart" class="btn btn-small search-btn" />
                      	</form>
                        <?php
                          }
                          else{
                            $urlCart=base_url('view_cart');
                            echo "<p>This item is in your <a href='$urlCart'>Cart.</a></p>";
                          }
                        ?>
                      </p>
                      <br/>
					  Price: <?php echo $shop_details[0][$i]['price'];?><br/>
                      Delivery cost within city: <?php echo $shop_details[0][$i]['delivery_cost_within_city'];?><br/>
                      Delivery cost outof city: <?php echo $shop_details[0][$i]['delivery_cost_outof_city'];?>
                      </p>
                      <?php } ?>
                  </div>
                  
                  <!--<div class="row-fluid">
                    <h3>Customer Reviews and Comments</h3>
                    <hr class="footer-divider" />
                    <p>***** <span class="fade"> (123 Total Reviews)</span> </p>
                    <p><a href="">Write a review</a> </p>
                    <div class="review">
                      <h6><a href="">Mr. Mahesh Thapa</a> </h6>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at ante.
                        Mauris eleifend, quam a vulputate dictum, massa quam dapibus leo,
                        eget vulputate orci purus ut lorem. In fringilla mi in ligula. 
                        Pellentesque aliquam quam vel dolor. Nunc adipiscing. Sed quam odio,</p>
                        <a href="">9 Comments</a>
                        <p><a href="">Like</a>(9) <a href="">Dislike</a>(1)</p>
                    </div>
                    <div class="review">
                      <h6><a href="">Mr. Mahesh Thapa</a> </h6>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at ante.
                        Mauris eleifend, quam a vulputate dictum, massa quam dapibus leo,
                        eget vulputate orci purus ut lorem. In fringilla mi in ligula. 
                        Pellentesque aliquam quam vel dolor. Nunc adipiscing. Sed quam odio,</p>
                        <a href="">9 Comments</a>
                        <p><a href="">Like</a>(9) <a href="">Dislike</a>(1)</p>
                    </div>
                    <div class="review">
                      <h6><a href="">Mr. Mahesh Thapa</a> </h6>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at ante.
                        Mauris eleifend, quam a vulputate dictum, massa quam dapibus leo,
                        eget vulputate orci purus ut lorem. In fringilla mi in ligula. 
                        Pellentesque aliquam quam vel dolor. Nunc adipiscing. Sed quam odio,</p>
                        <a href="">9 Comments</a>
                        <p><a href="">Like</a>(9) <a href="">Dislike</a>(1)</p>
                    </div>
                  </div>-->

            </div>
            <!-- end:section2 -->
          </div>
        </div>
      <!-- End: container -->
    </div>
  </div> <!-- kun div ho kun -->
    <!-- End: MAIN CONTENT -->
    <!-- Start: FOOTER -->
    <?php 
      include("footer.php");
    ?>
    <!-- End: FOOTER -->
   
  </body>
</html>
