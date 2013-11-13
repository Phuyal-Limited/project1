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
                          Order Created with the following Items:
                          </div>
                          <div class="cart-details">
                            <div class="table-titles">
                              
                              <div class="row-fluid">
                                  <div class="span1 ">Sn.</div>
                                  <div class="span2 ">Picture</div>
                                  <div class="span4 ">Book Details</div>
                                  <div class="span1 ">Qty</div>
                                  <div class="span2 ">Unit Price</div>
                                  <div class="span2 ">Total</div>
                              </div>
                            </div>
                            <?php
                            $count=1;
                            $tot=0;
                            foreach ($cart_det as $CartItem) {
                            ?>
                              <div class="row-fluid cart-row">
                                    <div class="span1 serial"><p><?php echo $count++; ?>.</p></div>
                                    <div class="span2 ">
                                       <img src="<?php echo $CartItem['book'][1]['path'];?>" alt="<?php echo $CartItem['book'][1]['alt'];?>"> 
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
                                      <p><?php echo $CartItem['stock']['stock_id'];?></p>
                                    </div>
                                    <div class="span2 ">
                                      <div class="span2 product-cart-price">
                                  <p>Rs. <?php echo $CartItem['stock']['price'];?></p>
                                </div>
                                    </div>
                                    <div class="span2 product-cart-price">
                                      <p><?php echo $CartItem['qty']*$CartItem['stock']['price'];$tot += $CartItem['qty']*$CartItem['stock']['price'];?></p>
                                    </div>
                              </div>
                            <?php } ?>
                            <div class="row-fluid cart-total">
                              <p> Sub-Total: <span>Rs <?php echo $tot;?></span></p>
                              <p> Total: <span>Rs <?php echo $tot;?></span></p>
                            </div>

                          </div>
                      </div>
                  </div>
                </div> <!-- cart:details ends -->
                
                <div class="row-fluid"> <!-- buyer:details starts -->
                  <div class="your-cart ">
                      <div class="cart-content">
                          <div class="cart-head kale">
                          Customer Details
                          </div>
                          <div class="widget-body">
                            <div class="user-details">
                              <div class="row-fluid">
                                <div class="span3"><label>Name:</label></div>
                                <div class="span9"><p><?php echo $order['name'];?></p></div>
                              </div>
                              <div class="row-fluid">
                                <div class="span3"><label>Email:</label></div>
                                <div class="span9"><p><?php echo $order['email'];?></p></div>
                              </div>
                              <div class="row-fluid">
                                <div class="span3"><label>Phone:</label></div>
                                <div class="span9"><p><?php echo $order['phone'];?></p></div>
                              </div>
                              <div class="row-fluid">
                                <div class="span3"><label>Billing address:</label></div>
                                <div class="span9"><p><?php echo nl2br($order['billing']);?></p></div>
                              </div>
                              <div class="row-fluid">
                                <div class="span3"><label>Delivery address:</label></div>
                                <div class="span9"><p><?php echo $order['delivery']==""?"Same as billing address":nl2br($order['delivery']);?></p></div>
                              </div>
                              <div class="row-fluid">
                                <div class="span3"><label>Delivery note:</label></div>
                                <div class="span9"><p><?php echo $order['note'];?></p></div>
                              </div>                              
                              
                                
                            </div>
                          </div>
                           
                      </div>
                  </div>
                </div> <!-- buyer:details ends -->
                <div class="row-fluid cart-buttons">
                  <div><p><a href="">Pay via Paymentsense</a></div>
                </div>
            
          </div><!-- end:section2 -->
        </div><!-- End: container -->
    </div><!-- End: MAIN CONTENT -->
    <!-- Start: FOOTER -->
    <?php 
      include("footer.php");
    ?>
    <!-- End: FOOTER -->
    
    
