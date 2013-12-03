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
                      <input type="submit" name="search" value="Search" class="search-btn" />
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
                            

                            <div id="show-cart">
                            <?php
                            $tot=0;
                            foreach ($Cart as $CartItem) {
                            ?>
                              <div class="row-fluid cart-row">
                                    <div class="span1 "><button id="remove<?php echo $CartItem['stock']['stock_id']; ?>" onclick="return update(<?php echo $CartItem['stock']['stock_id']; ?>, 1);" >X</button></div>
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
                                      <select id="qty<?php echo $CartItem['stock']['stock_id']; ?>" onchange="return update(<?php echo $CartItem['stock']['stock_id']; ?>, 0);" name='qtt[<?php echo $CartItem['stock']['stock_id']; ?>]'>
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
                            </div>


                            <div class="row-fluid cart-total">
                                
                                <p> Total: <span id="total">Rs. <?php echo $tot;?></span></p>
                              </div>
                            </div>
                      </div>
                  </div>
                </div> <!-- cart:details ends -->
                <div class="row-fluid cart-buttons" style="padding-bottom:40px;">
                  
                  <div class="span6"><p><a href="<?php echo base_url(); ?>">Continue shopping</a></p></div>

                </div>
                
                <div id="details-payment">
                <?php if(count($Cart)>0){ 
                  ?>
                <div class="row-fluid"> <!-- buyer:details starts -->
                  <form name='CustInfo' method='POST' action='<?php echo base_url("check_out"); ?>'>
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
                                    <input type="text" name="name" placeholder="name" required value='<?php echo $order['name'];?>'>
                                  </div>
                              </div>
                              <div class="row-fluid">
                                  <div class="span3 detail-form-label">E-Mail Address:</div>
                                  <div class=" span9 form-horizontal form-signin-signup">
                                    <input type="email" name="email" placeholder="E-Mail Address" required value='<?php echo $order['email'];?>'>
                                  </div>
                              </div>
                              <div class="row-fluid">
                                  <div class="span3 detail-form-label">Phone:</div>
                                  <div class=" span9 form-horizontal form-signin-signup">
                                    <input type="tel" name="phone" placeholder="Phone Number" required value='<?php echo $order['phone'];?>'>
                                  </div>
                              </div>
                              <div class="row-fluid">
                                  <div class="span3 detail-form-label">Billing Address:</div>
                                  <div class=" span9 form-horizontal form-signin-signup">
                                    <textarea name="billing" placeholder="Complete Billing address" required><?php echo $order['billing'];?></textarea>
                                  </div>
                              </div>
                              <div class="row-fluid">
                                  <div class="span3 detail-form-label">Delivery Address:</div>
                                  <div class=" span9 form-horizontal form-signin-signup">
                                    <textarea name="delivery" placeholder="Leave blank if same as billing address"><?php echo $order['delivery'];?></textarea>
                                  </div>
                              </div>
                              <div class="row-fluid">
                                  <div class="span3 detail-form-label">Delivery Note:</div>
                                  <div class=" span9 form-horizontal form-signin-signup">
                                    <input type="text" name="note" placeholder="Any message or instruction for delivery person." value='<?php echo $order['note'];?>'>
                                  </div>
                              </div>
                            </div>
                          </div>
                           
                      </div>
                  </div>
                </div> <!-- buyer:details ends -->
                <div class="row-fluid cart-buttons">
                  <div class="span6"><input type='submit' name='confirm' Value='Proceed To Payment'></div>
                </div>
                </form>
            <?php } ?>
            </div><!--details-payment-->

          </div><!-- end:section2 -->
        </div><!-- End: container -->
    </div><!-- End: MAIN CONTENT -->
    <!-- Start: FOOTER -->
    <?php 
      include("footer.php");
    ?>
    <!-- End: FOOTER -->
    
    
