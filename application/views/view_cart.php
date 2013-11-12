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
                      <a href="advance_search">Advanced</a>
                  </form>
                </div> 
                <div class="row-fluid"> <!-- cart:details starts -->
                  <div class="your-cart">
                      <div class="cart-content">
                          <div class="cart-head kale">
                          Your Cart
                          </div>
                          <div class="cart-details">
                            <div class="table-titles">
                              <div class="row-fluid">
                                  <div class="span1 ">Remove</div>
                                  <div class="span2 ">Picture</div>
                                  <div class="span4 ">Book Details</div>
                                  <div class="span1 ">Qty</div>
                                  <div class="span2 ">Unit Price</div>
                                  <div class="span2 ">Total</div>
                              </div>
                            </div>
                            <form name='update_cart' method='POST' action='#'>
                            <?php
                            $tot=0;
                            foreach ($Cart as $CartItem) {
                            ?>
                              <div class="row-fluid cart-row">
                                    <div class="span1 "><input type="checkbox" name='remove[<?php echo $CartItem['stock']['stock_id']; ?>]' value='1'></div>
                                    <div class="span2 ">
                                       <img src="<?php echo $CartItem['book'][1]['path'];?>"> 
                                    </div>
                                    <div class="span4 product-cart-info">
                                        <p class="title"><?php echo $CartItem['book'][0]['book_name'];?></p>
                                        <div class="desc">
                                            <p>By:<span><?php echo $CartItem['book'][0]['author'];?></span> </p>
                                            <p>Publisher:<span><?php echo $CartItem['book'][0]['publisher'];?></span> </p>
                                            <p>Store:<span><?php echo $CartItem['shop'];?></span> </p>
                                        </div>
                                    </div>
                                    <div class="span1 qty">
                                      <select name='qtt[<?php echo $CartItem['stock']['stock_id']; ?>]'>
                                        <?php
                                        for($count=1;$count<=5;$count++){
                                          if($count == $CartItem['qty'])
                                            echo "<option value='$count' selected='selected'>$count</option>";
                                          else
                                            echo "<option value='$count'>$count</option>";
                                        }
                                      ?>
                                      </select>
                                    </div>
                                    <div class="span2 ">
                                      <div class="span2 product-cart-price">
                                      </div>
                                        <p><span><?php echo $CartItem['qty'];?>x</span><?php echo $CartItem['stock']['price'];?></p>
                                    </div>
                                    <div class="span2 product-cart-price">
                                      <p><?php echo $CartItem['qty']*$CartItem['stock']['price'];$tot += $CartItem['qty']*$CartItem['stock']['price'];?></p>
                                    </div>
                              </div>
                              
                            <?php
                            }
                            ?>
                            <div class="row-fluid cart-total">
                                <p> Sub-Total: <span>Rs. <?php echo $tot;?></span></p>
                                <p> Total: <span>Rs. <?php echo $tot;?></span></p>
                              </div>
                            </div>
                      </div>
                  </div>
                </div> <!-- cart:details ends -->
                <div class="row-fluid cart-buttons" style="padding-bottom:40px;">
                  <div class="span6"><input type='submit' name='Update' value='update'></div>
                  <div class="span6"><p><a href="<?php echo base_url(); ?>">Continue shopping</a></p></div>

                </div>
                </form>
                <pre>
                    <?php
                      $cart = $this->session->userdata('cart');
                      echo "Post Info:";
                      print_r($_POST);
                      echo "<br />Cart Info:";
                      print_r($this->session->userdata('cart'));

                    ?>
                </pre>
                <div class="row-fluid"> <!-- buyer:details starts -->
                  <div class="your-cart ">
                      <div class="cart-content">
                          <div class="cart-head kale">
                          Your Details
                          </div>
                          <div class="widget-body">
                            <div class="detail-form">
                              <div class="row-fluid">
                                  <div class="span3 detail-form-label">Name:</div>
                                  <div class=" span9 form-horizontal form-signin-signup">
                                    <input type="text" name="name" placeholder="name">
                                  </div>
                              </div>
                              <div class="row-fluid">
                                  <div class="span3 detail-form-label">Address:</div>
                                  <div class=" span9 form-horizontal form-signin-signup">
                                    <input type="text" name="name" placeholder="Address">
                                  </div>
                              </div>
                              <div class="row-fluid">
                                  <div class="span3 detail-form-label">Anything:</div>
                                  <div class=" span9 form-horizontal form-signin-signup">
                                    <input type="text" name="name" placeholder="Anything">
                                  </div>
                              </div>
                              
                            </div>
                          </div>
                           
                      </div>
                  </div>
                </div> <!-- buyer:details ends -->
                <div class="row-fluid cart-buttons">
                  <div class="span12"><p><a href="">Check Out</a></p></div>
                </div>
            
          </div><!-- end:section2 -->
        </div><!-- End: container -->
    </div><!-- End: MAIN CONTENT -->
    <!-- Start: FOOTER -->
    <?php 
      include("footer.php");
    ?>
    <!-- End: FOOTER -->
    
    
