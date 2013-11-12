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
                                      <div class="desc">
                                          <p>By:<span>Bidur Subedi</span> </p>
                                          <p>Store:<span>Lorem Ipsum</span> </p>
                                      </div>
                                  </div>
                                  <div class="span1 qty">
                                    <select>
                                      <option>1</option>
                                      <option>2</option>
                                      <option>3</option>
                                      <option>4</option>
                                      <option>5</option>
                                      <option>6</option>
                                      <option>7</option>
                                      <option>8</option>
                                      <option>9</option>
                                      <option>10</option>
                                    </select>
                                  </div>
                                  <div class="span2 ">
                                    <div class="span2 product-cart-price">
                                      <p><span>3x</span>45.23</p>
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
                                      <div class="desc">
                                          <p>By:<span>Bidur Subedi</span> </p>
                                          <p>Store:<span>Lorem Ipsum</span> </p>
                                      </div>
                                  </div>
                                  <div class="span1 qty">
                                    <select>
                                      <option>1</option>
                                      <option>2</option>
                                      <option>3</option>
                                      <option>4</option>
                                      <option>5</option>
                                      <option>6</option>
                                      <option>7</option>
                                      <option>8</option>
                                      <option>9</option>
                                      <option>10</option>
                                    </select>
                                  </div>
                                  <div class="span2 ">
                                    <div class="span2 product-cart-price">
                                      <p><span>3x</span>45.23</p>
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
                <div class="row-fluid cart-buttons" style="padding-bottom:40px;">
                  <div class="span6"><a href="">Update</a></div>
                  <div class="span6"><p><a href="">Continue shopping</a></p></div>
                </div>

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
    
    
