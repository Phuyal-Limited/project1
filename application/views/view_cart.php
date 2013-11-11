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
                            <div class="row-fluid cart-row">
                                  <div class="span1 "><input type="checkbox"></div>
                                  <div class="span2 ">
                                     <img src="<?php echo base_url('assets/images/placeholder-260x150.jpg');?>"> 
                                  </div>
                                  <div class="span4 product-cart-info">
                                      <p class="title">Kara Walker</p>
                                      <p class="desc">lorem Ipsum Dolor Sit.lorem Ipsum Dolor Sit.lorem Ipsum Dolor Sit.</p>
                                  </div>
                                  <div class="span1 qty">
                                    <input type="text" placeholder="Qty">
                                  </div>
                                  <div class="span2 ">
                                    <div class="span2 product-cart-price">
                                <p>$45.23</p>
                              </div>
                                  </div>
                                  <div class="span2 product-cart-price">
                                    <p>$342.3</p>
                                  </div>
                            </div>

                            <div class="row-fluid cart-row">
                                  <div class="span1 "><input type="checkbox"></div>
                                  <div class="span2 ">
                                     <img src="<?php echo base_url('assets/images/placeholder-260x150.jpg');?>"> 
                                  </div>
                                  <div class="span4 product-cart-info">
                                      <p class="title">Kara Walker</p>
                                      <p class="desc">lorem Ipsum Dolor Sit.lorem Ipsum Dolor Sit.lorem Ipsum Dolor Sit.</p>
                                  </div>
                                  <div class="span1 qty">
                                    <input type="text" placeholder="Qty">
                                  </div>
                                  <div class="span2 ">
                                    <div class="span2 product-cart-price">
                                <p>$45.23</p>
                              </div>
                                  </div>
                                  <div class="span2 product-cart-price">
                                    <p>$342.3</p>
                                  </div>
                            </div>
                            <div class="row-fluid cart-total">
                              <p> Sub-Total: <span>Rs 13223.23</span></p>
                              <p> Total: <span>Rs 13223.23</span></p>
                            </div>

                          </div>
                      </div>
                  </div>
                </div> <!-- cart:details ends -->

                <div class="row-fluid"> <!-- buyer:details starts -->
                  <div class="your-cart ">
                      <div class="cart-content">
                          <div class="cart-head kale">
                          Your Details
                          </div>
                          <div class="widget-body">
                            <div class="center-align">
                              <form class="form-horizontal form-signin-signup">
                                <input type="text" name="name" placeholder="name">
                                <input type="text" name="address" placeholder="Address">
                                <input type="text" name="address" placeholder="You Can Add Another">
                                 
                              
                            </div>
                          </div>
                           
                      </div>
                  </div>
                </div> <!-- buyer:details ends -->
                <div class="row-fluid cart-buttons">
                  <div class="span4"><a href="">Update</a></div>
                  <div class="span4 continue-shopping"><a href="">Continue shopping</a></div>
                  <div class="span4"><p><a href="">Check Out</a></div>
                </div>
            
          </div><!-- end:section2 -->
        </div><!-- End: container -->
    </div><!-- End: MAIN CONTENT -->
    <!-- Start: FOOTER -->
    <?php 
      include("footer.php");
    ?>
    <!-- End: FOOTER -->
    
    
